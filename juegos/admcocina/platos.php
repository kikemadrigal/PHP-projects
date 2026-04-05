
<?php
//session_start();
	/*if(!isset($_SESSION['idusuario'])){
		$mensaje="No puedes acceder a esta web sin registrarte.";
		echo "<script type='text/javascript'>location.href='http://www.a.tipolisto.es/gestionarusuarios.php?mensaje=$mensaje&accion=20'</script>";
		exit();
	}*/
	include ("mysql.php");	
	include ("Plato.php");	
	include("dibujarhtml.php");
	
	
	


	function obtenerFecha(){
		return date("j/n/Y");
	}
	function cerrarSesion(){
		session_destroy();
		$mensaje="Sesion de administrador cerrada.";
		echo "<script type='text/javascript'>location.href='http://www.juegos.tipolisto.es/admcocina/platos.php?mensaje=".$mensaje."';</script>";
		
	}
	function convertirObjetoParaPasarPorURL(Trabajo $objeto){
		//$argumento = urlencode(serialize($objeto));
		$argumento = serialize($objeto);
		return $argumento;	
	}
	function recuperarObjetoPasadoPorURL(Trabajo $objeto){
		//$argumento = unserialize(urldecode($objeto));
		$argumento = unserialize($objeto);
		return $argumento;
	}
	
	function cortarCadenaNombreTrabajo($cadena){
		//Strip_tags: retira las etiquetas HTML y PHP de un String
		//substr($cadena, corta inicio, corta final)
		//strlen: devuelve la longitud de la cadena
		$longitud = 100;
		$stringDisplay = substr(strip_tags($cadena), 0, $longitud);
		if (strlen(strip_tags($cadena)) > $longitud)
        	$stringDisplay .= ' ...';
		return $stringDisplay;
	}
	function cortarCadena($cadena){
		//Strip_tags: retira las etiquetas HTML y PHP de un String
		//substr($cadena, corta inicio, corta final)
		//strlen: devuelve la longitud de la cadena
		$longitud = 20;
		$stringDisplay = substr(strip_tags($cadena), 0, $longitud);
		if (strlen(strip_tags($cadena)) > $longitud)
        	$stringDisplay .= ' ...';
		return $stringDisplay;
	}
	function formatearCadena($cadena){
		//$arrayDeAsABuscar=array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä');
        //$arrayDeAsSustituidas('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A');
		$cadena=html_entity_decode($cadena);
		$cadena= str_replace(" ", "&nbsp;", $cadena);
		return $cadena;
	}









/*************************************SELECT**********************************************/
	function mostrarUno($id){
		$basededatos= new Mysql();
		$basededatos->conectar_mysql();
		$consulta  = 'SELECT * FROM platos WHERE id='.$id.' ';
		$resultado=$basededatos->ejecutar_sql($consulta);
		while ($linea = mysqli_fetch_array($resultado)) 
		{
			echo"<table class='estiloformulario' border=0 width= 500px >";
				echo"  <tr> ";
				echo"              <th valign='top'>Nombre</th>";
				echo"              <td><h3>".$linea['nombre']."</h3><hr /></td>";
				echo"   </tr>";
				echo"  <tr> ";
				echo"  				<td><a href=platos.php?accion=3&id=".$linea['id']." title='Borrar'><img src='imagenes/borrar.png'></img>Borrar</a></td>";
				echo"              <td><a href=platos.php?accion=2&id=".$linea['id']." title='Actualizar'><img src='imagenes/actualizar.png'></img>Actualizar</a></td>";
				echo"   </tr>";
			echo"</table>";
		}
		$basededatos->desconectar();
	}

	function obtenerNombre($id){
		$basededatos= new Mysql();
		$basededatos->conectar_mysql();
		$consulta  = 'SELECT * FROM platos WHERE id='.$id.' ';
		$resultado=$basededatos->ejecutar_sql($consulta);
		while ($linea = mysqli_fetch_array($resultado)) 
		{
			return $linea['nombre'];
		}
		$basededatos->desconectar();
	}


	function obtenerTodos(){
		$platos=array();
		$basededatos= new mysql();
		$basededatos->conectar_mysql();
		$consulta  = "SELECT * FROM platos";
		if($consulta==null) echo "La consulta es null";
		$resultado=$basededatos->ejecutar_sql($consulta);
		while ($linea = mysqli_fetch_array($resultado)) 
		{
			$plato=new Plato($linea['id']);
			$plato->setNombre($linea['nombre']);
			$platos[]=$plato;
		}
		$basededatos->desconectar();
		return $platos;
	}


	function dibujarLayout($platos){
		$contador=0;
		echo "<div id='divlayout'>";
		echo "<h3>Mostrar todos.<br /></h3>";
		echo "<table class='ventana' width=100% border=0>";
				echo "<tr bgcolor='#FCD9FF'><th>Nombre</th><th>Borrar</th><th>Actualizar</th></tr>";
				foreach ($platos as $posicion=>$plato){
					$bgcolor='#B3FFF3';
					$contador++;
					if (($contador%2)==0)
					{
						$bgcolor='#FAFEB1';
					}
					echo "<tr bgcolor=".$bgcolor." >";
						echo "<td width='80%'><a href=platos.php?accion=4&id=".$plato->getId()." >".$plato->getNombre()."</a></td>";
						echo"<td width='20%'><a href=platos.php?accion=3&id=".$plato->getId()." title='Borrar'><img src='imagenes/borrar.png'></img></a></td>";
						echo"<td width='20%'><a href=platos.php?accion=2&id=".$plato->getId()." title='Actualizar'><img src='imagenes/actualizar.png'></img></a></td>";
					echo "</tr>";
		
				}
		echo "</table>";
		echo "</div>";
	}
	function mostrarCodigoJavaplatos(){
		$platos = array();
		$platos=obtenerTodos();
		$contador=0;
		echo "<br /><b>Mostrar todos con código Java</b><br />";
		echo "<table class='ventana' width=100% border=0>";
				foreach ($platos as $posicion=>$plato){
					$bgcolor='#B3FFF3';
					$contador++;
					if (($contador%2)==0)
					{
						$bgcolor='#FAFEB1';
					}
					echo "<tr bgcolor=".$bgcolor." >";
						echo "<td width='80%'>this.add(new Plato(".$plato->getId().", \"".$plato->getNombre()."\"));</td>";
					echo "</tr>";
		
				}
		echo "</table>";
	}
/*********************************************fIN DE SELECT***************************************/
	










	
/*****************************INSERT***************************************************************/
	function crearNuevo(){
		echo"<h3>Menu insertar nuevo.</h3>";
		echo"<form method=post action='platos.php'>";
		echo"<table border= 0 bordercolor=black width= 40% >";
		echo"  <tr> ";
		echo"              <th>Nombre</th>";
		echo"              <td><input type= text  name=nombre size=80 title='Se necesita un nombre' required ></td>";
		echo"   </tr>";
		echo "<input type=hidden name=accion value=12></input> ";
		echo"    <tr>"; 
		echo"              <td colspan=2  align=center><input type=submit value=Insertar class='boton' ></input></td>";
		echo"    </tr>";
		echo"</table>";
		echo" </form>";
	}
	
	function aplicarInsercion(){
		$bd= new Mysql();
		$bd->conectar_mysql();
		$sql="INSERT INTO platos VALUES ( '', '$_POST[nombre]' )";
		$bd->ejecutar_sql($sql);
		$bd->desconectar();
		$mensaje=$_POST[nombre]." cread@.";
		echo "<script type='text/javascript'>location.href='http://www.juegos.tipolisto.es/admcocina/platos.php?mensaje=".$mensaje."';</script>";
	}

/**************************************FIN DE INSERT************************************************/











/*********************************UPDATE************************************************************/
	//21
 	function actualizar($id){
		$basededatos= new Mysql();
		$basededatos->conectar_mysql();
		$consulta  = 'SELECT * FROM platos WHERE id='.$id.' ';
		$resultado=$basededatos->ejecutar_sql($consulta);
		while ($linea = mysqli_fetch_array($resultado)) 
		{
				$plato=new Plato($linea['id']);
				$plato->setNombre($linea['nombre']);
				
		}
		$basededatos->desconectar();
		echo"<h3>Menu actualizar.</h3>";
		echo"<form method=post action='platos.php' >";
		echo"<table border= 0 bordercolor=black width=500px >";
		echo"  <tr> ";
		echo"              <th>Nombre</th>";
		echo"              <td><input type= text  name='nombre' value='".$plato->getNombre()."' size=100 title='Se necesita un nombre' required ></input></td>";
		echo"   </tr>";		
		echo "</td>";
		echo"    <tr>"; 	
		echo" 		   <input type='hidden' name='accion' value=22></input>";	
		echo" 		   <input type='hidden' name='id' value=".$plato->getId()."></input>";
		echo"          <td colspan=2  align=center><input type=submit value=Actualizar class='boton' ></td>";
		echo"    </tr>";
		echo"</table>";
		echo" </form>";
		
		
	}
	//22
	function aplicarActualizacion($id){
		$bd= new Mysql();
		$bd->conectar_mysql();
		$sql="update platos set nombre='$_POST[nombre]' where id='$id'";
		$bd->ejecutar_sql($sql);
		$bd->desconectar();
		$mensaje=obtenerNombre($id)." actualizado.";
		echo "<script type='text/javascript'>location.href='http://www.juegos.tipolisto.es/admcocina/platos.php?mensaje=".$mensaje."';</script>";
	}
/*******************************************FIN DE UPDATE*************************************/




/*************************************DELETE*************************************************/
	function confirmarBorrar($id){
		$foto=rand(1, 7);
		echo "<br /><h3>¿Estas seguro que quieres borrar ".obtenerNombre($id)."?</h3><br /><img src=imagenes/bonito".$foto.".jpg></img><br />";
		echo "<h1><a href='platos.php?accion=5&id=$id'>SI</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "<a href='platos.php?accion=6&id=$id'>NO</a></h1>";	
	}
	function borrar($id){
			$mensaje=obtenerNombre($id)." borrado. ";
			$bd= new Mysql();
			$bd->conectar_mysql();
			$sql="DELETE FROM platos WHERE id='$id' LIMIT 1";
			$bd->ejecutar_sql($sql);
			$bd->desconectar();
			echo "<script type='text/javascript'>location.href='http://www.juegos.tipolisto.es/admcocina/platos.php?mensaje=$mensaje'</script>";
	}
	function redirigirPorNoBorrar($id){
		$mensaje=obtenerNombre($id).", no borrado";
		echo "<script type='text/javascript'>location.href='http://www.juegos.tipolisto.es/admcocina/platos.php?mensaje=$mensaje'</script>";
	}
	
/**************************************FIN DE DELETE******************************************************/
	
	
	
	
	
/***************************Main*********************************************/
	dibujar_arriba();
	echo "<div id='menuadministrador'>";
		echo "<table width=100% border=0>";
			echo "<tr><td>";
				echo "<a href='platos.php' id='aparecerplatos'>Ver todos los platos</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "<a href='platos.php?accion=1' >Añadir nuevo plato</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "<a href='platos.php?accion=4' >Ver código Java</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "</td></tr>";
		echo "</table>";
	echo "</div>";
	echo "<A HREF='alimentos.php' >Alimentos</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='platos.php' style='background-color:yellow;' >Platos</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <A HREF='ingredientes.php'>Ingredientes</a>";
	if (!isset($_GET['accion'])){
		$platos=array();
		$platos=obtenerTodos();
		dibujarLayout($platos);
	}else{
		if ($_GET['accion']==1){
			crearNuevo();
		}else if($_GET['accion']==2){
			actualizar($_GET['id']);
		}else if($_GET['accion']==3){
			confirmarBorrar($_GET['id']);
		}else if($_GET['accion']==4){
			mostrarCodigoJavaplatos();
		}else if($_GET['accion']==5){
			borrar($_GET['id']);
		}else if($_GET['accion']==6){
			redirigirPorNoBorrar($_GET['id']);
		}else if($_GET['accion']==4){
			//$objeto=urldecode(unserialize($_GET['trabajo']));
			mostrarUno($_GET['id']);
		}else if($_GET['accion']==7){
			//$objeto=urldecode(unserialize($_GET['trabajo']));
			cerrarSesion();
		}
		
	}
	if($_POST['accion'] == 12){
			aplicarInsercion();
	}
	if($_POST['accion'] == 22){
			aplicarActualizacion($_POST['id']);
	}
	dibujar_abajo();
/****************************************************************************/


?>

