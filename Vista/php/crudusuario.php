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

    <h2>Usuarios</h2>
      <?php include('mensajes.php'); ?>
      <form role="form" action="?c=Usuario&a=<?php echo $alm->Id > 0 ? 'Actualizar' : 'Adicionar'; ?>" method="post">
          <input type="hidden" name="id" value="<?php echo $alm->__GET('Id'); ?>">
          <div class="form-group col-md-6">
            <label>Nombres</label>
            <input type="text" class="form-control col-md-6" name="nombre" id="nombre" value="<?php echo $alm->__GET('Nombre'); ?>" placeholder="Introduce tu nombre">
          </div>
          <div class="form-group col-md-6">
            <label>Apellidos</label>
            <input type="text" class="form-control col-md-6" name="apellido" id="apellido" value="<?php echo $alm->__GET('Apellido'); ?>" placeholder="Introduce tus apellidos">
          </div>
          <div class="col-md-12" id="vacorreo"></div>
          <div class="form-group col-md-6">
            <label>Correo</label>
            <input type="email" class="form-control" name="correo" id="correo" value="<?php echo $alm->__GET('Email'); ?>" placeholder="Introduce tu email">
          </div>
          <div class="form-group col-md-6">
            <label>Contraseña</label>
            <input type="password" class="form-control" name="password" id="password" 
                   placeholder="Contraseña">
          </div>
        <div class="form-group col-md-6">
            <label for="ejemplo_password_1">Sexo</label>
            <select name="sexo"  class="form-control" required="">
              <option value="<?php echo $alm->__GET('Sexo'); ?>"><?php if($alm->__GET('Sexo')==""){echo "Selecione un Sexo";}else{echo $alm->__GET('Sexo'); }?></option>
              <option value="Masculino">Masculino</option>
              <option value="Femenino">Femenino</option>
            </select>
        </div>
         <div class="form-group col-md-6">
            <label for="ejemplo_password_1">Rol</label>
           <select name="rol"  class="form-control" required="">
            <option value="<?php echo $alm->__GET('Rol'); ?>"><?php if($alm->__GET('Rol')==""){echo "Selecione un Rol";}else{echo $alm->__GET('Rol'); }?></option>
            <option value="Normal">Normal</option>
            <option value="Musico">Musico</option>
            <option value="Agrupacion">Agrupacion</option>
            <option value="Administrador">Administrador</option>
          </select>
        </div>
        <center><button type="submit" class="btn btn-success"><?php echo $alm->__GET('Id') > 0 ? 'Modificar' : 'Registrar'; ?></button></center>
        </form>

      <table class="table table-striped">
        <thead>
          <tr>
            <td><b>ID</b></td>
            <td><b>NOMBRES</b></td>
            <td><b>APELLIDOS</b></td>
            <td><b>CORREO</b></td>
            <td><b>SEXO</b></td>
            <td><b>ROL</b></td>
            <td><b>ESTADO</b></td>
            <td><b>OPCIONES</b></td>
          </tr>
        </thead>
        <tbody>

                                        <?php  foreach($this->model->Listar() as $r): ?>

                                                  <tr>
                                                    <td><?php echo $r->__GET('Id'); ?></td> 
                                                    <td><?php echo $r->__GET('Nombre'); ?></td>
                                                    <td><?php echo $r->__GET('Apellido'); ?></td>
                                                    <td><?php echo $r->__GET('Email'); ?></td> 
                                                    <td><?php echo $r->__GET('Sexo'); ?></td>
                                                    <td><?php echo $r->__GET('Rol'); ?></td>
                                                    <td><?php echo $r->__GET('Estado'); ?></td> 
                                                    <td width="200">
                                                       <?php if($r->__GET('Estado')=="Habilitado"){?>
                                                        <ACRONYM title="Bloquear">
                                                        <a href="?c=Usuario&a=Bloquear&Id=<?php echo $r->__GET('Id'); ?>" style="margin: 8px 0px 0px 15px;" class="btn btn-warning">
                                                         <span class="glyphicon glyphicon-thumbs-down"></span>
                                                        </a>
                                                      </ACRONYM>
                                                      <?php }else{?>
                                                        <ACRONYM title="Habilitar">
                                                        <a href="?c=Usuario&a=Bloquear&Id=<?php echo $r->__GET('Id'); ?>" style="margin: 8px 0px 0px 15px;" class="btn btn-info">
                                                         <span class="glyphicon glyphicon-thumbs-up"></span>
                                                        </a>
                                                      </ACRONYM>
                                                       <?php }?>
                                                      <ACRONYM title="Editar">
                                                        <a href="?c=Usuario&a=Index&Id=<?php echo $r->__GET('Id'); ?>" style=" margin: 8px 0px 0px 10px;" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span>
                                                        </a>
                                                      </ACRONYM>
                                                      <ACRONYM title="Eliminar">
                                                        <a href="?c=Usuario&a=Eliminar&Id=<?php echo $r->__GET('Id'); ?>" style="margin: 8px 0px 0px 15px;" class="btn btn-danger">
                                                         <span class="glyphicon glyphicon-trash"></span>
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