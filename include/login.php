<?php

	include('Conexion.php');
	$db = new Database();
	$db->connect();

	$logged = new Database();
	$logged->connect();

	$usuario = $_POST['usuario'];
	$contrasena = $_POST['contrasena'];

	//Evitar sql injections	
	$usuario = $db->escapeString($usuario);
	$contrasena = $db->escapeString($contrasena);

	//Codigo injection: ' or '1'='1
	$table = "Usuarios";
	$rows = "*	";
	$where = 'Usuario = "'.$usuario.'" AND Contrasena = "'.$contrasena.'" AND logged = 0';

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
		$_SESSION["NombreCompleto"] = $NombreCompleto;
		$_SESSION["Usuario"] = $Usuario;
		$logged->update($table,array('logged'=>1), 'idUsuarios="'.$idUsuario.'"');
		$res = $logged->getResult();
		header('Location: ../html/inicio.php');

		//echo "ID Usuario: " . $_SESSION["idUsuario"];
		//$_SESSION["favanimal"] = "cat";
		
	}else{
		header('Location: ../html/index.php?loggin=-1');
	}

?>