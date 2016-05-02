

<?php

	include('Conexion.php');
	$db = new Database();
	$db->connect();
	$db->sql("select NombreHotel, Precio, Habitaciones, ClasificacionColor.NombreClasificacion, NombreCiudad  from Hotel,Ciudad,ClasificacionColor
where Hotel.Clasificacion = ClasificacionColor.idClasificacionColor and Ciudad.idCiudad = Hotel.idCiudad");
	$response = $db->getResult();

//	print_r($response);
	
	$json = json_encode(array_values($response));	

	var_dump($response);

	echo $json;


/*
select NombreHotel, Precio, Habitaciones, ClasificacionColor.NombreClasificacion, NombreCiudad  from Hotel,Ciudad,ClasificacionColor
where Hotel.Clasificacion = ClasificacionColor.idClasificacionColor and Ciudad.idCiudad = Hotel.idCiudad;
*/
?>