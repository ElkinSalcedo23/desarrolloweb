<?php 
require_once 'Modelo/Entidad.agrupacion.php';
require_once 'Modelo/agrupacion.Modelo.php';
class AgrupacionControlador{
    
public function __CONSTRUCT(){
    $this->model = new agrupacionModelo();
    $this->modelo = new usuarioModelo();
}

public function Index(){
    $alm = new agrupacion();
     if (isset($_GET['Id'])) {
         $alm =$this->model->Obtener($_GET['Id']);
     }
   require_once 'Vista/php/crudagrupacion.php';
} 
public function Confirmacion(){
  require_once 'Vista/confirmacion.php';
}
public function Perfil(){
  require_once 'Vista/perfilagru.php';
}
public function Adicionar(){
        $alm = new agrupacion();
        $alm->__SET('Genero', $_REQUEST['genero']);
        $alm->__SET('Nintegrantes', $_REQUEST['numero']);
        $alm->__SET('Tiempo', $_REQUEST['tiempo']);
        $alm->__SET('Id_usuario', $_REQUEST['id']); 
        $z=$this->model->Existe($_REQUEST['id']);
        if($z!=1){
            $res=$this->model->Adicionar($alm);
            if ($res>0) {
               header('Location:  ?c=Agrupacion&a=Index&msj=3'); 
            }else{
               header('Location:  ?c=Agrupacion&a=Index&msj=5');
            }
        }else{
            header('Location:  ?c=Agrupacion&a=Index&msj=10');
        }
        
}

public function Actualizar(){
        $alm = new agrupacion();
        $alm->__SET('Genero', $_REQUEST['genero']);
        $alm->__SET('Nintegrantes', $_REQUEST['numero']);
        $alm->__SET('Tiempo', $_REQUEST['tiempo']);
        $alm->__SET('Id', $_REQUEST['id']); 

        $res=$this->model->Actualizar($alm);
        if ($res>0) {
           header('Location:  ?c=Agrupacion&a=Perfil&msj=6'); 
        }else{
           header('Location:  ?c=Agrupacion&a=Perfil&msj=7');
        }
}
/*
public function Eliminar(){
    $this->model->Eliminar($_REQUEST['Id']);
    header('Location: ?c=Usuario&a=Index');  
}

public function Bloquear(){
    $res=$this->model->Bloquear($_REQUEST['Id']);
    header('Location: ?c=Usuario&a=Index'); 
}*/
    
} ?>