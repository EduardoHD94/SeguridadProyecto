<?php

	include('Conexion.php');
	$db = new Database();
	$db->connect();

	$table = "";
	$rows = "";


	$db->select($table,$rows);
	$response = $db->getResult();

	//print_r($response);

	$json =  json_encode($response);	

	echo $json;


?>