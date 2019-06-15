<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>404 Page not found</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="public/css/default.css">
    <script src="main.js"></script>
</head>
<body>
    <?php  require_once 'views/header.php'?>
    <div class="container mx-auto">
        <main id="centerMain">
        <span class="clearfix"></span>

            <br><br>
            <h2 class="center error"><?php echo $this->message;  ?></h2>
            <br>
            <div>
                <img src="<?php echo constant('URL'); ?>/assets/notFound.png" alt="notFoundPage" class="center">
            </div>
        </main>
    </div>
    <?php require_once 'views/footer.php' ?>
    
</body>
</html>