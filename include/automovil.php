<?php

	include('Conexion.php');
	$db = new Database();
	$db->connect();

	$table = "Automovil";
	$rows = "Automovil.NombreAutomovil, Automovil.Precio, Automovil.Gama, Automovil.Imagen";
	$limit = "12";


	$db->select($table,$rows,NULL,NULL,NULL,$limit);
	$response = $db->getResult();

	//print_r($response);

	$json =  json_encode($response);	

	echo $json;


?>