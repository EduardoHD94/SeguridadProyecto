<?php
	session_start(); 
	include('Conexion.php');
	$db = new Database();
	$db->connect();
	
	if(empty($_SESSION['idUsuario'])){
		header('Location: index.php');
	}else
	{
		$db->sql('select Correos.Email from Correos, Usuarios where Correos.idUsuario = Usuarios.idUsuarios AND Usuarios.idUsuarios ="'.$_SESSION['idUsuario'].'"');
		$response = $db->getResult();
		

		$json = json_encode($response);	
		echo $json;
	}

?>