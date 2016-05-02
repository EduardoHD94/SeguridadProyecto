<?php
	include('Conexion.php');
	$db = new Database();
	$db->connect();
	
	$tabla = "usuarios";
	$nombre = "Yair";
	$apellidos = "DQ";
	$email = "uno@gmail.com";
	$password = "yair4";
	$id = 3;

	$response = $db->update($tabla,array('nombre'=>$nombre,'email'=>$nombre,'apellidos'=>$apellidos,'password'=>$password), 'id="'.$id.'"');
	if($response)
	{
  		header('Location: index.php?update=true'); 	// Table name, column names and values, WHERE conditions
	}
	else
	{
  		header('Location: index.php?update=false'); 	// Table name, column names and values, WHERE conditions
  	}

?>