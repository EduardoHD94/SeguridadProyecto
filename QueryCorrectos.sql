

/* Barcos completo */
select NombreBarco, Precio, Stock, NombrePuerto, Ciudad.NombreCiudad, Categoria.NombreCategoria, Tasa.Porcentaje
from Barco,Puerto,Ciudad, Categoria, Tasa
where Barco.idPuerto = Puerto.idPuerto
AND Puerto.idCiudad = Ciudad.idCiudad
AND Puerto.idCategoria = Categoria.idCategoria
AND Tasa.idTasa = Puerto.idTasa;
/* Fin Barcos completo */


/* Hoteles Completo */
select NombreHotel, Precio,Habitaciones, ClasificacionColor.NombreClasificacion, NombreCiudad  from Hotel,Ciudad,ClasificacionColor
where Hotel.Clasificacion = ClasificacionColor.idClasificacionColor and
Ciudad.idCiudad = Hotel.idCiudad;
/* Fin Hoteles Completo */


select Aerolinea.NombreAerolinea ,Aerolinea.Imagen, Aeropuerto.NombreAeropuerto,Tasa.Porcentaje, Ciudad.NombreCiudad, Categoria.NombreCategoria
from AeroLineaPuerto,Aerolinea,Aeropuerto,Tasa, Categoria, Ciudad 
where Aerolinea.idAerolinea = AeroLineaPuerto.idAerolinea 
and AeroLineaPuerto.idAeropuerto = Aeropuerto.idAeropuerto 
and Tasa.idTasa = Aeropuerto.idTasa 
and Categoria.idCategoria = Aeropuerto.idCategoria
and Ciudad.idCiudad = Aeropuerto.idCiudad 
order by NombreCiudad;
/***********************************************/

select Automovil.NombreAutomovil, Automovil.Precio, Automovil.Gama, Automovil.Imagen 
from Automovil;

select Usuarios.Usuario, Correos.Email 
from Correos, Usuarios 
where Correos.idUsuario = Usuarios.idUsuarios 
AND Usuarios.idUsuarios = 1;

select Telefonos.Telefono, Usuarios.Usuario 
from Telefonos, Usuarios 
where Telefonos.idUsuario = Usuarios.idUsuarios
and Usuarios.idUsuarios = 1;

select Usuarios.Usuario, Usuarios.NombreCompleto, Usuarios.contrasena,Perfiles.TipoPerfil
from Usuarios, Perfiles 
where Usuarios.Perfil = Perfiles.idPerfiles;