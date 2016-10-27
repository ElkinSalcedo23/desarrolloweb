<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Agrupacion</title>
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
      <a class="navbar-brand" href="?c=Login&a=Inicionormal" style="padding-top: 25px;">Inicio</a>
      <a class="navbar-brand" href="?c=Agrupacion&a=Perfil" style="padding-top: 25px;">Perfil</a>
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

    <h2>Perfil de la Agrupación</h2>
      <center><table>
        <?php foreach($this->model->Listar($_SESSION['Id']) as $r): ?>
              <tr><td><b>Nombre: </b></td><td><?php echo $r->__GET('Nombre'); ?></td></tr>
              <tr><td><b>Apellido: </b></td><td><?php echo $r->__GET('Apellido'); ?></td></tr>
              <tr><td><b>Correo: </b></td>  <td><?php echo $r->__GET('Email'); ?></td> </tr>
              <tr><td><b>Sexo: </b></td><td><?php echo $r->__GET('Sexo'); ?></td></tr></table></center> 
              <?php include('php/mensajes.php'); ?>
              <form role="form" action="?c=Agrupacion&a=Actualizar" method="post">
                  <input type="hidden" name="id" value="<?php echo $r->__GET('Id'); ?>">
                  <div class="form-group col-md-4">
                    <label>Genero musical</label>
                    <input type="text" class="form-control col-md-6" name="genero" value="<?php echo $r->__GET('Genero'); ?>" placeholder="Genero musical">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Numeros de integrantes</label>
                    <input type="number" class="form-control col-md-6" min="1" name="numero" value="<?php echo $r->__GET('Nintegrantes'); ?>" placeholder="Instrumentos que ejecutas">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Tiempo de la agrupación</label>
                    <input type="text" class="form-control col-md-6" name="tiempo" value="<?php echo $r->__GET('Tiempo'); ?>" placeholder="Tiempo de existencia de la agrupacion">
                  </div>
                <center><button type="submit" class="btn btn-success">Actualizar</button></center>
              </form>
                                                    

        <?php endforeach; ?>   
      
    </div>
  </div>
</body>
</html>