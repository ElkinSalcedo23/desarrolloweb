<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="asset/css/estilo.css">
  <script type="text/javascript" src="asset/js/main.js"></script>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<style type="text/css">
  button.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    text-align: left;
    border: none;
    outline: none;
    transition: 0.4s;
}

/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
button.accordion.active, button.accordion:hover {
    background-color: #ddd;
}

/* Style the accordion panel. Note: hidden by default */
div.panel {
    padding: 0 18px;
    background-color: white;
    display: none;
}

/* The "show" class is added to the accordion panel when the user clicks on one of the buttons. This will show the panel content */
div.panel.show {
    display: block;
}
</style>
</head>
<body>
  <div class="login-page">
    <div class="form">
    <h2>Login</h2>
      <?php include('Vista/php/mensajes.php'); ?>
      <form class="login-form" method="post" action="?c=Login&a=validar">
        <input type="email" name="NombreUsuario" placeholder="correo"/>
        <input type="password" name="ClaveUsuario" placeholder="Contraseña"/>
        <button name="btn-login">login</button></br>
      </form></br>
      <button class="accordion">Registrarme</button>
      <div class="panel">
        <center><h2>Registrate</h2></center></br>
        <div class="col-md-12" id="vacorreo"></div>
          <form role="form" action="Vista/php/registroU.php" method="post">
              <div class="form-group">
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Introduce tu nombre">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Introduce tus apellidos">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="correo" id="correo" placeholder="Introduce tu email">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" 
                       placeholder="Contraseña">
              </div>
            <div class="form-group">
                <select name="sexo"  class="form-control" required="">
                  <option value="">Selecione un Sexo</option>
                  <option value="Masculino">Masculino</option>
                  <option value="Femenino">Femenino</option>
                </select>
            </div>
             <div class="form-group">
                
             </div>
             <div class="form-group">
                <center><button type="submit" name="btn-reg" class="btn btn-info">Registrar</button></center>
             </div>
            </form>
      </div>

    </div>
  </div>
  <script type="text/javascript">
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].onclick = function(){
            this.classList.toggle("active");
            this.nextElementSibling.classList.toggle("show");
        }
    }
  </script>
</body>
</html>