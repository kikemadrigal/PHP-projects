
<?php
include_once("./env.php");
		echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>";
		echo "<html xmlns='http://www.w3.org/1999/xhtml'>";
			echo "<head>";
				echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
				echo "<title>www.pepi.tipolisto.es</title>";
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
					
					
				if(!(empty($_POST['familia']))){
					echo "<form method=post action=anadirhada.php>";
					echo "has elegido un hada de la familia: ".$_POST['familia']."<br />";
					echo "Ahora tienes que ponerle un nombre: <input type='text' name='nombre' />";
					echo "<input type='hidden' name='familia2' value='".$_POST['familia']."'>";				
					echo "<input type='submit' value='Poner nombre'>";
					echo "</form>";
				}else if(!(empty($_POST['familia2']))){
					echo "<form method=post action=index.php>";
					echo "<br />El hada: ".$_POST['nombre'].", ";
					echo "De la familia: ".$_POST['familia2']."<br />";
					echo "Elige una accion para el hada:";
					echo "<select name='animacion' required>
					  	<option value='1'>Animacion 1</option>
  						<option value='2'>Animacion 2</option>
  						<option value='3'>Animacion 3</option>
  						<option value='4'>Animacion 4</option>
  						<option value='5'>Animacion 5</option>
						<option value='6'>Animacion 6</option>
					</select>";
					echo "<br />Si quieres puedes a&ntilde;adir una caracteristica de esta hada.<br />";
					echo "<textarea name='descripcion3'></textarea>";
					echo "<input type='hidden' name='familia' value='".$_POST['familia2']."'>";
					echo "<input type='hidden' name='nombre' value='".$_POST['nombre']."'>";
					echo "<input type='hidden' name='insertar' value='1'>";
					echo "<input type='submit' value='Poner en el bosque'>";
					echo "</form>";
					echo "</form>";
				}else{
					
					
					
					
					
				/**************************Visualizar hadas de tablero***************************/
				
				$enlace = new mysqli(SERVER, USER, PASSWORD, DATABASE);
				$consulta  = "SELECT * FROM hada";
				$resultado = $enlace->query($consulta);
				if($resultado==FALSE){
					echo "ha habido un error";
				}else{
				echo "<font color=yellow>Elige 1 familia de hadas</font>";
				echo "<form method=post action=anadirhada.php>";
				echo "<table border='0' bgcolor='#FFFF66'>";
				echo "<tr><td>Familia</td><td>Foto</td><td>seleccionar</td></tr>";
				while ($linea = mysqli_fetch_array($resultado)) 
				{
					$familia=$linea['familia'];
					echo"<tr>";	
					echo "<td>".$familia."</td>"; 
					echo "<td><img src=imagenes/".$linea['foto'].".png width='50px' height='50px'></td>"; 
					echo "<td><input  type='radio' name='familia' value='".$familia."'/></td>";
					echo "</tr>";
				}
				echo "</table>";
				echo "<input type='submit' value='Poner hada en el bosque'></form>";
				mysqli_free_result($resultado);
				mysqli_close($enlace);
				}
				/*************************fin visualizar hadas del tablero***********************/

				

				}


























					echo "<td></tr></table>";
					
  					echo "<div class='footer'>";
    						include("includes/pie.php"); 
	  				echo "<!-- end .footer --></div>";
  				echo "<!-- end .container --></div>";
			echo "</body>";
		echo "<!-- InstanceEnd --></html>";
?>