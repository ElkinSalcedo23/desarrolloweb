<?php 
header("Content-Type: text/html;charset=utf-8");
require_once 'Modelo/Login.Modelo.php';
class LoginControlador{

public function __CONSTRUCT(){
  $this->model = new LoginModelo();
}
public function Index(){
    require_once 'Vista/login.php';
}
public function Registro(){
  require_once 'Vista/registrarusu.php';
}
public function Inicionormal(){
  require_once 'Vista/usuario.php';
}
public function Inicioadm(){
  require_once 'Vista/admin.php';
}
public function Iniciomusico(){
  require_once 'Vista/musico.php';
}
public function Inicioagrupacion(){
  require_once 'Vista/agrupacion.php';
}

public function validar(){ 
  if (isset($_REQUEST['NombreUsuario']) && isset($_REQUEST['ClaveUsuario'])){

    $r=$this->model->ValidarUsuario($_REQUEST['NombreUsuario'],md5($_REQUEST['ClaveUsuario']));

    if ($r!=null){
       
        if ($_SESSION['Rol']=='Administrador') {
          header('location: ?c=Login&a=Inicioadm');
        }elseif ($_SESSION['Rol']=='Normal'){
              header('location: ?c=Login&a=Inicionormal');
        }elseif ($_SESSION['Rol']=='Musico'){
              header('location: ?c=Login&a=Iniciomusico');
        }elseif ($_SESSION['Rol']=='Agrupacion'){
              header('location: ?c=Login&a=Inicioagrupacion');
        }

    }else{
        header('location: ?c=Login&a=Index&msj=4');
    }
  } 
}
public function Salir(){
        $_SESSION = array();
        session_destroy();
        header('location: ?c=Login&a=Index');
}

} ?>