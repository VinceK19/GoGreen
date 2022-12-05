<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title><?= isset($data["page_title"])? $data["page_title"] : $data["title"] ?></title>
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
    <script src="<?php print(BASE_URL)?>public/js/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    <!-- <script src="<?php print(BASE_URL)?>public/js/jquery-3.6.1.min.js"></script> -->
    <script src="<?php print(BASE_URL)?>public/js/popper.min.js"></script>
    <script src="<?php print(BASE_URL)?>public/js/bootstrap.min.js"></script>
    <script src="<?php print(BASE_URL)?>public/js/js.cookie.min.js"></script>

</head>
<body>
    <?php 
        require_once PATH_PAGES."admin-panel/".$name.".php";
    ?>

    <!-- ALL PLUGINS -->
    <script src="<?php print(BASE_URL)?>public/js/jquery.superslides.min.js"></script>
    <script src="<?php print(BASE_URL)?>public/js/bootstrap-select.js"></script>
    <script src="<?php print(BASE_URL)?>public/js/inewsticker.js"></script>
    <script src="<?php print(BASE_URL)?>public/js/bootsnav.js."></script>
    <script src="<?php print(BASE_URL)?>public/js/images-loded.min.js"></script>
    <script src="<?php print(BASE_URL)?>public/js/isotope.min.js"></script>
    <script src="<?php print(BASE_URL)?>public/js/owl.carousel.min.js"></script>
    <script src="<?php print(BASE_URL)?>public/js/baguetteBox.min.js"></script>
    <script src="<?php print(BASE_URL)?>public/js/form-validator.min.js"></script>
    <script src="<?php print(BASE_URL)?>public/js/contact-form-script.js"></script>
    <script src="<?php print(BASE_URL)?>public/js/custom.js"></script>
</body>
</html>