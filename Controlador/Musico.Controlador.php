<?php 
require_once 'Modelo/Entidad.musico.php';
require_once 'Modelo/musico.Modelo.php';
require_once 'Modelo/Entidad.usuario.php';
require_once 'Modelo/usuario.Modelo.php';
class MusicoControlador{
    
public function __CONSTRUCT(){
    $this->model = new musicoModelo();
    $this->modelo = new usuarioModelo();
}

public function Index(){
    $alm = new musico();
     if (isset($_GET['Id'])) {
         $alm =$this->model->Obtener($_GET['Id']);
     }
   require_once 'Vista/php/crudmusico.php';
} 

public function Adicionar(){
        $alm = new musico();
        $alm->__SET('Instrumento', $_REQUEST['instrumento']);
        $alm->__SET('Aptitudes', $_REQUEST['aptitudes']);
        $alm->__SET('Id_usu', $_REQUEST['id']); 
        $z=$this->model->Existe($_REQUEST['id']);
        if($z!=1){
            $res=$this->model->Adicionar($alm);
            if ($res>0) {
               header('Location:  ?c=Musico&a=Index&msj=3'); 
            }else{
               header('Location:  ?c=Musico&a=Index&msj=5');
            }
        }else{
            header('Location:  ?c=Musico&a=Index&msj=9');
        }
        
}
/*

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
   */ 
} ?>