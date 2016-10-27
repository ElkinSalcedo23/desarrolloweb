<?php 
class agrupacionModelo{
private $pdo;

public function __CONSTRUCT(){
  require('asset/Conexion/conexion.php');
}
public function Listar($id){
   		try
		{
			$result = array();
			$stm = $this->pdo->prepare("SELECT * FROM public.usuario, public.agrupacion WHERE id_usuario=id_usu_agru AND id_usu_agru=?;");
			$stm->execute(array($id));
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new agrupacion();
				$alm->__SET('Id', $r->id_agrupacion);
				$alm->__SET('Nombre', $r->nombre);
				$alm->__SET('Apellido', $r->apellido);
				$alm->__SET('Sexo', $r->sexo);
				$alm->__SET('Email', $r->correo);
				$alm->__SET('Genero', $r->genero_musical);
				$alm->__SET('Nintegrantes', $r->n_integrantes);
				$alm->__SET('Tiempo', $r->tiempo_agrupacion);

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
		$stm = $this->pdo->prepare("SELECT * FROM agrupacion a WHERE a.id_usu_agru= ?");
		$stm->execute(array($Usuario));
		$r = $stm->fetch(PDO::FETCH_OBJ);
		if ($r!=null) 
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

public function Adicionar(agrupacion $data)
{
	try 
	{
	    $sql = "INSERT INTO public.agrupacion( genero_musical, n_integrantes, tiempo_agrupacion, id_usu_agru)  VALUES (?, ?, ?, ?);";
		$res=$this->pdo->prepare($sql)
		 ->execute(
			       array(
			       		$data->__GET('Genero'),
			       		$data->__GET('Nintegrantes'),
						$data->__GET('Tiempo'),
						$data->__GET('Id_usuario')
						)
				);
		return $res;	
	} catch (Exception $e) 
	{
			 return $e;
	}
		
}

public function Actualizar(agrupacion $data)
{
	try 
	{
         $sql = "UPDATE public.agrupacion SET  genero_musical=?, n_integrantes=?, tiempo_agrupacion=?
 		WHERE id_agrupacion=?;";

	     $res=$this->pdo->prepare($sql)
					     ->execute(
						array( 
							$data->__GET('Genero'),
				       		$data->__GET('Nintegrantes'),
							$data->__GET('Tiempo'),
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