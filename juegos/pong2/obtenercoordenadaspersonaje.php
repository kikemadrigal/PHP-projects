<?php
	require('mysql.php');
	$bd= new Mysql();
	$bd->conectar_mysql();
	$consulta  = "SELECT personajex, personajey FROM personaje WHERE personajeip='".$_POST[personajeip]."' ";
	$resultado=$bd->ejecutar_sql($consulta);
	while ($linea = mysql_fetch_array($resultado, MYSQL_ASSOC)) 
	{
		echo $linea['personajex'].",".$linea['personajey'];	
	}
	$bd->desconectar();
?>