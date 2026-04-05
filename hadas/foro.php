
<?php
	include("funciones.php"); 
	include_once("./env.php");
	$tipoweb=leerTipo(); 
	dibujar_arriba($tipoweb);
				echo "<hr />";
				$id=$_POST["id"];
				$accion=$_POST["accion"];
				$nombre=$_POST["nombre"];
				$comentario=$_POST["comentario"];
				$fecha=date('l jS \of F Y h:i:s A');
				$pagina='foro.php';
				if($accion == 12)
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
				$consulta  = "SELECT * FROM mensajes ORDER BY fecha";
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
					echo $linea['fecha']."<font color=red>     ".$linea['nombre']."</font>:&nbsp;&nbsp;".$linea['comentario'].", <font color=green>pagina: ".$linea['pagina']."</font>";
   					$nombrecomparar=$linea['nombre'];
					echo "<br>";
				}
				
				mysqli_free_result($resultado);

				mysqli_close($enlace);
				}

	dibujar_abajo($tipoweb);
?>
