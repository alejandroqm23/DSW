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
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo ROUTER::create_action_url("demo/index") ?>"><?php echo $app->appName ?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li <?php if ($_GET["r"] == "demo/index") { echo "class='active'";} ?>><a href="<?php echo ROUTER::create_action_url("demo/index") ?>">Pokemon</a></li>
            <li <?php if ($_GET["r"] == "demo/login") { echo "class='active'";} ?>><a href="<?php echo ROUTER::create_action_url("demo/login") ?>">Habilidades</a></li>
              <li><a href="<?php echo ROUTER::create_action_url("demo/logout") ?>"><img src='<?php echo URL::base_url()."/resource/images/boton_logout.png" ?>'></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container" style="margin-top: 50px;">
      <h1><?php echo $meta["place"] ?></h1>
    </div>
    <div class="container">
    <?php
      include $content;
    ?>
    </div>
  </body>
</html>
