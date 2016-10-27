<?php
class musico
{
	private $Id;	
	private $Instrumento;
	private $Aptitudes;
	private $Id_usu;
	private $Correo_usu;
	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
?>