<?php 
class musicoModelo{
private $pdo;

public function __CONSTRUCT(){
  require('asset/Conexion/conexion.php');
}
public function Listar(){
   		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM musico ");
			$stm->execute();
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new musico();
				$alm->__SET('Id', $r->id_musico);
				$alm->__SET('Instrumento', $r->instrumento);
				$alm->__SET('Aptitudes', $r->aptitudes);
				$alm->__SET('Id_usu', $r->id_usu_mus);
				$alm->__SET('Correo_usu', $r->id_usu_mus);
				
				$result[] = $alm;
			}
			return $result;
		}
		catch(Exception $e)
		{
			return null;
		}
}
public function Existe($Usuario){
	header("Content-Type: text/html;charset=utf-8");
       try{
		$stm = $this->pdo->prepare("SELECT * FROM musico m WHERE m.id_usu_mus= ?");
		$stm->execute(array($Usuario));
		$r = $stm->fetch(PDO::FETCH_OBJ);
		if ($r !=null) 
		{ 
			$x=1;      
		}else{
			$x=0;
		}
		return $x;

	} catch (Exception $e) 
	{
		die($e->getMessage());
	}
}

public function Adicionar(musico $data)
{
	try 
	{
	    $sql = "INSERT INTO public.musico( instrumento, aptitudes, id_usu_mus) VALUES (?, ?, ?);";
		$res=$this->pdo->prepare($sql)
		 ->execute(
			       array(
			       		$data->__GET('Instrumento'),
			       		$data->__GET('Aptitudes'),
						$data->__GET('Id_usu')
						)
				);
		return $res;	
	} catch (Exception $e) 
	{
			 return $e;
	}
		
}

public function Actualizar(usuario $data)
{
	try 
	{
         $sql = "UPDATE usuario SET 
         nombre= ? ,
         apellido= ?,  
         correo= ? ,
         sexo= ? ,
         roles= ?
          WHERE id_usuario = ?";

	     $res=$this->pdo->prepare($sql)
					     ->execute(
						array( 
							$data->__GET('Nombre'), 
							$data->__GET('Apellido'),
							$data->__GET('Email'),
							$data->__GET('Sexo'),
							$data->__GET('Rol'),
							$data->__GET('Id')
							)
						);
		 return $res;	   
	} catch (Exception $e) 
	{
		return $e;
	}		
}

public function ActualizarEstado($correo)
{
	try 
	{
         $sql = "UPDATE usuario SET 
         estado= ?
          WHERE correo= ?";

	     $res=$this->pdo->prepare($sql)
					     ->execute(
						array( 
							'Habilitado', 
							$correo
							)
						);
		 return $res;	   
	} catch (Exception $e) 
	{
		return $e;
	}		
}


	public function Obtener($id){
		try 
		{
		     $stm = $this->pdo
				          ->prepare("SELECT * FROM usuario WHERE id_usuario = ?");
		     $stm->execute(array($id));
		     $r = $stm->fetch(PDO::FETCH_OBJ);
		     $alm = new usuario();
					$alm->__SET('Id', $r->id_usuario);
					$alm->__SET('Nombre', $r->nombre);
					$alm->__SET('Apellido', $r->apellido);
					$alm->__SET('Email', $r->correo);
					$alm->__SET('Estado', $r->estado);
					$alm->__SET('Rol', $r->roles);
					$alm->__SET('Sexo', $r->sexo);
			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo->prepare("DELETE FROM usuario WHERE id_usuario = ?");			          
			$stm->execute(array($id));
		} catch (Exception $e) 
		{
				die($e->getMessage());
		}
	}
	
	public function Bloquear($id)
	{
		try 
		{
			 $stm = $this->pdo
				          ->prepare("SELECT * FROM usuario WHERE id_usuario = ?");
		     $stm->execute(array($id));
		     $r = $stm->fetch(PDO::FETCH_OBJ);

		     if ($r->estado == 'Habilitado') {

		     	$sql = $sql = "UPDATE usuario SET estado = 'Inhabilitado' WHERE id_usuario = ?";
		        $res=$this->pdo->prepare($sql)->execute(array($id));

		     }else{

		     	$sql = $sql = "UPDATE usuario SET estado = 'Habilitado' WHERE id_usuario = ?";
		        $res=$this->pdo->prepare($sql)->execute(array($id));
		     }

			 return $res;	   
		} catch (Exception $e) 
		{
			return 0;
		}		
	}

}
?>