<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/GoGreen/public/bootstrap/css/bootstrap.min.css">
    <script src="/GoGreen/public/jquery/jquery-3.6.1.min.js"></script>
    <script src="/GoGreen/public/bootstrap/js/bootstrap.min.js"></script>
    <title><?php echo $title?></title>
</head>
<body>
    <div class="container"><?php 
    require_once PATH_PAGES.$name.".php";
    ?></div>
</body>
</html>