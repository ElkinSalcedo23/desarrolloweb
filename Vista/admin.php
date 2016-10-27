<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin</title>
  <link rel="stylesheet" href="asset/css/estilo.css">
  <script type="text/javascript" src="asset/js/main.js"></script>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
  <div class="login-page2">
    <div class="form2">

    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="?c=Login&a=Inicioadm" style="padding-top: 25px;">Inicio</a>
      <a class="navbar-brand" href="?c=Usuario&a=Index" style="padding-top: 25px;">Usuario</a>
      <a class="navbar-brand" href="?c=Musico&a=Index" style="padding-top: 25px;">Musicos</a>
      <a class="navbar-brand" href="?c=Agrupacion&a=Index" style="padding-top: 25px;">Agrupaciones</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
      <?php 
          $email=md5( strtolower( trim($_SESSION['Correo']) ) );
          $url="https://s.gravatar.com/avatar/".$email."?s=40";
      ?>
        <li><a><img src="<?php echo $url;?>"  style="border-radius: 2.5em;" /></a></li>
        <li><a style="padding-top: 25px;"><b><?php echo $_SESSION['Nombre'].' '.$_SESSION['Apellido'];?></b></a></li>
        </li>
        <li><a class="navbar-brand" href="?c=Login&a=Salir" style="padding-top: 25px;">Salir</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

    <h2>Administrador</h2>
     
    </div>
  </div>
</body>
</html>