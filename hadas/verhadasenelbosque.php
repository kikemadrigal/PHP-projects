
<?php
include_once("./env.php");
		echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>";
		echo "<html xmlns='http://www.w3.org/1999/xhtml'>";
			echo "<head>";
				echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
				echo "<title>pepi.esy.es</title>";
					echo "<link href='css/principal2.css' rel='stylesheet' type='text/css' />";
					echo "<script type='text/javascript' src='javascript/codigo.js'></script>";
			echo "</head>";
			echo "<body>";
				echo "<div class='container'>";
   	  				echo "<div class='header'>";
						include("includes/cabecera.php"); 
   	  				echo "</div>";
	 				echo "<div class='sidebar1'>";
						include("includes/sidebar1.php"); 
	  				echo "</div>";
  	 				
					echo "<table border='0' bgcolor='#FFFF66'>";
						echo "<tr><td>";
				
					
					
					
					
				/**************************Visualizar hadas de tablero***************************/
				
				$enlace = new mysqli(SERVER, USER, PASSWORD, DATABASE);
				$consulta  = "SELECT * FROM hadaseleccionada";
				$resultado = $enlace->query($consulta);
				if($resultado==FALSE){
					echo "ha habido un error";
				}else{
				while ($linea = mysqli_fetch_array($resultado)) 
				{
					echo "<img src=imagenes/".$linea['foto'].".png width='50px' height='50px'>"; 
					if($linea['descripcion']==null){
						$linea['descripcion']="No hay comentarios";	
					}
					echo $linea['nombre'].", ".$linea['descripcion'].", animaci&oacute;n: ".$linea['animacion'];
					echo "<br />";
				}
				mysqli_free_result($resultado);
				$enlace->close();
				}
				/*************************fin visualizar hadas del tablero***********************/

				

		

























					echo "<td></tr></table>";

					
  					echo "<div class='footer'>";
    						include("includes/pie.php"); 
	  				echo "<!-- end .footer --></div>";
  				echo "<!-- end .container --></div>";
			echo "</body>";
		echo "<!-- InstanceEnd --></html>";
?>