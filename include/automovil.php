<?php

	include('Conexion.php');
	$db = new Database();
	$db->connect();

	$table = "Automovil";
	$rows = "Automovil.NombreAutomovil, Automovil.Precio, Automovil.Gama, Automovil.Imagen";


	$db->select($table,$rows);
	$response = $db->getResult();

	//print_r($response);

	$json =  json_encode($response);	

	echo $json;


?>