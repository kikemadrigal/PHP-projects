<?php
	/*for($i=0;$i<10;$i++){
		$datos[]=array('ronda'=>$i, 'jugadores'=>array(
		array('nombre'=>'Pepito', 'puntos'=>rand(0,100)),
		array('nombre'=>'Juanito', 'puntos'=>rand(0,100)),
		array('nombre'=>'Menganito', 'puntos'=>rand(0,100)),
		));	
	}*/
	$datos[]=array("name"=>'Cristina',"surname"=>"Onciu","gender"=>"male","region"=>"Romania");	
	//print_r($datos);
	header('Content-type: application/json');
	echo json_encode(array("name"=>"Cristina","surname"=>"Onciu","gender"=>"male","region"=>"Romania"));

?>