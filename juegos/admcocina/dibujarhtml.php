<?php
	/*session_start();
	include('mysql.php');
	if(!isset($_SESSION['idusuario'])){
         	//$usuario=null;
	}else{
		function obtenerNombreUsuarioInicioSesion($idusuario){
				$basededatos= new Mysql();
				$basededatos->conectar_mysql();
				$consulta  = "SELECT nombreusuario FROM usuarios WHERE idusuario='".$idusuario."' LIMIT 1";
				$resultado=$basededatos->ejecutar_sql($consulta);
				$nombreusuario="";
				while ($linea = mysql_fetch_array($resultado, MYSQL_ASSOC)) 
				{
						$nombreusuario=$linea['nombreusuario'];
				}
				$basededatos->desconectar();
				return $nombreusuario;
		}
	}*/
	
	function dibujar_arriba(){
		?>
		<!DOCTYPE html>
		<html lang='es'>
			<head>
				<meta charset='utf-8'>
				<title>Cocina con Javi</title>
					<link href='css/principal.css' rel='stylesheet' type='text/css' />
                    <!-- CDN con el CSS de Bootstrap -->
					<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
				    <!-- CDN con el javascript de Bootstrap -->
				    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
                    <script type='text/javascript' src='js/js.js'></script>
             </head>
             <body>
  	 				<div class='container'>
						<div class='contenido'>
						<a href="http://www.juegos.tipolisto.es/admcocina"><img src='imagenes/casa.png' height=50 width=50></img></a>
						<p><font color="#FF0000" size="+1"><strong>Bases de datos</strong></font><font color="#FF0055" size="-1"></font></p>
					    <!--<A HREF="alimentos.php" onclick='agregarOQuitarFondoAmarillo(this)'>Alimentos</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="comidas.php" onclick='agregarOQuitarFondoAmarillo(this)' >Platos</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <A HREF="ingredientes.php" onclick='agregarOQuitarFondoAmarillo(this)'>Ingredientes</a>-->
                            <?php
                            /*if(isset($_SESSION['idusuario']))
                                echo "<p>Usuario: ".obtenerNombreUsuarioInicioSesion($_SESSION['idusuario'])."&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.a.tipolisto.es/gestionarusuarios.php?accion=7'><img src='imagenes/cerrarsesion.png' width='20px' height='20px'></img>Cerrar sesion<a></p>";
                            else{
                                echo"<p style='text-align:center'><a href='http://www.a.tipolisto.es/gestionarusuarios.php?accion=10'>Registrate</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.a.tipolisto.es/gestionarusuarios.php?accion=20&pagina=diccionario'>Acceder</a></p>";
                            }*/
	}
	
	function dibujar_abajo(){
                            if(isset($_GET['mensaje'])) echo "<p style='color:green;'>".$_GET['mensaje']."</p>";
                            ?>
					<!-- end .contenido --></div>
  					<div class='footer'>
    						<?php include("pie.php"); ?>
	  				<!-- end .footer --></div>
  				<!-- end .general --></div>
  				 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
			</body>
		<!-- InstanceEnd --></html>
		<?php
	}



?>
