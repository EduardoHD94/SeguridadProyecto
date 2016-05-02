<?php
session_start(); 
	if(empty($_SESSION['idUsuario']))
	{
		header('Location: index.php');
	}else
	{
		session_destroy();
		header('Location: ../html/index.php');
	}

?>