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
		$this->nombreTrabajo=$nombreTrabajo;
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
	
	function getIdTrabajo(){
		return $this->idTrabajo;	
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
		return "Ingrediente: ".$this->nombre.", id: ".$this->id;	
	}
	
	
}

?>