<?php

$componentes_url=parse_url($_SERVER['REQUEST_URI']);
$ruta=$componentes_url['path'];
$partesRuta=explode("/",$ruta);
$partesRuta=array_filter($partesRuta);
$partesRuta=array_slice($partesRuta,0);


/**
 * Configuraciones
 */
//Configuracines generales
include_once "application/config/config.php";
//Constantes
include_once "application/config/constantes.php";
//Base de datos
include_once "application/config/Conexion.php";
include_once "application/model/user/User.php";
include_once "application/model/user/Users.php";

//echo "<h3>".count($partesRuta)."</h3>";
//echo var_dump($partesRuta);
$rutaElegida="";
//Cuando estás en desarrollo, con XAMPP, por ejemplo, la dirección es http://localhost/users/showAll
if($partesRuta[0]=='users'){

    if(count($partesRuta)==1){
        echo "Para realizar alguna operación con un usuario pon:<br> users/create <br> users/show  <br> users/showAll <br> users/delete <br> users/update.";
    } else{
        if($partesRuta[1]=='create'){
            $rutaElegida='application/api/user/create.php';
        }else if($partesRuta[1]=='showAll'){
            $rutaElegida='application/api/user/showAll.php';
        }else if($partesRuta[1]=='show'){
            //echo "<h3>".count($partesRuta)."</h3>";
            //echo var_dump($partesRuta);
            if(count($partesRuta)==3){
                $id_usuario=$partesRuta[2];
                $rutaElegida='application/api/user/show.php';
            }else{
                echo "Para ver un usuario debes de poner /user/x donde x es un número.";
            } 
        }else if($partesRuta[1]=='update'){
            $rutaElegida='application/api/user/update.php';
        }else if($partesRuta[1]=='delete'){
            $rutaElegida='application/api/user/delete.php';
        }
        //echo "<h3>Ruta elegida: ".$rutaElegida."</h3>";
        include_once $rutaElegida;
    }
}








//include_once $rutaElegida;
?>