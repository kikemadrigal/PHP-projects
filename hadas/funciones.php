<?php
function escribirTipo($tipo){
	$file=fopen("tipodeweb.txt", "w") or die ("Ha habido un problema al crearlo");
	fwrite($file, $tipo);
	fclose($file);
	echo "El estilo ha sido modificado a: estilo <b>".$_GET['estilo']."</b>";


}
function leerTipo(){
	$archivo=fopen("tipodeweb.txt", "r") or die ("problemas al abrir el archivo estilos");
	$traer;
	while(!feof($archivo)){
			$traer=fgets($archivo);
	}
	return $traer;
}
function dibujar_arriba($tipo){
	if($tipo==1){
		echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>";
		echo "<html xmlns='http://www.w3.org/1999/xhtml'>";
			echo "<head>";
				echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
				echo "<title>Pagina de Pepi</title>";
					echo "<link href='css/principal".leerTipo().".css' rel='stylesheet' type='text/css' />";
					echo "<script type='text/javascript' src='javascript/codigo.js'></script>";
					
					//include("mysql.php");
			echo "</head>";
			echo "<body'>";
				include("includes/afterbody.php"); 
				echo "<div class='container'>";
   	  				echo "<div class='header'>";
						include("includes/cabecera.php"); 
   	  				echo "<!-- end .header --></div>";
	 				echo "<div class='sidebar1'>";
						include("includes/sidebar1.php"); 
	  				echo "<!-- end .sidebar1 --></div>";
  	 				echo "<div class='content'>";
	}else if($tipo==2){
		echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>";
		echo "<html xmlns='http://www.w3.org/1999/xhtml'>";
			echo "<head>";
				echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
				echo "<title>pepi.esy.es</title>";
					echo "<link href='css/principal".leerTipo().".css' rel='stylesheet' type='text/css' />";
					echo "<script type='text/javascript' src='javascript/codigo.js'></script>";
					
					//include("mysql.php");
			echo "</head>";
			echo "<body onLoad='autoImgFlip();'>";
				echo "<div class='container'>";
   	  				echo "<div class='header'>";
						include("includes/cabecera.php"); 
   	  				echo "</div>";
	 				echo "<div class='sidebar1'>";
						include("includes/sidebar1.php"); 
	  				echo "</div>";
  	 				echo "<div class='content'>";
		
		
	}else{
		exit;
	}
}
function dibujar_abajo($tipo){
	if($tipo==1){
					echo "<!-- end .content --></div>";
  					echo "<div class='footer'>";
    						include("includes/pie.php"); 
	  				echo "<!-- end .footer --></div>";
  				echo "<!-- end .container --></div>";
			echo "</body>";
		echo "<!-- InstanceEnd --></html>";
	}else if($tipo==2){
		echo "</div>";
  					echo "<div class='footer'>";
    						include("includes/pie.php"); 
	  				echo "<!-- end .footer --></div>";
  				echo "<!-- end .container --></div>";
			echo "</body>";
		echo "<!-- InstanceEnd --></html>";
		
	}else{
		exit;
	}
}













function foropagina($pagina){
				echo "<hr />";
				//echo "<h1>La pagina es: ".$pagina."</h1><br />";
				$id=$_POST["id"];
				//$accion=$_POST["accion"];
				$nombre=$_POST["nombre"];
				$comentario=$_POST["comentario"];
				$fecha=date('l jS \of F Y h:i:s A');
			
				if($_POST["accion"] == 12)
				{
					$enlace = new mysqli(SERVER, USER, PASSWORD, DATABASE);
				
					$enlace->query("INSERT INTO mensajes VALUES ( '', '$nombre','$comentario', '$fecha', '$pagina') ") or die($enlace->error);
					echo"<h1>Insertado.</h1>";
					$enlace->close();

				}
				/******************************Menu mensajes**************************************/
				echo"<form method=post action=".$pagina.">";
				echo"<table><tr>";
	
				echo"          <td> Nombre:</td> <td> <input type= text  name=nombre></td></tr>";

				echo"            <tr><td> Comentario: </td><td><textarea name=comentario rows=10 cols=40></textarea></td></tr>";
				echo"  		   <input type=hidden name=accion value=12>";
				echo"		    <input type=hidden name=otros value=12>";	
				echo"              <tr><td colspan=2 align=center><input type=submit value=Enviar ></td></tr></table>";
				echo" </form>";
				/*******************fisualizar comentarios********************************************/
				$enlace = new mysqli(SERVER, USER, PASSWORD, DATABASE);
				$consulta  = "SELECT * FROM mensajes WHERE pagina='$pagina'";
				$resultado = $enlace->query($consulta);
				if($resultado==FALSE){
					echo "ha habido un error";
				}else{
				
				while ($linea = mysqli_fetch_array($resultado)) 
				{
					if ($nombrecomparar==$linea['nombre'])
					{
						$linea['nombre']='&nbsp;&nbsp;';
					}
					echo $linea['fecha']."<font color=red>     ".$linea['nombre']."</font>:&nbsp;&nbsp;".$linea['comentario'];
   					$nombrecomparar=$linea['nombre'];
					echo "<br>";
				}
				
				mysqli_free_result($resultado);

				$enlace->close();
				}
				


}

?>