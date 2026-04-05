<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>

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
  	 				
					
				
				$enlace = new mysqli(SERVER, USER, PASSWORD, DATABASE);
				$consulta  = "SELECT * FROM hadaseleccionada";
				$resultado = $enlace->query($consulta);
				if($resultado==FALSE){
					echo "ha habido un error"; 
				}else{
				echo "<table border='0' bgcolor='#FFFF66'>";
				echo "<tr><td>";
				echo "<font color=yellow>Elige el hada que quieres borrar del tablero</font>";
				echo "<form  method=post action=index.php>";
				while ($linea = mysqli_fetch_array($resultado)) 
				{
					echo "<font color=red >     ".$linea['nombre']."</font>: <img src=imagenes/".$linea['foto'].".png width='50px' height='50px'><input  type='radio' name='borrar' value='".$linea['id']."'/><input type='hidden' value='".$linea['nombre']."' />";
					echo "<br />";
				}
				echo "<input type='submit' value='Quitar hada del bosque'></form>";
				mysqli_free_result($resultado);
				mysqli_close($enlace);
				}
				echo "<td></tr></table>";
				
				
				
				
				
				
	




					
				

				
  					echo "<div class='footer'>";
    						include("includes/pie.php"); 
	  				echo "<!-- end .footer --></div>";
  				echo "<!-- end .container --></div>";
			echo "</body>";
		echo "<!-- InstanceEnd --></html>";
?>