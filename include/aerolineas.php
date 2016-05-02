<?php

	include('Conexion.php');
	$db = new Database();
	$db->connect();
	$db->sql("select Aerolinea.NombreAerolinea ,Aerolinea.Imagen, Aeropuerto.NombreAeropuerto,Tasa.Porcentaje, Ciudad.NombreCiudad, Categoria.NombreCategoria from AeroLineaPuerto,Aerolinea,Aeropuerto,Tasa, Categoria, Ciudad 
where Aerolinea.idAerolinea = AeroLineaPuerto.idAerolinea and AeroLineaPuerto.idAeropuerto = Aeropuerto.idAeropuerto and Tasa.idTasa = Aeropuerto.idTasa and Categoria.idCategoria = Aeropuerto.idCategoria and Ciudad.idCiudad = Aeropuerto.idCiudad");
	$response = $db->getResult();

	$json = json_encode($response);	

	echo $json;


/*
select Aerolinea.NombreAerolinea ,Aerolinea.Imagen, Aeropuerto.NombreAeropuerto,Tasa.Porcentaje, Ciudad.NombreCiudad, Categoria.NombreCategoria
from AeroLineaPuerto,Aerolinea,Aeropuerto,Tasa, Categoria, Ciudad 
where Aerolinea.idAerolinea = AeroLineaPuerto.idAerolinea 
and AeroLineaPuerto.idAeropuerto = Aeropuerto.idAeropuerto 
and Tasa.idTasa = Aeropuerto.idTasa 
and Categoria.idCategoria = Aeropuerto.idCategoria
and Ciudad.idCiudad = Aeropuerto.idCiudad 
order by NombreCiudad;*/
?>