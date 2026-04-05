<?php
function obtenerNumeroDePersonajes(){
	require('mysql.php');
	$bd= new Mysql();
	$bd->conectar_mysql();
	$consultaSelect  = "SELECT personajeip FROM personaje ";
	$resultadoSelect=$bd->ejecutar_sql($consultaSelect);
	$total_registros=mysql_num_rows($resultadoSelect);
	if($total_registros>0){
		echo $total_registros;	
	}else{
		echo "no hay pjuegadores";
	}
	$bd->desconectar();
}
function insertarNuevaIp(){
	require('mysql.php');
	$bd= new Mysql();
	$bd->conectar_mysql();
	$sql="INSERT INTO personaje VALUES ( '', '$_SERVER[REMOTE_ADDR]', '0','0') ";
	$result=$bd->ejecutar_sql($sql);
	
	$bd->desconectar();
	echo "Se ha insertado crrectamente: "+$result;
}
function verSiExisteIP($personajeip){
	$bd= new Mysql();
	$bd->conectar_mysql();
	$consultaSelect  = "SELECT personajeip FROM personaje WHERE personajeip='".$personajeip."' ";
	$resultadoSelect=$bd->ejecutar_sql($consultaSelect);
	$total_registros=mysql_num_rows($resultadoSelect);
	if($total_registros>0){
		return true;//la ip ya existe en la base de datos	
	}else{
		return false;	
	}
	$bd->desconectar();
}

function borrarUsuario(){
	require('mysql.php');
	$bd= new Mysql();
	$bd->conectar_mysql();
	$sql="DELETE FROM personaje WHERE personajeip='".$_POST[ipUsuario]."'";
	if($sql==null){
		echo "Personaje no encontrado";
	}
	$bd->ejecutar_sql($sql);
	$bd->desconectar();
	echo "Personaje, ".$_POST['ipUsuario']." borrado.";
}

function verUsuarios(){
	include('mysql.php');
	$bd= new Mysql();
	$bd->conectar_mysql();
	$consulta  = 'SELECT personajeip FROM personaje ';
	$resultado=$bd->ejecutar_sql($consulta);
	$total_registros=mysql_num_rows($resultado);
	while ($linea = mysql_fetch_array($resultado, MYSQL_ASSOC)) 
	{
		//$personaje=$linea['personajeip'];
		//if($personajeip!=$linea['personajeip']){
			echo $linea['personajeip'].",";	
		//}
	}
		$bd->desconectar();
}


if($_POST['accion']=='verUsuarios'){
	verUsuarios();
}
if($_POST['accion']=='eliminarUsuario'){
	borrarUsuario();
}
if($_POST['accion']=='obtenerNumeroDePersonajes'){
	obtenerNumeroDePersonajes();
}
if($_POST['accion']=='insertarNuevaIp'){
	insertarNuevaIp();
}
?>