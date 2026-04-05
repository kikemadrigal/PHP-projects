<?php
	require('mysql.php');
	$bd= new Mysql();
	$bd->conectar_mysql();
	$consultaSelect  = 'SELECT personajeip FROM personaje ';
	$resultadoSelect=$bd->ejecutar_sql($consultaSelect);
	$total_registros=mysql_num_rows($resultadoSelect);
	$contador=0;
	while ($linea = mysql_fetch_array($resultadoSelect, MYSQL_ASSOC)) 
	{
		$contador++;
		if($contador==1){
			$sql="update personaje set personajex='$_POST[personajex]', personajey='$_POST[personajey]' where personajeip='$_POST[personajeip]' LIMIT 1";
			$result=$bd->ejecutar_sql($sql);
			$bd->desconectar();
			echo "Personaje actaulizado: ".$_POST['personajex'].', '.$_POST['personajey'].', '.$_POST['personajeip'].", total: ".$total_registros ;
		}
	}
?>