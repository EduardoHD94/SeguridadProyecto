<?php
	session_start(); 
	include('Conexion.php');
	$db = new Database();
	$db->connect();

	if(empty($_SESSION['idUsuario'])){
		header('Location: index.php');
	}else
	{
	$db->sql('select Telefonos.Telefono, Usuarios.Usuario from Telefonos, Usuarios where Telefonos.idUsuario = Usuarios.idUsuarios and Usuarios.idUsuarios  ="'.$_SESSION['idUsuario'].'"');
	$response = $db->getResult();

	$json = json_encode($response);	

	echo $json;
	}
?>