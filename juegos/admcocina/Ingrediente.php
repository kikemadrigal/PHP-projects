<?php

Class Ingrediente {
	private $id;
	private $nombre;
	private $idAlimento;
	private $cantidad;
	private $idPlato;
	
	function __construct($id){
		$this->id=$id;
	}
	function getId(){
		return $this->id;
	}
	function setNombre($nombre){
		$this->nombre=$nombre;
	}
	function setIdAlimento($idAlimento){
		$this->idAlimento=$idAlimento;
	}
	
	function setCantidad($cantidad){
		$this->cantidad=$cantidad;	
	}
	function setIdPlato($idPlato){
		$this->idPlato=$idPlato;	
	}
	
	
	function getNombre(){
		return $this->nombre;
	}
	function getIdAlimento(){
		return $this->idAlimento;
	}
	function getCantidad(){
		return $this->cantidad;
	}
	function getIdPlato(){
		return $this->idPlato;	
	}
	
	function toString(){
		return "Ingrediente: ".$this->nombre.", cantidad: ".$this->cantidad.", idAlimento: ".$this->idAlimento.", idplato: ".$this->idPlato ;	
	}
	
	
}

?>