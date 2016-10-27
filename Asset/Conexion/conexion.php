<?php
require('Asset/Conexion/conf.php');
header("Content-Type: text/html;charset=utf-8");
        try{
			$this->pdo = new PDO('pgsql:host='.$host.';port='.$puerto.';dbname='.$db.';user='.$usu.';password='.$pass);
			$this->pdo->exec("set names utf8");
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	        
		}
		catch(Exception $e){
			die($e->getMessage());
		}
?>
