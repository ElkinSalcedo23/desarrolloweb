<?php 
class LoginModelo{
private $pdo;

public function __CONSTRUCT(){
    require('asset/Conexion/conexion.php');
}
public function ValidarUsuario($NombreUsuario,$ClaveUsuario){
	header("Content-Type: text/html;charset=utf-8");
       try{
        $estado='Habilitado';
		$stm = $this->pdo->prepare("SELECT * FROM usuario WHERE 
				                         correo= ? and 
				                         passwd= ? ");
		$stm->execute(array($NombreUsuario , $ClaveUsuario));
		$r = $stm->fetch(PDO::FETCH_OBJ);
		if ($r !=null) 
		{ 
			if ($r->estado=='Habilitado') {
                  $_SESSION['Id']=$r->id_usuario;
                  $_SESSION['Nombre']=$r->nombre;
                  $_SESSION['Apellido']=$r->apellido;
                  $_SESSION['Sexo']=$r->sexo;
                  $_SESSION['Rol']=$r->roles;
		          $_SESSION['Correo'] = $r->correo; 
		          $_SESSION['Estado'] = $r->estado; 
			}else{
				return null;
			}      
		}
		return $r;

	} catch (Exception $e) 
	{
		die($e->getMessage());
	}
}
}
?>