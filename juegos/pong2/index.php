 <?php
 	 require('mysql.php');
	 require('funcionesusuarios.php');
	 
	 
	 /*$personajeip=$_SERVER['REMOTE_ADDR'];
	 if(!verSiExisteIP($personajeip)){
		 insertarNuevaIp($personajeip);
	 }else{
	 //	$mensaje="El usuario ya existe.";
	 }*/
?>
<!DOCTYPE html>
	<html lang="en">
  	<head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   		<meta name="description" content="gestinar paginas web">
    	<meta name="author" content="tipolisto">
        
    	<link rel="icon" href="imagenes/favicon.ico">
		
      	<title>Chat tipolisto</title>
 		
		<link href="css/bootstrap.min.css" rel="stylesheet">
   
        <!--<script language="javascript" src="js/bootstrap.min.js"></script>-->
        <!-- Just for debugging purposes. Don't actually copy these 2 lines -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
      </head>

      <body>
        <div class="container">
        <br />
          <div class='row'>Total: <div id='divusuariosactivos'></div></div>
          <div class="row">
            <div class='col-xs-12 col-sm-12 col-md-10'>
              <canvas id="canvas" name="canvas" style="background-color:#E1FFC4"></canvas>
            </div>
          </div> <!-- final de la fila -->
          <br /><br /><br />
          <div><p><a href="http://juegos.tipolisto.es" >Más juegos</a></p></div>
          <div><p><a href="index.php" >Reiniciar pong</a></p></div>
            <p>
	            <?php
	            	if(isset($mensaje)){
	            		echo $mensaje;
	            	}
	            ?>
        	  </p>
          <div id="mensajesservidor"></div>
        	<footer>
               <br /><br /><br /><br /><p>&copy; Tipolisto.es 2015</p>
        	</footer>
            
			
     	</div> <!-- final del container -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script language="javascript" src="js/funcionesusuarios.js"></script>
        <script language="javascript" src="js/personaje.js"></script>
        <script language="javascript" src="js/main.js"></script>
      </body>
 	</html>
        