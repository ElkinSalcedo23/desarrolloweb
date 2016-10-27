<?php
class usuario
{
	private $Id;	
	private $Nombre;
	private $Apellido;
	private $Email;
	private $ClaveUsuario;
	private $Sexo;
	private $Rol;
	private $Estado;
	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
?>