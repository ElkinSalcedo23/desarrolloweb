<?php
class agrupacion
{
	private $Id;	
	private $Genero;
	private $Nintegrantes;
	private $Tiempo;
	private $Id_usuario;
	private $Nombre;
	private $Apellido;
	private $Email;
	private $Sexo;
	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
?>