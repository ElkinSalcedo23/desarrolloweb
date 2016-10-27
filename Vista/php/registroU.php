<?php
        require('../../Asset/Conexion/conf.php');
        $nom =$_REQUEST['nombre'];
        $ape= $_REQUEST['apellido'];
        $email=$_REQUEST['correo']; 
        $passw= md5($_REQUEST['password']);
        $sexo=$_REQUEST['sexo'];
        $rol='Normal';
        $est= 'Inhabilitado';

        try{
			$pdo = new PDO('pgsql:host='.$host.';port='.$puerto.';dbname='.$db.';user='.$usu.';password='.$pass);
			$pdo->exec("set names utf8");
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	        
		}
		catch(Exception $e){
			die($e->getMessage());
		}

         try{
        $estado='Habilitado';
		$stm = $pdo->prepare("SELECT * FROM usuario u WHERE 
				                         u.correo= ?");
		$stm->execute(array($_REQUEST['correo']));
		$r = $stm->fetch(PDO::FETCH_OBJ);
		if ($r !=null) 
		{ 
			 header('Location:  ../../?c=Login&a=Index&msj=8');    
		}else{

			try 
			{
			    $sql = "INSERT INTO usuario (nombre, apellido, correo, passwd, sexo, estado, roles) VALUES (?, ?, ?, ?, ?, ?, ?)";
				$res=$pdo->prepare($sql)
				 ->execute(
					       array(
					       		$nom,
					       		$ape,
								$email,
								$passw,
								$sexo,
								$est,
								$rol
								)
						);
			} catch (Exception $e){}
            if ($res>0) {
                $c=base64_encode($_REQUEST['correo']);
                $mail = "Para confirmar tu cuenta has click en el siguiente enlace: <a href='http://localhost/login/?c=Usuario&a=Confirmacion&cor='$c>Confirma aquí</a>";
                //Titulo
                $titulo = "CONFIRMACION DE CORREO";
                //cabecera
                $headers = "MIME-Version: 1.0\r\n"; 
                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
                //dirección del remitente 
                $headers .= "From: darkperez15@gmail.com >\r\n";
                //Enviamos el mensaje a tu_dirección_email 
                $bool = mail($_REQUEST['correo'],$titulo,$mail,$headers);
                if($bool){
                    echo "Mensaje enviado";
                }else{
                    echo "Mensaje no enviado";
                }

               header('Location:  ../../?c=Login&a=Index&msj=3'); 
            }else{
               header('Location:  ../../?c=Login&a=Index&msj=5');
            }
		}

	} catch (Exception $e) 
	{
		die($e->getMessage());
	}
?>
