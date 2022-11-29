<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title><?= $data["title"]?></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="<?php print(BASE_URL)?>public/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php print(BASE_URL)?>public/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php print(BASE_URL)?>public/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="<?php print(BASE_URL)?>public/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?php print(BASE_URL)?>public/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php print(BASE_URL)?>public/css/custom.css">
    <!-- ALL JS FILES -->
    <script src="/GoGreen/public/js/jquery-3.2.1.min.js"></script>
    <!-- <script src="/GoGreen/public/js/jquery-3.6.1.min.js"></script> -->
    <script src="/GoGreen/public/js/popper.min.js"></script>
    <script src="/GoGreen/public/js/bootstrap.min.js"></script>

</head>
<body>

    <?php 
        require_once PATH_COMPONENTS."header.php";
        require_once PATH_PAGES.$name.".php";
        require_once PATH_COMPONENTS."footer.php";
    ?>

    <!-- ALL PLUGINS -->
    <script src="/GoGreen/public/js/jquery.superslides.min.js"></script>
    <script src="/GoGreen/public/js/bootstrap-select.js"></script>
    <script src="/GoGreen/public/js/inewsticker.js"></script>
    <script src="/GoGreen/public/js/bootsnav.js."></script>
    <script src="/GoGreen/public/js/images-loded.min.js"></script>
    <script src="/GoGreen/public/js/isotope.min.js"></script>
    <script src="/GoGreen/public/js/owl.carousel.min.js"></script>
    <script src="/GoGreen/public/js/baguetteBox.min.js"></script>
    <script src="/GoGreen/public/js/form-validator.min.js"></script>
    <script src="/GoGreen/public/js/contact-form-script.js"></script>
    <script src="/GoGreen/public/js/custom.js"></script>
</body>
</html>