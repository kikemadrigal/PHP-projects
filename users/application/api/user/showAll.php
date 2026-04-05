<?php

Conexion::abrir_conexion();
$conexion=Conexion::obtener_conexion();
$usuarios=Users::obtener_todos($conexion);
//En la base de datos están los usuario 11,12,14,15
//echo "Usuario: ".$usuario->getNombre().", ".$usuario->getId();
$usuariosJson= json_encode($usuarios);
echo $usuariosJson;
Conexion::cerrar_conexion();

?>