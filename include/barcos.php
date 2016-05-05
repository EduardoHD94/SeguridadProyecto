<?php

	include('Conexion.php');
	$db = new Database();
	$db->connect();

	$table = "";
	$rows = "";


	$db->sql("select idBarco, NombreBarco, Precio, Stock, NombrePuerto, Ciudad.NombreCiudad, Categoria.NombreCategoria, Tasa.Porcentaje from Barco,Puerto,Ciudad, Categoria, Tasa
where Barco.idPuerto = Puerto.idPuerto 
AND Puerto.idCiudad = Ciudad.idCiudad AND Puerto.idCategoria = Categoria.idCategoria AND Tasa.idTasa = Puerto.idTasa LIMIT 12");
	$response = $db->getResult();

	//print_r($response);
	$json = json_encode($response);	

	print($json);
/*
select NombreBarco, Precio, Stock, NombrePuerto, Ciudad.NombreCiudad, Categoria.NombreCategoria, Tasa.Porcentaje from Barco,Puerto,Ciudad, Categoria, Tasa
where Barco.idPuerto = Puerto.idPuerto 
AND Puerto.idCiudad = Ciudad.idCiudad AND Puerto.idCategoria = Categoria.idCategoria AND Tasa.idTasa = Puerto.idTasa;
*/

?>