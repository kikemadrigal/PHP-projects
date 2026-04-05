<?php
require('../mysql.php');							
	$basededatos= new Mysql();
	$basededatos->conectar_mysql();
	$consulta  = "SELECT * FROM servidores ORDER BY fechaservidor";
	$resultado=$basededatos->ejecutar_sql($consulta);
	$usuario="";
	while ($linea = mysql_fetch_array($resultado, MYSQL_ASSOC)) 
	{
		echo $linea['ipservidor']."-";
		//echo $linea['fechaservidor']."\n";
	}
	$basededatos->desconectar();							
?>