<?php 
require_once 'Modelo/Entidad.usuario.php';
require_once 'Modelo/usuario.Modelo.php';
class UsuarioControlador{
    
public function __CONSTRUCT(){
    $this->model = new usuarioModelo();
}

public function Index(){
    $alm = new usuario();
     if (isset($_GET['Id'])) {
         $alm =$this->model->Obtener($_GET['Id']);
     }
   require_once 'Vista/php/crudusuario.php';
} 
public function Confirmacion(){
  require_once 'Vista/confirmacion.php';
}


public function Adicionar(){
        $alm = new usuario();
        $alm->__SET('Nombre', $_REQUEST['nombre']);
        $alm->__SET('Apellido', $_REQUEST['apellido']);
        $alm->__SET('Email', $_REQUEST['correo']); 
        $alm->__SET('ClaveUsuario', md5($_REQUEST['password']));
        $alm->__SET('Sexo', $_REQUEST['sexo']);
        $alm->__SET('Rol', $_REQUEST['rol']);
        $alm->__SET('Estado', 'Inhabilitado');
        $z=$this->model->Existe($_REQUEST['correo']);
        if($z!=1){
            $res=$this->model->Adicionar($alm);
            if ($res>0) {
                $c=base64_encode($_REQUEST['correo']);
                $mail = "Para confirmar tu cuenta has click en el siguiente enlace: http://localhost/login_CRUD/?c=Usuario&a=Confirmacion&cor=".$c;
                //Titulo
                $titulo = "CONFIRMACION DE CORREO";
                //cabecera
                $headers = "MIME-Version: 1.0\r\n"; 
                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
                //dirección del remitente 
                $headers .= "From: joelvilla@gmail.com >\r\n";
                //Enviamos el mensaje a tu_dirección_email 
                $bool = mail($_REQUEST['correo'],$titulo,$mail,$headers);
                if($bool){
                    echo "Mensaje enviado";
                }else{
                    echo "Mensaje no enviado";
                }

               header('Location:  ?c=Usuario&a=Index&msj=3'); 
            }else{
               header('Location:  ?c=Usuario&a=Index&msj=5');
            }
        }else{
            header('Location:  ?c=Usuario&a=Index&msj=8');
        }
        
}
public function Cambioestado($correo){
    $this->model->ActualizarEstado($correo);
}
public function Validac(){
    if (isset($_GET['cor'])) {
        $x=$this->model->Existe($_GET['cor']);
        if($x==1){
            echo"<p class='bg-danger' style='padding:10px; border-radius:0.5em;color:red;'>Este correo ya se encuentra registrado</p>";
        }else{
            echo"<p class='bg-success' style='padding:10px; border-radius:0.5em;color:green;'>Correo valido!!</p>";
        }
    }
}

public function Actualizar(){
        $alm = new usuario();
        $alm->__SET('Id', $_REQUEST['id']);
        $alm->__SET('Nombre', $_REQUEST['nombre']);
        $alm->__SET('Apellido', $_REQUEST['apellido']);
        $alm->__SET('Email', $_REQUEST['correo']); 
        $alm->__SET('Sexo', $_REQUEST['sexo']);
        $alm->__SET('Rol', $_REQUEST['rol']); 

        echo $alm->__GET('Nombre'); 
                            echo $alm->__GET('Apellido');
                            echo $alm->__GET('Email');
                            echo $alm->__GET('Sexo');
                            echo $alm->__GET('Rol');
                            echo $alm->__GET('Id');
        $res=$this->model->Actualizar($alm);
        if ($res>0) {
           header('Location:  ?c=Usuario&a=Index&msj=6'); 
        }else{
           header('Location:  ?c=Usuario&a=Index&msj=7');
        }
}

public function Eliminar(){
    $this->model->Eliminar($_REQUEST['Id']);
    header('Location: ?c=Usuario&a=Index');  
}

public function Bloquear(){
    $res=$this->model->Bloquear($_REQUEST['Id']);
    header('Location: ?c=Usuario&a=Index'); 
}
    
} ?>