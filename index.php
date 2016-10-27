<?php
require_once 'Controlador/Login.Controlador.php';
require_once 'Controlador/Usuario.Controlador.php';
require_once 'Controlador/Musico.Controlador.php';
require_once 'Controlador/Agrupacion.Controlador.php';
session_start();
if (!isset($_SESSION['Correo'])){

    if (!isset($_POST['NombreUsuario'])&& !isset($_POST['ClaveUsuario'])) {        
        require_once 'Vista/login.php';
    }else{
        $Controlador = new LoginControlador();
        call_user_func( array( $Controlador, 'validar' ) );        
    }
}
else{

	if(!isset($_REQUEST['c']))
	{
       
    	$Controlador = new LoginControlador();
    	$Controlador->Index();    
    } 
    else 
    {
    $Controlador = $_REQUEST['c'] . 'Controlador';
    $Accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

    $Controlador = new $Controlador();
    call_user_func( array( $Controlador, $Accion ) );
  }
}
