<?php

	include('Conexion.php');
	$db = new Database();
	$db->connect();


	$usuario = $_POST['usuario'];
	$contrasena = $_POST['contrasena'];

	//Evitar sql injections	
	$usuario = $db->escapeString($usuario);
	$contrasena = $db->escapeString($contrasena);

	//Codigo injection: ' or '1'='1
	$table = "Usuarios";
	$rows = "*	";
	$where = 'Usuario = "'.$usuario.'" AND Contrasena = "'.$contrasena.'"';

	$db->select($table,$rows,NULL,$where);
		
	$response = $db->getResult();

	if($response == True)
	{
		$json = json_encode($response);	
		$json_dec = json_decode($json);
		$idUsuario = $json_dec[0]->{"idUsuarios"};
		$Usuario = $json_dec[0]->{"Usuario"};
		$NombreCompleto = $json_dec[0]->{"NombreCompleto"};

		echo $idUsuario." ".$NombreCompleto." ".$Usuario;
		session_start();
		$_SESSION["idUsuario"] = $idUsuario;


		//echo "ID Usuario: " . $_SESSION["idUsuario"];
		//$_SESSION["favanimal"] = "cat";
		
	}

?>