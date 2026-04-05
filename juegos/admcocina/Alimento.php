<?php
Class Alimento {
	private $id;
	private $nombre;
	private $nombreTrabajo;
	
	function __construct($id){
		$this->id=$id;
	}
	function getId(){
		return $this->id;
	}
	function setNombre($nombre){
		$this->nombre=$nombre;
	}
	
	function getNombre(){
		return $this->nombre;
	}
	
	function toString(){
		return "Alimento: ".$this->nombre.", id: ".$this->id;	
	}
}

?>