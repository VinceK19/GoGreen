-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2022 at 04:02 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `go_green`
--
CREATE DATABASE IF NOT EXISTS `go_green` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `go_green`;

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `blog_comment_get_joined`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `blog_comment_get_joined` (IN `blog_id` INT)   BEGIN
	SELECT 
    	C.id AS "id",
        C.comment as "comment",
        C.date_created as "date_created",
       	M.username as "author"
    FROM blog_comment C
    LEFT JOIN member M ON M.id = C.author_id
    WHERE C.blog_id = blog_id;
END$$

DROP PROCEDURE IF EXISTS `blog_get_data`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `blog_get_data` (IN `blog_id` INT)   BEGIN
	SELECT *
    FROM blog B
    WHERE B.id = blog_id
    ;
	SELECT 
    	C.id AS "id",
        C.comment as "comment",
        C.date_created as "date_created",
        M.username as "author"
    FROM blog_comment C
    LEFT JOIN member M ON M.id = C.author_id
    WHERE C.blog_id = blog_id;
END$$

DROP PROCEDURE IF EXISTS `blog_get_random`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `blog_get_random` (IN `num` INT)   BEGIN
SELECT *
FROM blog
ORDER BY RAND() LIMIT num;
END$$

DROP PROCEDURE IF EXISTS `member_get_data`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `member_get_data` (IN `username` VARCHAR(50))   BEGIN
-- Member data
    SELECT *
    FROM member M
    WHERE M.username = username;
-- Cart
    SELECT 
        O.id AS "order_id",
        P.id AS "product_id",
        P.name AS "name",
        P.image AS "image",
        P.price AS "price",
        O.quantity AS "quantity",
        P.price * O.quantity AS "total"
    FROM order_item O
    LEFT JOIN product P ON O.product_id = P.id
    LEFT JOIN member M ON M.id = O.customer_id
    WHERE M.username = username and O.status = 0;
END$$

DROP PROCEDURE IF EXISTS `order_get_all`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `order_get_all` (IN `customer_id` INT)   BEGIN    
    SELECT 
        O.id AS "order_id",
        P.id AS "product_id",
        P.name AS "name",
        P.image AS "image",
        P.price AS "price",
        O.quantity AS "quantity",
        P.price * O.quantity AS "total"
    FROM order_item O
    LEFT JOIN product P ON O.product_id = P.id
    LEFT JOIN member M ON M.id = O.customer_id
    WHERE O.customer_id = customer_id and O.status = 0;
END$$

DROP PROCEDURE IF EXISTS `product_comment_get_joined`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `product_comment_get_joined` (IN `product_id` INT)   BEGIN
	SELECT 
    	C.id AS "id",
        C.comment as "comment",
        C.date_created as "date_created",
       	M.username as "author"
    FROM product_comment C
    LEFT JOIN member M ON M.id = C.author_id
    WHERE C.product_id = product_id;
END$$

DROP PROCEDURE IF EXISTS `product_get_data`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `product_get_data` (IN `product_id` INT)   BEGIN
	SELECT *
    FROM product P
    WHERE P.id = product_id
    ;
	SELECT 
    	C.id AS "id",
        C.comment as "comment",
        C.date_created as "date_created",
       	M.username as "author"
    FROM product_comment C
    LEFT JOIN member M ON M.id = C.author_id
    WHERE C.product_id = product_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `preview` text NOT NULL,
  `content` text NOT NULL,
  `member_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `image` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `preview`, `content`, `member_id`, `date_created`, `image`) VALUES
(1, 'Ăn uống thanh đạm sau Tết', 'Trong mấy ngày tết, khó ai có thể cưỡng lại được sự hấp dẫn của thức ăn bày đầy trước mặt. Hệ lụy dẫn theo...', '<div class=\"box-article-detail typeList-style article-table-contents\"><p style=\"display: block; width: 0px; height: 0px; padding: 0px; border: 0px; margin: 0px; position: absolute; top: 0px; left: -9999px; opacity: 0; overflow: hidden;\">&nbsp;</p><h2 style=\"text-align: justify;\" id=\"trong_may_ngay_tet__kho_ai_co_the_cuong_lai_duoc_su_hap_dan_cua_thuc_an_bay_day_truoc_mat__he_luy_dan_theo_la_len_can__thua_cholesterol__roi_loan_tieu_hoa__benh_duong_ruot__chan_an__met_moi…\"><strong>Trong mấy ngày tết, khó ai có thể cưỡng lại được sự hấp dẫn của thức ăn bày đầy trước mặt. Hệ lụy dẫn theo là lên cân, thừa cholesterol, rối loạn tiêu hóa, bệnh đường ruột, chán ăn, mệt mỏi…</strong></h2><p style=\"text-align: justify;\"><b>Cần phải ăn gì để góp phần giải tỏa tình trạng độc hại này?</b></p><p style=\"text-align: justify;\"><b>1. Canh: </b>Trong ẩm thực, canh là món có lợi cho sức khỏe, giàu dinh dưỡng và dễ tiêu nhất. Có nhiều loại canh và tùy theo khẩu vị của từng người mà chọn món thích hợp. Dưới đây là những món canh dễ làm, dễ ăn và nên thuốc.</p><p style=\"text-align: justify;\"><b>• </b>Canh nấm mèo thịt nạc, thêm một nhúm rau hẹ, đun nhỏ lửa cho sôi, uống, có tác dụng bồi bổ khí huyết, chữa bụng trướng, khó tiêu, giải độc cơ thể.</p><p style=\"text-align: justify;\"><b>• </b>Canh đại táo, rửa sạch nấu cho sôi, để ấm uống trong ngày, tác dụng kiện tỳ ích khí, chữa kém ăn, tỳ vị yếu mệt.</p><p style=\"text-align: justify;\"><b>• </b>Canh thịt giá củ năng là loại canh thượng phẩm được ghi trong sách cổ, dùng trong mùa xuân có tác dụng tăng cường sinh lực. Khi nấu cần cho ít thịt heo nạc, giá sống, bắp cải, củ năng, trứng gà, gừng, hành, dầu mè và ít gia vị.</p><p style=\"text-align: justify;\">Nấu nước thịt xong cho trứng gà vào, nêm nếm vừa miệng, sau đó mới cho giá và cải vào, đun chín rồi ăn.</p><p style=\"text-align: justify;\"><b>• </b>Canh trứng đậu hủ khô, gồm đậu hủ khô thái lát, nấm hương, trứng cút, hành tỏi, nấu canh xong nêm nếm vừa miệng, ăn trong ngày sẽ giúp bồi bổ tỳ vị, mạnh dạ dày, giúp ăn ngon miệng, phục hồi sức khỏe.</p><p style=\"text-align: justify;\"><b>2. Cháo:</b> Người Trung Hoa có thói quen ăn cháo (tuy nhiên họ lại rất kiêng kỵ món cháo trong ngày mùng 1 đầu năm vì sợ nghèo quanh năm), đặc biệt là cháo nấu từ ngũ cốc vì nó chứa đầy đủ các chất dinh dưỡng lại rất dễ hấp thu, không bắt dạ dày làm việc quá sức, còn giúp chữa bệnh và kéo dài tuổi thọ.</p><p style=\"text-align: justify;\">Danh y Lý Thời Trân có nói: “Mỗi ngày dùng một bát cháo... là bí quyết tốt nhất của ăn uống vậy”.</p><p style=\"text-align: justify;\"><b>• Cháo tỏi: </b>lấy tỏi tía, nấu trong nước cho nhừ, sau đó cho gạo tẻ vào nấu chung đến thật nhừ, ăn sẽ giúp ấm tỳ vị, chữa đầy bụng, ăn không tiêu, kiết lỵ, làm hạ huyết áp, giảm cholesterol trong máu.</p><p style=\"text-align: justify;\"><b>• Cháo hoài sơn: </b>hoài sơn nấu chung với gạo cho nhừ, chữa chứng chán ăn, rối loạn tiêu hóa, tỳ vị hư nhược, người già bị tiểu đường, suy dinh dưỡng, trẻ em chậm lớn.</p><p style=\"text-align: justify;\"><b>• Cháo gừng: </b>gừng tươi, đại táo, gạo tẻ nấu chung, ăn vào giúp chữa đầy hơi, sình bụng, khó tiêu do ăn quá nhiều thịt mỡ, chữa tiêu chảy, nôn mửa.</p><p style=\"text-align: justify;\"><b>• Cháo bột ngô: </b>bột ngô nấu chung với gạo thành cháo, chữa mỡ máu cao, xơ vữa động mạch, cao huyết áp và phòng ngừa ung thư.</p><p style=\"text-align: justify;\"><b>• Cháo bát bảo: </b>khiếm thực, hoài sơn, phục linh, hạt sen, ý dĩ, đậu cô ve, đảng sâm, bạch truật, nấu chung với gạo cho nhừ, ăn vào giúp cơ thể linh hoạt nhẹ nhàng, kiện tỳ vị, làm ấm cơ thể, chữa tiêu chảy, người mệt mỏi.</p><p style=\"text-align: justify;\"><b>3. Nước ép trái cây, rau củ tươi: </b>Theo các nhà dinh dưỡng học, nước trái cây tươi không chỉ bổ sung cho cơ thể nhiều loại vitamin cần thiết để phòng bệnh mà còn chữa được một số bệnh thông thường như cảm cúm, ho, viêm nhiễm.</p><p style=\"text-align: justify;\">Đồng thời giúp nâng cao sức đề kháng của cơ thể, chống lão hóa tế bào nên giúp con người giữ được nét trẻ trung như mơ, nho, dâu, cam, chanh, bưởi, sơ ri, mãng cầu...</p><p style=\"text-align: justify;\">Nên dùng nước ép trực tiếp không qua chế biến hoặc đóng hộp vì có sử dụng chất bảo quản và nhiều vitamin đã bị phân hủy ở nhiệt cao. Các chuyên gia còn khuyến cáo nên ăn nhiều loại rau củ quả khác nhau cho phong phú, mỗi loại một ít.</p><p style=\"text-align: justify;\">Có nhiều cách như ăn sống, xốt cà chua, dầu giấm, trộn xà lách, rau ghém, hoặc ép vắt lấy nước. Không nên đun quá chín hoặc để lâu sẽ làm mất nhiều hoạt chất.</p><p style=\"text-align: justify;\"><b>4. Thức uống từ thảo dược:</b></p><p style=\"text-align: justify;\"><b>• Tam đậu ẩm: </b>gồm đậu đỏ, đậu xanh, đậu đen, tác dụng thanh nhiệt, lợi tiểu, bồi bổ sức khỏe, tiêu mỡ giảm béo.</p><p style=\"text-align: justify;\"><b>• Đinh hương trần bì ẩm: </b>khi uống thêm ít mật ong, công dụng làm ấm tỳ vị, bổ khí, chữa kém ăn, người mệt mỏi.</p><p style=\"text-align: justify;\"><b>5. Trà dược có thể tăng cường thải độc cho gan, giúp cơ thể nhẹ nhàng thư thái.</b></p><p style=\"text-align: justify;\"><b>• Trà Artichaud, </b>trà nhân trần, tăng cường thải độc gan và còn giúp phục hồi tế bào gan bị tổn thương do uống quá nhiều bia rượu trong ngày tết.</p><p style=\"text-align: justify;\"><b>• Trà lục mai, </b>lấy lá chè xanh thêm một ít đài hoa mai còn xanh (sau khi cánh hoa rụng hết), pha trong nước sôi uống sẽ có tác dụng giúp khí huyết lưu thông, giảm đau bụng, đau dạ dày, đau tức hông sườn, người mệt mỏi, ăn kém, giải độc rượu, thuốc lá.</p><p style=\"text-align: justify;\"><b>• Trà ô long gia giảm, </b>dùng vài núm trà ô long, ít nụ hoa hòe, sơn tra, hà thủ ô đỏ, vỏ quả bí đao khô, nấu chung cho sôi, bài trà thuốc này có tác dụng kích thích tiêu hóa, giúp ăn ngon ngủ tốt, bổ khí huyết, bảo vệ sức khỏe và gia tăng tuổi thọ.</p><p>&nbsp;</p><p style=\"display: block; width: 0px; height: 0px; padding: 0px; border: 0px; margin: 0px; position: absolute; top: 0px; left: -9999px; opacity: 0; overflow: hidden;\">&nbsp;</p></div>', 2, 2147483647, 'https://file.hstatic.net/200000459373/article/blog-01_f28a741146484c8981dd59fde85ba00b.png'),
(2, 'Cách làm món chân gà ngâm sả tắc giòn ngon khó cưỡng', 'Chân gà ngâm sả tắc là một món ăn vặt yêu thích của chị em và đặc biệt là món nhậu ngon dành cho các...', '<div class=\"box-article-detail typeList-style article-table-contents\"><p>Chân gà ngâm sả tắc là một món ăn vặt yêu thích của chị em và đặc biệt là món nhậu ngon dành cho các cánh mày râu. Chân gà được làm sạch, ngâm với nước mắm sả tắc vừa thơm vừa giòn rất hấp dẫn. Nhưng để làm đc món chân gà sả tắc trắng, giòn, ngon và không bị đắng do tắc thì không phải ai cũng biết. Hôm nay OsiFood sẽ chia sẻ cách làm chân gà ngâm sả tắc đơn giản ai cũng có thể làm được.</p><p><b>Nguyên liệu làm chân gà ngâm sả tắc</b></p><p>- 15-20 cái chân gà</p><p>- 1 củ gừng to</p><p>- 10-15 quả tắc xanh</p><p>- 10 quả ớt</p><p>- 3 thìa rượu trắng, 6 thìa canh nước mắm, 1 thìa muối, 6 thìa đường trắng, 5-6 thìa giấm gạo, 1 thìa cafe hạt tiêu đen</p><p>- Bình thuỷ tinh</p><p><strong>Lưu ý: </strong>Nên chọn chân gà Công nghiệp để làm, không nên chọn chân gà ta vì khô hơn và ít thịt hơn, ăn không được ngon.</p><p>Cách làm chân gà ngâm sả tắc</p><p><strong>Bước 1: Sơ chế tắc và sả</strong></p><p>- Đập dập và thái khúc dài 3-5cm 3 nhánh sả, còn lại thái khoanh tròn nhỏ</p><p>- Gừng, toit, ớt rửa sạch, thái lát lỏng, ớt thái khoanh nhỏ</p><p>- Tắc cắt đôi, lấy đầu mũ dao nhọn loại bỏ các phần hạt, chú ý không làm dập vỏ, làm điều này để khi ngâm chân gà không bị đắng</p><p><strong>Bước 2: Chân gà làm sạch</strong></p><p>- Chân gà bóc bỏ móng, rửa sạch với nước lạnh, sau đó bóp với vài lát gừng và rượu trắng để khử mùi hôi, xả lại với nước lạnh và để ráo nước. Sau đó chặt đôi chân gà</p><p><strong>Bước 3: Luộc chín chân gà</strong></p><p>- Đun nồi nước sôi, thả vài lát gừng và sả cùng chân&nbsp; gà vào luộc chừng 3-5p cho chân gag vừa chín tới thì tắt bếp.</p><p>- Vớt ngay chân gà ra một bát nước đá có bỏ xíu muối và ngâm trong 10p</p><p>- Chân gà ngâm nước đá 10p vớt ra để ráo nước rồi bọc kín bằng màn bọc thực phẩm, cất vào ngăn mát tủ lạnh 20-30p để chân gà đực giòn. Bọc kín chân gà khi cho vào tủ lạnh sẽ gíup chân gà không bị khô và có độ giòn</p><p><strong>Bước 4: Pha nước ngâm chân gà</strong></p><p>- Đổ 1 lít nước vào nồi đun sôi, bỏ 6 thìa đường, 6 thìa nước mắm loại ngon, 5-6 thìa giấm gạo cùng 1 thìa muối vào khuấy cho tan, đun sôi nồi nước trở lại khoảng 1p để các gia vj có độ trong. Tắt bếp và bắc ra để nguội bớt.</p><p><strong>Bước 5: Cách ngâm chân gà sả tắc</strong></p><p>- Khi nước ngâm còn âm ấm thì cho sả, ớt, tỏi, gừng đã thái nhỏ vào trộn đều. Nước âm ấm sẽ giúp các loại gia vị này dậy mùi hơn, thơm hơn.</p><p>- Đợi nước nguội hoàn toàn thì cho tắc và chân gà vào trộn đều. (không cho tắc vào nước đường ngâm lúc còn nóng hoặc ấm, làm vậy sẽ khiến nước đường bị đắng và dễ lên váng)</p><p>- Sau khi đảo đều chân gà, tắc với nước đường thì cho chân gà, tắc xếp xen kẻ vào lọ thuỷ tinh, đổ nước ngâm cùng sả, ớt, gừng vào ngập hết chân gà và tắc.</p><p><strong>Bảo quản và thưởng thức</strong></p><p>Chân gà ngâm với sả tắc có thể ăn được luôn nhưng để ngon hơn hãy để tối thiểu 1 tiếng hoặc qua đêm như vậy chân gà ăn dậy mùi hơn, giòn hơn và ngấm đều gia vị hơn.</p><p>Chân gà ngâm sả tắc sau khi làm xong có thể để được 4-5 ngày trong ngăn mát tủ lạnh, không nên để lâu quá ăn mất ngon</p><p>Chân gà ngâm sả tắc khi ăn có thể chấm với muối tiêu vắt tắc, ăn kèm rau thơm hoặc món muối chua, lạc rang hay nem chua… rất hợp và ngon.</p></div>', 0, 2147483647, 'https://file.hstatic.net/200000459373/article/blog-02_790aaeb4626c440d868174cfb2c87b09.png'),
(3, 'Cách bảo quản rau củ trong tủ lạnh hiệu quả', 'Bạn đã biết cách bảo quản rau trong tủ lạnh chưa? Sự thật là không phải loại rau củ quả nào cũng có cách bảo...', '<div class=\"box-article-detail typeList-style article-table-contents\"><p><b>Bạn đã biết cách bảo quản rau trong tủ lạnh chưa? Sự thật là không phải loại rau củ quả nào cũng có cách bảo quản giống nhau và rất có thể bạn đã mắc phải vài sai lầm khi dự trữ rau trong tủ lạnh.</b></p><p>Với guồng quay vội vã của công việc trong cuộc sống hiện đại, tiết kiệm thời gian luôn là ưu tiên hàng đầu cho những vấn đề cá nhân thường ngày. Bạn không thể nào mỗi ngày đều đi làm, tập thể dục, chăm sóc cá nhân mà vẫn thư thả đi chợ hay siêu thị để lựa chọn thực phẩm tươi ngon. Vậy nên, biết cách bảo quản thực phẩm, đặc biệt là cách bảo quản rau củ trong tủ lạnh hiệu quả, là vô cùng hữu ích. Bạn có thể dự trữ rau củ quả trong tủ lạnh được cả tuần mà vẫn giữ được độ tươi ngon của chúng.</p><p>Để làm được điều đó, bạn chỉ cần hiểu được đặc điểm của từng loại rau, củ, quả và nắm rõ các nguyên tắc cơ bản trong quá trình bảo quản. Hãy cùng OsiFood tìm hiểu một số mẹo bảo quản rau củ hiệu quả nhé!</p>&nbsp;<h3 id=\"1__loai_bo_phan_hu_hong__giap_nat_truoc_khi_cho_vao_tu_lanh\"><b>1. Loại bỏ phần hư hỏng, giập nát trước khi cho vào tủ lạnh</b></h3><p>Phần rau quả bị hư, giập nát thường sản sinh ra khí ethylen và gây ảnh hưởng đến phần nguyên vẹn còn lại hoặc lây lan sang những thực phẩm xung quanh. Do đó, bạn cần cắt bớt những khu vực này trước khi cho vào tủ lạnh.</p><h3 id=\"2__khong_nen_rua_rau_cu_truoc_khi_cho_vao_tu_lanh\"><b>2. Không nên rửa rau củ trước khi cho vào tủ lạnh</b></h3><p>Để rau ướt lâu trong tủ lạnh có thể gây úng hay thối rữa vì tạo điều kiện thuận lợi cho vi khuẩn, nấm mốc phát triển. Nếu bạn có thói quen rửa sạch rau sau khi mua về, hãy làm ráo nước hết mức có thể trước khi cho chúng vào tủ lạnh.</p><h3 id=\"3__bao_quan_rieng_rau_cu_va_trai_cay\"><b>3. Bảo quản riêng rau củ và trái cây</b></h3><p>Như đã đề cập phía trên, trái cây thường sinh ra khí ethylen do tiếp tục quá trình chín của chúng và rau xanh hấp thụ khí này sẽ dễ úa vàng, hư hỏng hoặc thay đổi mùi vị. Do đó, tốt nhất bạn nên sử dụng túi/hộp đựng riêng cho từng loại.</p><h3 id=\"4__khong_cat_nho_rau_cu_truoc_khi_cho_vao_tu_lanh\"><b>4. Không cắt nhỏ rau củ trước khi cho vào tủ lạnh</b></h3><p>Lưu ý&nbsp;rằng bạn không nên cắt nhỏ rau, củ trước khi cho vào tủ lạnh vì vừa khiến thực phẩm mất đi hàm lượng dinh dưỡng quan trọng, vừa dễ dàng tạo điều kiện thuận lợi cho vi khuẩn sinh trưởng.</p><h3 id=\"5__su_dung_tui__hop_nhua_chuyen_dung_de_dung_rau_cu\"><b>5. Sử dụng túi, hộp nhựa chuyên dụng để đựng rau củ</b></h3><p>Bạn nên sử dụng các túi hoặc hộp nhựa chuyên dụng để bảo quản từng loại rau củ quả để đảm bảo kín khí cũng như vệ sinh, an toàn. Nếu muốn, bạn có thể lót thêm một lớp khăn giấy để hút ẩm.</p><h3 id=\"6__luu_y_thoi_gian_bao_quan\"><b>6. Lưu ý thời gian bảo quản</b></h3><p>Thời gian bảo quản của mỗi loại rau quả thường không giống nhau và còn phụ thuộc vào môi trường trong tủ lạnh. Thông thường, bạn có thể bảo quản thực phẩm từ 3–7 ngày.</p><h3 id=\"7__lau_don_tu_lanh_thuong_xuyen\"><b>7. Lau dọn tủ lạnh thường xuyên</b></h3><p>Để có môi trường sạch sẽ, thông thoáng, tránh nhiễm khuẩn chéo thì bạn phải lau dọn tủ lạnh thường xuyên. Việc này khiến giảm bớt mùi khó chịu trong tủ lạnh và hạn chế ảnh hưởng đến những thực phẩm mới.</p><h2 id=\"mot_so_luu_y_khi_bao_quan_rau_cu_trong_tu_lanh\"><b>Một số lưu ý khi bảo quản rau củ trong tủ lạnh</b></h2><p>Tuy tủ lạnh là giải pháp khá tiện lợi để bảo quản nhưng không phải loại rau củ quả nào cũng nên “tống” vào tủ lạnh. Bạn cần phân biệt 3 nhóm rau củ quả sau đây để có cách bảo quản đúng đắn.</p><h3 id=\"nhom_1__nhung_loai_rau_cu_qua_khong_nen_bao_quan_trong_tu_lanh\"><b>Nhóm 1: Những loại rau củ quả không nên bảo quản trong tủ lạnh</b></h3><p>Một số loại rau củ quả chỉ cần bảo quản ở nơi thoáng mát, khô ráo vì nhiệt độ trong tủ lạnh có thể gây ảnh hưởng đến hương vị của chúng, bao gồm:</p><ul><li><p><b>Tỏi</b></p></li><li><p><b>Hành tây</b></p></li><li><p><b>Khoai tây</b></p></li><li><p><b>Khoai lang</b></p></li><li><p><b>Bí đỏ</b></p></li></ul><h3 id=\"nhom_2__nhung_loai_rau_cu_qua_sau_khi_chin_moi_nen_bo_vao_tu_lanh\"><b>Nhóm 2: Những loại rau củ quả sau khi chín mới nên bỏ vào tủ lạnh</b></h3><p>Khi ở nhiệt độ lạnh, một vài loại rau quả tạm thời ngừng quá trình chín. Do đó, sau khi để ở nhiệt độ thường đến khi chín hoàn toàn, bạn có thể cho chúng vào tủ lạnh để bảo quản lâu hơn.</p><ul><li><p><b>Quả bơ</b></p></li><li><p><b>Lê</b></p></li><li><p><b>Cà chua</b></p></li><li><p><b>Dưa</b></p></li><li><p><b>Đào</b></p></li><li><p><b>Mận</b></p></li><li><p><b>Chuối</b></p></li><li><p><b>Đu đủ</b></p></li><li><p><b>Xoài</b></p></li></ul><h3 id=\"nhom_3__nhung_loai_rau_cu_qua_can_bao_quan_lanh_ngay_sau_khi_mua\"><b>Nhóm 3: Những loại rau củ quả cần bảo quản lạnh ngay sau khi mua</b></h3><p>Một vài loại rau củ quả bạn nên cho vào tủ lạnh ngay sau khi mua về như:</p><ul><li><p><b>Măng tây</b></p></li><li><p><b>Cần tây</b></p></li><li><p><b>Súp lơ xanh</b></p></li><li><p><b>Gừng</b></p></li><li><p><b>Nấm (nên bỏ vào túi giấy thay vì túi nilon sẽ giữ được lâu hơn)</b></p></li><li><p><b>Cam, quýt</b></p></li><li><p><b>Táo</b></p></li><li><p><b>Atisô</b></p></li><li><p><b>Bắp cải</b></p></li><li><p><b>Cà rốt</b></p></li><li><p><b>Dưa leo</b></p></li><li><p><b>Cà tím</b></p></li><li><p><b>Đậu Hà Lan</b></p></li><li><p><b>Xà lách</b></p></li><li><p><b>Củ cải</b></p></li></ul><p>&nbsp;</p></div>', 2, 2147483647, 'https://file.hstatic.net/200000459373/article/blog-03_e3ac776bc64149ef8710bf4ca6cb387b.png'),
(4, 'Chào đón cửa hàng siêu thị tiện lợi OsiFood thứ 3 tại TP.Thủ Đức', 'Chào đón cửa hàng siêu thị tiện lợi OsiFood thứ 3 tại TP.Thủ Đức', '<div class=\"box-article-detail typeList-style article-table-contents\"><p style=\"margin-bottom:11px\"><span style=\"font-size:18px;\"><strong>Chào đón cửa hàng siêu thị tiện lợi OsiFood thứ 3 tại TP.Thủ Đức</strong></span></p><p style=\"margin-bottom:11px\"><span style=\"font-size:11pt\"><span style=\"line-height:normal\"><span style=\"font-family:Calibri,sans-serif\"><b><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">OsiFood</span></span></b><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"> là chuỗi cửa hàng siêu thị tiện lợi trực thuộc <b>CÔNG TY TNHH SẢN XUẤT THƯƠNG MẠI DỊCH VỤ NHẬT MINH BAKERY</b></span></span></span></span></span></p><p style=\"margin-bottom:11px\"><span style=\"font-size:11pt\"><span style=\"line-height:normal\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Ngày 20/02/2022, chuỗi cửa hàng OsiFood chính thức khai trương cửa hàng thứ 3 OsiFood Sky 9 tại 8S010-011 Block CT1, CC Sky 09, Đường số 1, Khu phố 2, Phường Phú Hữu, Tp.Thủ Đức là điểm đến đầy hứa hẹn với mục đích phục vụ mọi người tiêu dùng trên địa bàn nơi đây. Tiếp ngay sau đó cũng sẽ triển khai đồng loạt thêm nhiều cửa hàng tiện ích tại khu vực TPHCM nhằm phục vụ cho mọi nhu cầu thiết yếu của khách hàng.</span></span></span></span></span></p><p style=\"text-align: center\"><img src=\"//file.hstatic.net/200000459373/file/z3196389997018_68ce6847b75f5069460dfe180bc09435_c437c554626741dab10ed5c01fd3c6b3_grande.jpg\"></p><p style=\"margin-bottom:11px\">&nbsp;</p><p style=\"margin-bottom:11px\"><span style=\"font-size:11pt\"><span style=\"line-height:normal\"><span style=\"font-family:Calibri,sans-serif\"><b><span style=\"font-size:18.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Cửa hàng siêu thị tiện lợi OsiFood Sky 9</span></span></b></span></span></span></p><p style=\"margin-bottom:11px\"><span style=\"font-size:11pt\"><span style=\"line-height:normal\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Được tọa lạc tại khu vực đông dân cư thuận tiện trong việc tiếp cận và thu hút khách hàng đến tham quan mua sắm và nhằm đáp ứng nhu cầu chung của người dân, cửa hàng siêu thị tiện lợi OsiFood Sky 9 với hơn 40 ngàn mặt hàng trong nước và nhập khẩu cam kết đem đến cho khách hàng những sản phẩm chất lượng như : Rau củ quả, trái cây, thực phẩm tươi sống, thực phẩm công nghệ, hóa phẩm và đồ dùng với chính sách mua sắm nhiều ưu đãi cùng những chương trình khuyến mãi hàng tuần, cửa hàng siêu thị tiện lợi OsiFood Sky 9 luôn luôn đặt tiêu chí phục vụ an toàn - nhanh chóng - tiện lợi nhằm mục đích phục vụ khách hàng.</span></span></span></span></span></p><p style=\"text-align: center\"><img src=\"//file.hstatic.net/200000459373/file/z3196359859306_eae4e0c9db908bb847dd7f779baa6dc5_c3499810ec444a34bf08f42d5e53328f_grande.jpg\"></p><p style=\"text-align: center\"><img src=\"//file.hstatic.net/200000459373/file/z3196359831719_048f65398761b91a1f378c7c8e2c29a5_e644852207dc44afb10b803f63db4434_grande.jpg\"></p><p style=\"margin-bottom:11px\">&nbsp;</p><p style=\"margin-bottom:11px\">&nbsp;</p><p style=\"margin-bottom:11px\"><span style=\"font-size:11pt\"><span style=\"line-height:normal\"><span style=\"font-family:Calibri,sans-serif\"><b><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">LĨNH VỰC HOẠT ĐỘNG:<br>Các mặt hàng kinh doanh chính của Chuỗi cửa hàng siêu thị tiện lợi OsiFood:</span></span></b></span></span></span></p><p style=\"margin-bottom:11px\"><span style=\"font-size:11pt\"><span style=\"line-height:normal\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Rau - củ - quả<br>Thực phẩm sơ chế<br>Trái cây<br>Thực phẩm tươi sống và thực phẩm đông lạnh<br>Hóa mỹ phẩm<br>Thực phẩm công nghệ<br>Hàng gia dụng&nbsp;&nbsp;</span></span></span></span></span></p><p style=\"margin-bottom:11px\"><span style=\"font-size:11pt\"><span style=\"line-height:normal\"><span style=\"font-family:Calibri,sans-serif\"><b><span style=\"font-size:13.5pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Không gian bên trong cửa hàng siêu thị tiện lợi OsiFood Sky 9</span></span></b></span></span></span></p><p style=\"margin-bottom:11px\"><span style=\"font-size:11pt\"><span style=\"line-height:normal\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Chủ động đến gần hơn với khách hàng để phục vụ tốt hơn, nhanh hơn, OsiFood có đa dạng nguồn hàng phù hợp với mọi đối tượng, từ những mặt hàng tươi sống, thực phẩm chế biến ( thịt cá, rau củ, trái cây....) với mục đích phục vụ những nhu cầu thiết yếu về bữa ăn hàng ngày của mọi gia đình. Chuỗi cửa hàng siêu thị tiện lợi OsiFood đem đến cho khách hàng những lựa chọn tốt nhất. Tại OsiFood - Điểm đến mỗi ngày , chúng tôi luôn đặt tiêu chí phục vụ “ AN TOÀN - NHANH CHÓNG - TIỆN LỢI ” để đem đến sự hài lòng nhất cho khách hàng sẽ góp phần gia tăng tiện ích và đáp ứng các nhu cầu của khách hàng mọi lúc mọi nơi.</span></span></span></span></span></p><p style=\"text-align: center\"><img src=\"//file.hstatic.net/200000459373/file/z3196359859306_eae4e0c9db908bb847dd7f779baa6dc5_c3499810ec444a34bf08f42d5e53328f_grande.jpg\"></p><p style=\"margin-bottom:11px\">&nbsp;</p><p style=\"margin-bottom:11px\">&nbsp;</p><p style=\"margin-bottom:11px\"><span style=\"font-size:11pt\"><span style=\"line-height:normal\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Song song, khách hàng khi mua hàng tại chuỗi cửa hàng siêu thị tiện lợi OsiFood sẽ được tư vấn làm thẻ thành viên, khách hàng tích lũy điểm để được hưởng các đặc quyền hấp dẫn khác.</span></span></span></span></span></p><p style=\"margin-bottom:11px\">&nbsp;</p><p style=\"margin-bottom:11px\"><span style=\"font-size:11pt\"><span style=\"line-height:normal\"><span style=\"font-family:Calibri,sans-serif\"><b><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">Địa chỉ OsiFood Sky 9 : S010-011 Block CT1, CC Sky 09, Đường số 1, Khu phố 2, Phường Phú Hữu, Tp.Thủ Đức</span></span></b><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">️</span></span></span></span></span></p><p style=\"margin-bottom:11px\"><span style=\"font-size:11pt\"><span style=\"line-height:normal\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">OsiFood - Điểm đến mỗi ngày<br>SĐT: 0919.439.489</span></span></span></span></span></p><p style=\"margin-bottom:11px\"><span style=\"font-size:11pt\"><span style=\"line-height:normal\"><span style=\"font-family:Calibri,sans-serif\"><a href=\"https://www.google.com/maps/place/OsiFood+Nguy%E1%BB%85n+Kho%C3%A1i/@10.7557157,106.6943258,17z/data=!3m1!4b1!4m5!3m4!1s0x31752f00b2ad7c19:0xc6d603dd6e915cc6!8m2!3d10.7557157!4d106.6943258?hl=vi-VN\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"><span style=\"color:blue\">OsiFood Nguyễn Khoái</span></span></span></a></span></span></span></p><p style=\"margin-bottom:11px\"><span style=\"font-size:11pt\"><span style=\"line-height:normal\"><span style=\"font-family:Calibri,sans-serif\">&nbsp;</span></span></span></p><p style=\"margin-bottom:11px\">&nbsp;</p></div>', 2, 2147483647, 'https://file.hstatic.net/200000459373/article/z3196389997018_68ce6847b75f5069460dfe180bc09435_98e913bc80df4a3d82c5777961a4848b.jpg'),
(5, 'TƯNG BỪNG KHAI TRƯƠNG OSIFOOD OPAL RIVERSIDE', 'Thứ Bảy ngày 𝟭5.𝟭0.𝟮𝟬𝟮𝟮 vừa qua, OsiFood Nguyễn Xiển đã chính thức khai trương tại 458 - 458A Nguyễn Xiển, Phường Long Thạnh Mỹ, TP. Thủ Đức', '<div class=\"box-article-detail typeList-style article-table-contents\">Sáng 30/07/2022 chuỗi Siêu thị OsiFood lại tiếp tục đón chào Cửa hàng thứ 17 <strong>OSIFOOD OPAL RIVERSIDE</strong> tọa lạc tại địa chỉ : <strong><em>SH10&nbsp;Chung cư Opal Riverside Đường số 10 Phường Hiệp Bình Chánh TP Thủ Đức</em></strong> được thiết kế hiện đại,kinh doanh hơn 3.000 mặt hàng đa dạng từ thực phẩm công nghệ,hóa mỹ phẩm...đến những thực phẩm tươi sống,nông sản trái cây đảm bảo chất lượng,giá cả phải chăng và vô cùng tiện lợi cho người dân tại địa bàn.<div>&nbsp;</div><div>Thêm vào đó <strong>OsiFood Opal Riverside</strong> còn mang nhiều tiện ích đến cho cư dân cũng như khách hàng lân cận như : giao hàng tận nhà,thanh toán trực tiếp qua thẻ ngân hàng,Momo,các chương trình khuyến&nbsp;mãi hàng tuần...và được hưởng quyền lợi hấp dẫn khi tham gia chương trình khách hàng thân thiết.</div><div>&nbsp;</div><div>---------------------------------------</div><div>OsiFood - Điểm đến mỗi ngày&nbsp;</div><div>&nbsp;</div><div><p style=\"text-align: center\"><img src=\"//file.hstatic.net/200000459373/file/vbf_0401_ae1df0744b7b451a8041caa5d20bca72_grande.jpg\"></p><p style=\"text-align: center\"><img src=\"//file.hstatic.net/200000459373/file/vbf_0410_e24ba1c2e4274242b4fe517687171439_grande.jpg\"></p><p style=\"text-align: center\"><img src=\"//file.hstatic.net/200000459373/file/vbf_0412_847ed976d39c4db0af84176f47ec621b_grande.jpg\"></p><p style=\"text-align: center\"><img src=\"//file.hstatic.net/200000459373/file/vbf_0437_334e35f68d054c47ab768a3deea47303_grande.jpg\"></p><p style=\"text-align: center\"><img src=\"//file.hstatic.net/200000459373/file/z3609372179325_db4bd84ec738435bc2d7acff1eb703a7_4287fb11f3eb44d2a7a7b6510781eab9_grande.jpg\"></p><p style=\"text-align: center\"><img src=\"//file.hstatic.net/200000459373/file/z3609372195813_9cf40acd1de0d736a89ea08e1b85d627_4ed1cc9e729d4adbad8fd4de81d5d16f_grande.jpg\"></p><p style=\"text-align: center\"><img src=\"//file.hstatic.net/200000459373/file/z3609372193556_c949a6fd72d97050cd9fb095396f4d2f_6636cadb00cc4ef99f577d3418b86355_grande.jpg\"></p><p style=\"text-align: center\"><img src=\"//file.hstatic.net/200000459373/file/z3609372184593_73147689842d55f52bcc6209ffeb7ed9_013b6c4b3d234d27855a8f8a8f628ac8_grande.jpg\"></p><p style=\"text-align: center\"><img src=\"//file.hstatic.net/200000459373/file/z3609372173367_c7a397401e38da030f94946f1a413aa5_be4df4b2be014c0d86afeb1cd64d870d_grande.jpg\"></p><p style=\"text-align: center\"><img src=\"//file.hstatic.net/200000459373/file/z3609372157131_7d03cb9d63014922d5984dff51a539c4_fbbfdc812a144fa5bb63e3153d2d7a3c_grande.jpg\"></p><p style=\"text-align: center\"><img src=\"//file.hstatic.net/200000459373/file/z3609372152256_1fd21af737a120aa83c8a6ff72be8ac0_0bea879915f349b4a278dc82c21740f8_grande.jpg\"></p><p style=\"text-align: center\"><img src=\"//file.hstatic.net/200000459373/file/z3609372147449_e7468f7431631f8d1a5a6b338835947e_e8a7750fe1cf476683a1f8bc3c5edc7f_grande.jpg\"></p><p style=\"text-align: center\"><img src=\"//file.hstatic.net/200000459373/file/z3609372163394_1c091078d3a17912b48b433d719a85f9_a077ecb7e79e48e0be4107db08d6ac9b_grande.jpg\"></p><p style=\"text-align: center\"><img src=\"//file.hstatic.net/200000459373/file/z3609372168322_4a7e7b371268bea082fb5c15f6bfdd8b_6ec31c59614b45f0b72c2b72e1a644f6_grande.jpg\"></p><p>&nbsp;</p></div></div>', 2, 2147483647, 'https://file.hstatic.net/200000459373/article/z3609372179325_db4bd84ec738435bc2d7acff1eb703a7_9e07e316b8114b1a8e454e12728d4395.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment`
--

DROP TABLE IF EXISTS `blog_comment`;
CREATE TABLE `blog_comment` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_comment`
--

INSERT INTO `blog_comment` (`id`, `blog_id`, `comment`, `author_id`, `date_created`) VALUES
(1, 1, 'Bài viết rất hay và bổ ích.', 3, 0),
(2, 1, 'Test Comment', 13, 1670092287),
(3, 2, 'Test comment 2', 13, 1670092340);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'ACECOOK'),
(2, 'OsiFood'),
(3, 'Vinamilk'),
(4, 'Trường phát'),
(5, 'Vissan'),
(6, 'Barona'),
(7, 'CP');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `first_name` int(11) NOT NULL,
  `last_name` int(11) NOT NULL,
  `phone` int(10) NOT NULL,
  `address` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payment_method` int(11) NOT NULL,
  `shipping_option` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `card_name` int(11) NOT NULL,
  `card_number` int(11) NOT NULL,
  `expiration` int(11) NOT NULL,
  `cvv` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `first_name`, `last_name`, `phone`, `address`, `payment_method`, `shipping_option`, `card_name`, `card_number`, `expiration`, `cvv`) VALUES
(1, 0, 0, 523840380, '109/5, Thai Phien, P.2, DQ.11', 0, 'Standard Delivery', 0, 0, 0, 0),
(2, 0, 0, 523840380, '109/5, Thai Phien, P.2, DQ.11', 0, 'Standard Delivery', 0, 0, 0, 0),
(3, 0, 0, 523840380, '109/5, Thai Phien, P.2, DQ.11', 0, 'Standard Delivery', 0, 1234567890, 12345, 1234);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `last_login` int(11) NOT NULL DEFAULT current_timestamp(),
  `date_created` int(11) NOT NULL DEFAULT current_timestamp(),
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `first_name`, `last_name`, `phone`, `email`, `address`, `last_login`, `date_created`, `is_admin`) VALUES
(1, 'dinhthevinh0310', 'fc5e038d38a57032085441e7fe7010b0', 'Vinh', 'Đinh Thế', '0837511890', 'vinh@mail.com', '123/45, Đường kiêng, P.1, Q.2', 1669660374, 1669306417, 1),
(2, 'rando1234', 'ac76718192c2583d4b43bdebedeb2305', 'Rando', 'Strenga', '088209329', 'dando@mail.com', '15C, Vu Huy Tan, P.3, Q.Binh Thanh, TPHCM', 1669660374, 1669306417, 0),
(3, 'nguyenvana321', '6f4d374f49e5b8a323657efe0b3f4fc2', 'A', 'Nguyễn Văn', '0753613895', 'nguyen.van.a@mail.com', '49/10 Luy Ban Bich, P.Tan Thoi Hoa \n\nQ.Tan Phu, Ho Chi Minh', 1669660374, 1669306417, 0),
(6, 'tranvanb123', 'fc5e038d38a57032085441e7fe7010b0', 'B', 'Trần Văn', '0739690215', 'tran.van.b@mail.com', '466, Vinh Vien, P.8, Q.10', 1669660374, 1669308167, 0),
(13, 'johncena', 'fc5e038d38a57032085441e7fe7010b0', 'Vinh', 'Dinh The', '0523840380', 'dtvince0310@gmail.com', '109/5, Thai Phien, P.2, DQ.11', 1670092645, 1669489457, 0),
(15, 'testuser', 'fc5e038d38a57032085441e7fe7010b0', 'Test', 'User', '0123456789', 'test@mail.com', '4272 Harrison Street, San Francisco', 1670010702, 1670010702, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

DROP TABLE IF EXISTS `order_item`;
CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 0,
  `customer_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `product_id`, `quantity`, `status`, `customer_id`, `invoice_id`) VALUES
(38, 3, 6, 1, 13, 1),
(40, 5, 9, 1, 13, 1),
(41, 1, 12, 1, 13, 2),
(42, 5, 9, 1, 13, 2),
(43, 6, 7, 1, 13, 2),
(44, 5, 9, 1, 13, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `image` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `brand` int(11) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `rating` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `image`, `description`, `brand`, `stock`, `rating`) VALUES
(1, 'Mì Hảo Hảo tôm chua cay gói 75g', 4400, 'https://product.hstatic.net/200000459373/product/mi-hao-hao-vi-tom-chua-cay-goi-75g-202110110919568290_eb7b81d74d5c4aa3b999d39ea0920724_master.jpg', '<div class=\"description-productdetail typeList-style\">	<h2>&nbsp;</h2><p><strong>Mì Hảo Hảo tôm chua cay gói 75g s</strong>ợi mì vàng dai ngon hòa quyện trong nước súp tôm chua cay&nbsp;Hảo Hảo, đậm đà thấm đẫm từng sợi sóng sánh cùng hương thơm quyến rũ ngất ngây.<strong> Mì Hảo Hảo tôm chua cay gói 75g</strong> là lựa chọn hấp dẫn không thể bỏ qua đặc biệt là những ngày bận rộn cần bổ sung năng lượng nhanh chóng đơn giản mà vẫn đủ chất</p><ul><li><strong>Loại mì</strong> :&nbsp;Mì nước</li><li><strong>Vị mì </strong>:&nbsp;Tôm chua cay</li><li><strong>Sợi mì</strong> :&nbsp;Sợi tròn, nhỏ</li><li><strong>Khối lượng</strong> :&nbsp;75g / gói</li><li><strong>Thành phần</strong> :&nbsp;VẮT MÌ - Bột mì (bổ sung vi chất (kẽm, sắt)), dầu thực vật (dầu cọ, chất chống oxy hoá (BHA (320), BHT (321))), tinh bột, muối, đường, nước mắm, chất điều vị (mononatri glutamat (621)), chất ổn định (pentanatri triphosphat (451(i), kali carbonat (501(i))), chất điều chỉnh độ acid (natri carbonat (500(i))), bột nghệ, chất tạo màu tự nhiên (curcumin (100(i))). CÁC GÓI GIA VỊ - Đường, muối, dầu thực vật (dầu cọ, chất chống oxy hoá (BHA (320), BHT (321))), chất điều vị (mononatri glutamat (621), dinatri 5\'-inosinat (631), dinatri 5\'-guanylat (627)), các gia vị, chất điều chỉnh độ acid (acid citric (330)), bột tôm 2,83 g/kg, hành lá sấy, nước mắm, chất tạo màu tự nhiên (paprika oleoresin (160c), curcumin (100(i)), chất tạo ngọt tổng hợp (aspartam (951)).</li><li><strong>Cách dùng</strong> :&nbsp;Cho vắt mì, gói súp và gói dầu vào tô. Chế nước sôi vào khoảng 400 ml, đậy nắp lại và chờ 3 phút. Trộn đều và dùng được ngay.</li><li><strong>Bảo quản</strong> :&nbsp;Để nơi khô ráo, thoáng mát tránh ánh nắng mặt trời.</li><li><strong>Sản xuất tại</strong> :&nbsp;Việt Nam</li></ul><p><strong>Mì Hảo Hảo tôm chua cay gói 75g</strong>&nbsp;là hương vị&nbsp;mì ăn liền&nbsp;yêu thích và quen thuộc đối với người Việt. Tuy vậy, ít ai biết rằng Hảo Hảo là thương hiệu đầu tiên giới thiệu hương vị này tại thị trường Việt từ 20 năm về trước.<br><br>Với&nbsp;Hảo Hảo, bạn sẽ có những trải nghiệm ẩm thực hoàn toàn khác biệt với sợi mì dai ngon kết hợp với nước súp đậm đà, mùi vị đặc trưng, mang đến cái ngon đầy xúc cảm ngay từ lúc chế biến cho đến khi thưởng thức xong.&nbsp;<br><br>Mỗi gói&nbsp;<strong>Mì Gói Hảo Hảo Tôm Chua Cay </strong>là sự hòa trộn hoàn hảo của sợi mì dai dai cùng nước súp thanh thanh vị chua, cay nồng vị ớt, đậm đà vị tôm, kích thích mọi giác quan khiến bạn không thể ngừng đũa.</p><p>&nbsp;</p><p><strong>OsiFood -&nbsp; Điểm đến mỗi ngày</strong></p>	</div>', 1, 300, 5),
(2, 'Hủ tiếu Nhịp Sống - Sườn heo thùng 30 gói', 267000, 'https://product.hstatic.net/200000459373/product/hu-tieu-nhip-song-vi-suon-heo-70g-thung-30-3-org_04a15498bbde49f8a0016fac3845722a_master.jpg', '<div class=\"description-productdetail typeList-style\">	Hủ tiếu Nhịp Sống - Sườn heo thùng 30 gói<div>&nbsp;</div><div><strong>OsiFood -&nbsp; Điểm đến mỗi ngày</strong></div>	</div>', 1, 100, 5),
(3, 'Mì Modern lẩu thái tôm ly 67g', 8400, 'https://product.hstatic.net/200000459373/product/mi-modern-lau-thai-tom-ly-65g-202207051319061550_4d143065aade446692f26eb315270b69_master.jpg', '<div><p><strong>Mì Modern lẩu thái tôm ly 67g</strong> sợi mì&nbsp;vàng&nbsp;dai ngon hòa quyện trong nước súp mì Modern&nbsp;vị lẩu Thái tôm đậm đà thấm đều trong từng sợi cùng hương thơm lừng quyến rũ ngất ngây.<strong>Mì Modern lẩu thái tôm ly 67g&nbsp;</strong>tiện lợi thơm ngon là một lựa ngọn hấp dẫn cho những bữa ăn nhanh gọn, đơn giản và đầy đủ dưỡng chất</p><ul><li><strong>Loại mì</strong> : Mì nước</li><li><strong>Vị mì</strong> : Lẩu Thái tôm</li><li><strong>Sợi mì</strong> : Sợi tròn, nhỏ</li><li><strong>Khối lượng</strong> : 65g</li><li><strong>Thành phần</strong>: VẮT MÌ - Bột mì, shortening (dầu cọ, chất chống oxy hoá (BHA (320), BHT (321))), tinh bột, muối, đường, dịch chiết xuất từ cá, chất điều vị (mononatri glutamat (621)), chất ổn định (pentanatri triphosphat (451 (i)), kali carbonat (501 (i))), chất nhũ hoá (natri cacboxymethyl cellulose (466)), chất điều chỉnh dộ acid (natri carbonat (500(i))), bột nghệ, phẩm màu (curcumin (100(i))).<p>CÁC GIA VỊ - Muối, đường, dầu tinh luyện (dầu cọ, chất chống oxy hoá (BHA (320), BHT (321))), các gia vị, tôm 13,93 g/kg (cá, phẩm màu (paprika oleoresin (160c), carmin (120))), chất điều vị (mononatri glutama (621), dinatri 5\'-inosinat (631), dinatri 5\'-guanylat (627)), chất điều chỉnh độ acid (acid tartric (334), acid citric (330)), hành lá sấy, tinh bột, phẩm màu (paprika oleoresin (160c), curcumin (100(i))), hương chanh tổng hợp, dịch chiết xuất từ cá, chất tạo ngọt (aspartam (951)).</p></li><li><strong>Cách dùng</strong>: Mở nắp ly đến vạch có mũi tên, cho gói súp và gói dầu vào. Chế nước sôi đến vạch của ly, đậy nắp lại chờ 3 phút. Trộn đều và dùng được ngay.</li><li><strong>Bảo quản</strong>: Bảo quản nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp. Không để gần hóa chất hoặc sản phẩm có mùi mạnh.</li><li><strong>Thương hiệu</strong>: Modern (Việt Nam)</li></ul></div>', 1, 100, 4),
(4, 'Sữa đặc có đường Ngôi Sao Phương Nam xanh 1284g', 66900, 'https://product.hstatic.net/200000459373/product/sua-dac-ngoi-sao-phuong-nam-hop-giay-1284g-2-org_35f7f3e04f4a4a25a232e7ac92c5d62c_master.jpg', '<div><p><strong>Loại sữa:</strong>&nbsp;Sữa&nbsp;đặc có đường Ngôi Sao Phương Nam xanh</p><p><strong>Dung tích:</strong>&nbsp;1284g</p><p><strong>Phù hợp với:</strong>&nbsp;Trẻ từ 1 tuổi trở lên</p><p><strong>Cách mở nắp:&nbsp;</strong>Cắt nắp</p><p><strong>Lưu ý:&nbsp;</strong>Bao bì có thể thay đổi theo từng lô sản xuất, nhưng không ảnh hưởng đến chất lượng của sản phẩm</p><p><strong>Thương hiệu:&nbsp;</strong>Vinamilk</p><p><strong>Sản xuất tại:&nbsp;</strong>Việt Nam</p><p><strong>OsiFood -&nbsp; Điểm đến mỗi ngày</strong></p></div>', 3, 100, 4.9),
(5, 'Sữa tươi tiệt trùng Vinamilk dưỡng chất hương socola lốc 4 hộp 180ml', 32200, 'https://product.hstatic.net/200000459373/product/c-4-hop-sua-tuoi-socola-vinamilk-100-sua-tuoi-180ml-202104091037020668_1abe35ac51ad4176b6e77723c76b52ab_master.jpg', '<div>	<p><strong>Loại sữa:</strong>&nbsp;Sữa tươi tiệt trùng Vinamilk dưỡng chất&nbsp;hương socola lốc 4 hộp 180ml</p><p><strong>Dung tích:</strong>&nbsp;180ml/hộp</p><p><strong>Phù hợp với:</strong>&nbsp;Trẻ từ 1 tuổi trở lên</p><p><strong>Lưu ý:&nbsp;</strong>Bao bì có thể thay đổi theo từng lô sản xuất, nhưng không ảnh hưởng đến chất lượng của sản phẩm</p><p><strong>Thương hiệu:&nbsp;</strong>Vinamilk</p><p><strong>Sản xuất tại:&nbsp;</strong>Việt Nam</p></div>', 3, 100, 4),
(6, 'Thịt vai heo 100g Vissan', 13600, 'https://product.hstatic.net/200000459373/product/_ngon_mieng__hap_dan_nhu_muop_huong_xao_thit__muop_huong_xao_tom_g__4__1a745a4d0cbd469d853dab7e40d52d9a_master.jpg', '<div>	<strong>Thịt vai heo 100g Vissan&nbsp;</strong>là phần thịt đặc trưng được lấy từ đùi trước (vai) của heo bao gồm nạc, mỡ và da.<div>&nbsp;</div><div><strong>Quy cách </strong>: 100g</div><div><strong>Thương hiệu</strong> : Vissan</div><div><strong>Xuất xứ :</strong> Việt Nam</div>	</div>', 5, 100, 4.4),
(7, 'Bò xào Úc Vissan 100g', 28000, 'https://product.hstatic.net/200000459373/product/bo-xao_b099a9ad30bd4ec38e8d1502a866ec78_master.jpg', '<div>	<strong>Bò xào Úc Vissan 100g</strong><div>&nbsp;</div><div><strong>Quy cách</strong> : 100g</div><div><strong>Thương hiệu</strong> : Vissan</div></div>', 5, 100, 4.5),
(8, 'Chả lụa Vissan 250g', 55300, 'https://product.hstatic.net/200000459373/product/untitled_design__16__fe6643d91aa44d4e8e382efec94bb65d_master.png', '<div>	<strong>Loại sản phẩm:&nbsp;</strong>Chả lụa Vissan 250g<div><p><strong>Khối lượng:&nbsp;</strong>250g</p><p><strong>Bảo quản:&nbsp;</strong>Bảo quản ở nhiệt độ từ 0 - 4 độ C hoặc trong ngăn mát tủ lạnh</p><p><strong>Thương hiệu:&nbsp;</strong>Vissan</p><p><strong>Nơi sản xuất:&nbsp;</strong>Việt Nam</p></div>', 5, 100, 4.4);

-- --------------------------------------------------------

--
-- Table structure for table `product_comment`
--

DROP TABLE IF EXISTS `product_comment`;
CREATE TABLE `product_comment` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `comment` mediumtext NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_comment`
--

INSERT INTO `product_comment` (`id`, `product_id`, `author_id`, `rate`, `comment`, `date_created`) VALUES
(1, 1, 13, 5, 'Giao hàng nhanh, nhân viên phục vụ tốt.', 0),
(2, 1, 3, 5, 'Sản phẩm được bao gói cẩn thận, còn tươi khi nhận hàng. Nhân cũng tốt.', 1669814414),
(3, 1, 13, 0, 'Wow thật uy tính', 1670085278),
(5, 1, 13, 0, 'Test comment', 1670085628),
(6, 1, 13, 0, 'Test comment 2', 1670087451),
(7, 1, 13, 0, 'Test comment 3', 1670087562);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_comment`
--
ALTER TABLE `product_comment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_comment`
--
ALTER TABLE `product_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
