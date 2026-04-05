<?php

Class Trabajo {
	private $idTrabajo;
	private $nombreTrabajo;
	private $experiencia;
	private $descripcion;
	private $fecha;
	private $comentario;
	private $idEmpresa;
	function __construct($idTrabajo){
		$this->idTrabajo=$idTrabajo;
	}
	
	function setNombreTrabajo($nombreTrabajo){
		$this->nombreTrabajo=$nombreTrabajo;
	}
	function setExperiencia($experiencia){
		$this->experiencia=$experiencia;
	}
	
	function setDescripcion($descripcion){
		$this->descripcion=$descripcion;	
	}
	function setFecha($fecha){
		$this->fecha=$fecha;	
	}
	function setComentario($comentario){
		$this->comentario=$comentario;
	}
	function setIdEmpresa($idEmpresa){
		$this->idEmpresa=$idEmpresa;
	}
	function getIdTrabajo(){
		return $this->idTrabajo;	
	}
	function getNombreTrabajo(){
		return $this->nombreTrabajo;
	}
	function getExperiencia(){
		return $this->experiencia;
	}
	function getDescripcion(){
		return $this->descripcion;
	}
	function getFecha(){
		return $this->fecha;	
	}
	function getComentario(){
		return $this->comentario;	
	}
	function getIdEmpresa(){
		return $this->idEmpresa;	
	}
	
	function toString(){
		return "Trabajo: ".$this->nombreTrabajo.", id: ".$this->idTrabajo;	
	}
	
	
}

?>