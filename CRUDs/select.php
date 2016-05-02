<?php

	include('Conexion.php');
	$db = new Database();
	$db->connect();
	
		if($db->select('usuarios') === true)
		{
			$response = $db->getResult();
			print_r($response);
			//header('Location: index.php?select='.urlencode(serialize($response)).'&ok=true'); 	// Table name, column names and values, WHERE conditions
			//header('Location: index.php?select='.http_build_query($response).'&ok=true'); 	// Table name, column names and values, WHERE conditions
		}
		else
			header('Location: index.php?ok=false'); 

?>