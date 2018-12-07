<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $meta["title"] ?></title>
    <meta name="descripcion" content="<?php echo $meta["descripcion"] ?>">
    <meta name="keywords" content="<?php echo $meta["keywords"] ?>">
    <meta name="robots" content="<?php echo $meta["robots"] ?>">
    <link rel="icon" type="image/png" href='<?php echo URL::base_url()."/resource/images/icono.png" ?>' />
    <link rel="stylesheet" type="text/css" href="<?php echo URL::base_url()."/bootstrap/css/bootstrap.min.css" ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="<?php echo URL::base_url()."/bootstrap/js/jquery.js" ?>"></script>
    <script type="text/javascript" src="<?php echo URL::base_url()."/bootstrap/js/bootstrap.min.js" ?>"></script>
  </head>
  <body>
    <?php

    include $content;

    ?>
  </body>
</html>
