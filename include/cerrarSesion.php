<?php
session_start(); 
include('Conexion.php');
$logged = new Database();
$logged->connect();
$table = "Usuarios";
	if(empty($_SESSION['idUsuario']))
	{
		header('Location: index.php');
	}else
	{
		session_destroy();
		$logged->update($table,array('logged'=>0), 'idUsuarios="'.$_SESSION['idUsuario'].'"');
		$res = $logged->getResult();
		header('Location: ../html/index.php');
	}

?>