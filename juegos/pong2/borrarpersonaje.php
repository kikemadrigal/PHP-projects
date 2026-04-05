<?php
	require('mysql.php');
	$bd= new Mysql();
	$bd->conectar_mysql();
	$sql="DELETE FROM personaje WHERE personajeip LIKE '%".$_POST[personajeip]."%'";
	$bd->ejecutar_sql($sql);
	$bd->desconectar();
	echo "Personaje, ".$_POST['personajeip']." borrado.";
?>