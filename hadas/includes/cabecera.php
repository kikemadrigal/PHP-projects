 <?php


	echo "<table>";
		echo "<tr>";
			echo "<td>";
				echo "<img src='imagenes/hada.png' height=50 width=50></img><img src='imagenes/hada.png' height=50 width=50></img><img src='imagenes/hada.png' height=50 width=50></img></a> ";
			echo "</td>	";
			echo "<td>";
			
				echo "<font size='-2'>";
				echo "http://".$_SERVER['HTTP_HOST'];
				echo "&nbsp;&nbsp;||&nbsp;&nbsp;Esta es tu IP: ";
				echo $_SERVER['REMOTE_ADDR'];
				echo "&nbsp;&nbsp;||&nbsp;&nbsp;"; 
				$hora= date ("h:i:s");
				$fecha= date ("j/n/Y");
				echo $hora;
				echo "&nbsp;&nbsp;||&nbsp;&nbsp;";
				echo $fecha;
				echo "&nbsp;&nbsp;||&nbsp;&nbsp;Tipo de web: ";
				echo "&nbsp;&nbsp;||&nbsp;&nbsp;<a href=elegirtipoweb.php>Cambiar</a>";
				echo "</font>";
		
			echo "</td>";
  			echo "<td>";
				echo "&nbsp;";
			echo "</td><td>";
				echo "&nbsp;";
 			echo "</td>";
	echo "</tr>";
	echo "</table>";



?>