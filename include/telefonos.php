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
	$db->sql("select Telefonos.Telefono, Usuarios.Usuario from Telefonos, Usuarios where Telefonos.idUsuario = Usuarios.idUsuarios and Usuarios.idUsuarios = 1");
	$response = $db->getResult();

	$json = json_encode($response);	

	echo $json;


?>