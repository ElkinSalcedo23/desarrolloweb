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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#correo").change(function(){
         $co=$('#correo').val();
         $('#vacorreo').load('?c=Usuario&a=Validac&cor='+$co);

    });
});
</script>
      
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
        <li><a href=""><img src="<?php echo $url;?>"  style="border-radius: 2.5em;" /></a></li>
        <li><a href="#" style="padding-top: 25px;"><b><?php echo $_SESSION['Nombre'].' '.$_SESSION['Apellido'];?></b></a></li>
        </li>
        <li><a class="navbar-brand" href="?c=Login&a=Salir" style="padding-top: 25px;">Salir</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

    <h2>Agrupación</h2>
    <?php include('mensajes.php'); ?>
      <?php if(isset($_REQUEST['Id'])){ ?>
      <form role="form" action="?c=Agrupacion&a=Adicionar" method="post">
          <input type="hidden" name="id" value="<?php echo $_REQUEST['Id']; ?>">
          <div class="form-group col-md-4">
            <label>Genero musical</label>
            <input type="text" class="form-control col-md-6" name="genero" placeholder="Genero musical">
          </div>
          <div class="form-group col-md-4">
            <label>Numeros de integrantes</label>
            <input type="number" class="form-control col-md-6" min="1" name="numero" placeholder="Instrumentos que ejecutas">
          </div>
          <div class="form-group col-md-4">
            <label>Tiempo de la agrupación</label>
            <input type="text" class="form-control col-md-6" name="tiempo" placeholder="Tiempo de existencia de la agrupacion">
          </div>
        <center><button type="submit" class="btn btn-success">Registrar</button></center>
      </form>
      <?php } ?>
      <table class="table table-striped">
        <thead>
          <tr>
            <td><b>NOMBRES</b></td>
            <td><b>APELLIDOS</b></td>
            <td><b>CORREO</b></td>
            <td><b>SEXO</b></td>
            <td><b>OPCIONES</b></td>
          </tr>
        </thead>
        <tbody>

                                        <?php  foreach($this->modelo->Listaragrupacion() as $r): ?>

                                                  <tr>
                                                    <td><?php echo $r->__GET('Nombre'); ?></td>
                                                    <td><?php echo $r->__GET('Apellido'); ?></td>
                                                    <td><?php echo $r->__GET('Email'); ?></td> 
                                                    <td><?php echo $r->__GET('Sexo'); ?></td>
                                                    <td width="50">
                                                       
                                                      <ACRONYM title="Editar perfil">
                                                        <a href="?c=Agrupacion&a=Index&Id=<?php echo $r->__GET('Id'); ?>" style=" margin: 8px 0px 0px 10px;" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span>
                                                        </a>
                                                      </ACRONYM>
                                                    </td>
                                                 </tr>

                                  <?php endforeach; ?>             
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>