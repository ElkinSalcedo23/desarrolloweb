<?php
	if(isset($_GET['msj'])){
		$m=$_GET['msj'];
		if($m==2){
			echo"<p class='bg-danger' style='padding:10px; border-radius:0.5em;color:red;'>Complete los campos</p>";
		}elseif($m==3){
			echo"<p class='bg-success' style='padding:10px; border-radius:0.5em;color:green;'>Datos Registrados con exito</p>";
		}elseif($m==4){
			echo"<p class='bg-danger' style='padding:10px; border-radius:0.5em;color:red;'>Usuario o contraseña incorrectos o no ha activado su cuenta en el correo</p>";
		}elseif($m==5){
			echo"<p class='bg-danger' style='padding:10px; border-radius:0.5em;color:red;'>Error al registrar los Datos</p>";
		}elseif($m==6){
			echo"<p class='bg-success' style='padding:10px; border-radius:0.5em;color:green;'>Datos Actualizados con exito</p>";
		}elseif($m==7){
			echo"<p class='bg-danger' style='padding:10px; border-radius:0.5em;color:red;'>Error al Actualizar los Datos</p>";
		}elseif($m==8){
			echo"<p class='bg-danger' style='padding:10px; border-radius:0.5em;color:red;'>Este correo ya se encuentra registrado</p>";
		}elseif($m==9){
			echo"<p class='bg-danger' style='padding:10px; border-radius:0.5em;color:red;'>Este Musico ya tiene un perfil registrado</p>";
		}elseif($m==10){
			echo"<p class='bg-danger' style='padding:10px; border-radius:0.5em;color:red;'>Esta Agrupación ya tiene un perfil registrado</p>";
		}
	}
?>