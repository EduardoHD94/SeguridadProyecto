

<?php

	include('Conexion.php');
	$db = new Database();
	$db->connect();
	$db->sql("select NombreHotel, Precio, Habitaciones, ClasificacionColor.NombreClasificacion, NombreCiudad  from Hotel,Ciudad,ClasificacionColor
where Hotel.Clasificacion = ClasificacionColor.idClasificacionColor and Ciudad.idCiudad = Hotel.idCiudad");
	$response = $db->getResult();

	$json = json_encode($response);	

	echo $json;


/*
select NombreHotel, Precio, Habitaciones, ClasificacionColor.NombreClasificacion, NombreCiudad  from Hotel,Ciudad,ClasificacionColor
where Hotel.Clasificacion = ClasificacionColor.idClasificacionColor and Ciudad.idCiudad = Hotel.idCiudad;
*/
?>