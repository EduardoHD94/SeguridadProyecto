<?php

	include('Conexion.php');
	$db = new Database();
	$db->connect();

	$table = "";
	$rows = "";


	$db->sql("select NombreBarco, Precio, Stock, NombrePuerto, Ciudad.NombreCiudad, Categoria.NombreCategoria, Tasa.Porcentaje from Barco,Puerto,Ciudad, Categoria, Tasa
where Barco.idPuerto = Puerto.idPuerto 
AND Puerto.idCiudad = Ciudad.idCiudad AND Puerto.idCategoria = Categoria.idCategoria AND Tasa.idTasa = Puerto.idTasa");
	$response = $db->getResult();

	//print_r($response);
	$json = json_encode($response);	

	print($json);

	$json2 = json_decode($json,true);

	echo "<br><br>"+$json2[1]['Stock'];
	//echo $json2['Stock'];



/*
select NombreBarco, Precio, Stock, NombrePuerto, Ciudad.NombreCiudad, Categoria.NombreCategoria, Tasa.Porcentaje from Barco,Puerto,Ciudad, Categoria, Tasa
where Barco.idPuerto = Puerto.idPuerto 
AND Puerto.idCiudad = Ciudad.idCiudad AND Puerto.idCategoria = Categoria.idCategoria AND Tasa.idTasa = Puerto.idTasa;
*/

?>