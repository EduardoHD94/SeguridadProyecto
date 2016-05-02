<?php

	include('Conexion.php');
	$db = new Database();
	$db->connect();
/*
	$table = "Correos, Usuarios";
	$rows = "Usuarios.Usuario, Correos.Email";
	$where = "Correos.idUsuario = Usuarios.idUsuarios AND Usuarios.idUsuarios = 1"
*/
	//$db->select($table,$rows);
	$db->sql("select Usuarios.Usuario, Correos.Email from Correos, Usuarios where Correos.idUsuario = Usuarios.idUsuarios AND Usuarios.idUsuarios = 1");
	$response = $db->getResult();

	$json = json_encode($response);	

	echo $json;


?>