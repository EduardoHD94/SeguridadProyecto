
<?php
include('Conexion.php');

$tabla = "usuarios";
$nombre = "omar";
$email = "omar_95@hotmail.com";
$apellidos = "Juarez Dominguez";
$password = "omar";

$db = new Database();
$db->connect();
$email = $db->escapeString($email); // Escape any input before insert
                                   
$response = $db->insert($tabla,array('nombre'=>$nombre,'email'=>$email,'apellidos'=>$apellidos,'password'=>$password));  // Table name, column names and respective values

if($response)
	header('Location: index.php?insert=true'); 	// Table name, column names and values, WHERE conditions
else
	header('Location: index.php?insert=false'); 	// Table name, column names and values, WHERE conditions


//print_r($res);
?>