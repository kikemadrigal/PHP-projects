
<?php
include_once("./env.php");

echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>";
echo "<html xmlns='http://www.w3.org/1999/xhtml'>";
	echo "<head>";
		echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
		echo "<title>www.pepi.tipolisto.es</title>";
			echo "<link href='css/principal2.css' rel='stylesheet' type='text/css' />";
			echo "<script type='text/javascript' src='javascript/codigo.js'></script>";
			$numeroaleatorioyarriba= rand(100, 999);
			$numeroaleatorioyabajo= rand(100, 999);
			echo"<style type='text/css'>";
			echo "#animarhada1{
				width: 200px;
				height: 200px;
				position: absolute;
				top:200px;
				left:200px;
				background-color:transparent;
				animation:animacion 30s infinite;
				-moz-animation:animacion 30s infinite;
				-o-animation:animacion 30s infinite;
				-webkit-animation:animacion 30s infinite;
			}
			
			@keyframes animacion {
				from{left:".$numeroaleatorioyarriba."px ; top:-50px;}
				to{left:500px; top:1200px;}
			}
			@-webkit-keyframes animacion {
				from{left:".$numeroaleatorioyarriba."px ; top:-50px;}
				to{left:500px; top:1200px;}
			}
			@-moz-keyframes animacion {
				from{left:".$numeroaleatorioyarriba."px ; top:-50px;}
				to{left:500px; top:1200px;}
			}
			@-o-keyframes animacion {
				from{left:".$numeroaleatorioyarriba."px ; top:-50px;}
				to{left:500px; top:1200px;}
							
		

	}";

			echo "</style>";
	echo "</head>";
	echo "<body>";
		echo "<div class='container'>";
			echo "<div class='header'>";
				include("includes/cabecera.php"); 
			echo "</div>";
			echo "<div class='sidebar1'>";
				include("includes/sidebar1.php"); 
			echo "</div>";
			echo "<div class='content'>";
			echo "<div class='capasobrecontent'>";
			//echo "<audio src=http://hadas.tipolisto.es/cancion.mp3 controls loop='loop' autoplay='true'></audio>";
			echo "<audio id='audio' controls loop autoplay><source src='http://hadas.tipolisto.es/cancion.mp3' type='audio/mp3'></audio>";
			//echo "<iframe src='http://hadas.tipolisto.es/cancion.mp3' allow='autoplay' id='iframeAudio'></iframe>"; 
			echo "<br />Posicion animacion1 de arriba a abajo cambiando de la Y: ".$numeroaleatorioyarriba." , ".$numeroaleatorioyabajo."<br />";
		/****************************Insertar hada si la manda anadirhada.php**********************************************/
		if(!(empty($_POST['insertar']))){
				echo "<table border='0' bgcolor='#FFFF66'>";
				echo "<tr><td>";
	
				$nombre=$_POST['nombre'];
				$descripcion=$_POST['descripcion'];
				$foto=$_POST['familia'];
				$animacion=$_POST['animacion'];
				$familia=$_POST['familia'];
				//hostname, user, password, database
				$msqli = new mysqli(SERVER, USER, PASSWORD, DATABASE);
				$query="INSERT INTO hadaseleccionada VALUES ( '', '$nombre','$descripcion', '$familia', '$animacion')";
				$msqli->query($query);
			
				mysqli_close($msqli);
				echo "Se ha a&ntilde;adido:".$nombre.". de la familia ".$familia."<br>";
				echo "<td></tr></table>";
			}
		/*********************************************fin isertar hada******************************************************/
		/**********************************************Borrar hadas***********************************************************/	
			if(isset($_POST['borrar'])){
				$msqli = new mysqli(SERVER, USER, PASSWORD, DATABASE);

				echo "<table border='0' bgcolor='#FFFF66'>";
			echo "<tr><td>";
			
			
			$id=$_POST['borrar'];
			$query="DELETE FROM hadaseleccionada WHERE id='$id'";
			$resultado = $msqli->query($query);
			if($resultado==FALSE){
			echo "ha habido un error";
			}
			$msqli->close();
			echo "<br />Hada: Borrada!!!<br /><br /><br />";
			echo "<td></tr></table>";
		}
		/*********************************************Fin de borrrar hadas*****************************************************/
			
			
			
		/*****************************************Visualizar hadas del tablero (tabla hadaseleccionada)**********************/	
		$msqli = new mysqli(SERVER, USER, PASSWORD, DATABASE);
		if($msqli->connect_errno){
			echo "<p>Error al conectar con el servidor.</p>";
			die();
		}
		$query  = "SELECT * FROM hadaseleccionada";
		$resultado = $msqli->query($query);
		if($resultado==FALSE){
			echo "No hay hadas en el tablero";
		}else{
		while ($linea = mysqli_fetch_array($resultado)) 
		{
			//$animacion=$animacion+1;
			echo " <div id='animarhada".$linea['animacion']."'><img src=imagenes/".$linea['foto'].".png width='50px' height='50px'></img></div>";
			//echo "<br>";
		}
		mysqli_free_result($resultado);
		$msqli->close();
		}
		/*************************************************fin de visualizar has del tablero*********************************/
		

				
				
			
			
			echo "</div>";
			echo "</div>";
			echo "<div class='footer'>";
					include("includes/pie.php"); 
			echo "<!-- end .footer --></div>";
		echo "<!-- end .container --></div>";
	echo "</body>";
echo "<!-- InstanceEnd --></html>";
?>