<?php
session_start(); 
	if(empty($_SESSION['idUsuario']))
	{
		header('Location: index.php');
	}
	else
	{
	include('../include/Conexion.php');
        function numeroProductos(){
			$i = 0;
			if(isset($_SESSION["cart_products"]))
				foreach($_SESSION["cart_products"] as $c){
					$i = $i + $c["product_qty"];
				}  
			return $i;
		}
    $current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	$db = new Database();
	$db2 = new Database();
	$db->connect();
	$db2->connect();
	$db->sql("select Aerolinea.NombreAerolinea ,Aerolinea.Imagen, Aeropuerto.NombreAeropuerto,Tasa.Porcentaje, Ciudad.NombreCiudad, Categoria.NombreCategoria from AeroLineaPuerto,Aerolinea,Aeropuerto,Tasa, Categoria, Ciudad 
where Aerolinea.idAerolinea = AeroLineaPuerto.idAerolinea and AeroLineaPuerto.idAeropuerto = Aeropuerto.idAeropuerto and Tasa.idTasa = Aeropuerto.idTasa and Categoria.idCategoria = Aeropuerto.idCategoria and Ciudad.idCiudad = Aeropuerto.idCiudad LIMIT 12");
	$response = $db->getResult();

	$db2->sql("select NombreHotel, Imagen, Precio, Habitaciones, ClasificacionColor.NombreClasificacion, NombreCiudad  from Hotel,Ciudad,ClasificacionColor
where Hotel.Clasificacion = ClasificacionColor.idClasificacionColor and Ciudad.idCiudad = Hotel.idCiudad LIMIT 12");
	$hoteles = $db2->getResult();
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
	<head>
		<title>Viajes ETSEIT</title>
		<meta charset="UTF-8">
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
		<!-- web-font -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
		<!-- web-font -->
		<!-- js -->
		<script src="js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script src="js/modernizr.custom.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!-- js -->
		<script src="js/modernizr.custom.js"></script>
		<!-- start-smoth-scrolling -->
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
		<script>
        	$(function(){
        		$.ajax({
        			url:"../include/automovil.php",
        			dataType:"json",
        			success:function(data){
        				$.each(data, function(index){
                            $("#autos").append("<form method='post' action='cart.php'><div style='float:left;width: none;' class='top-grid'><img style='width:250px;height:150px;' src='"+data[index].Imagen+"' alt=''><div class='top-grid-info visiting-grid'><h3>"+data[index].NombreAutomovil+"</h3><p><strong>Precio:</strong> $"+data[index].Precio+"<br><strong>Gama: </strong>"+data[index].Gama+"<center><button type='submit' class='btn btn-warning' role='button'>Agregar al carrito</button></center></p></div></div></form>")
        				});
        			}
        		});
        		$.ajax({
        			url:"../include/barcos.php",
        			dataType:"json",
        			success:function(data)
                    {
        				$.each(data, function(index)
                        {
                            $("#barcos").append("<form method='post' action='cart.php'><div  style='float:left;width: none;' class='top-grid'><img style='width:250px;height:150px;' src='http://www.abc.es/Media/201305/16/fortuna-barco--644x362.jpg' alt=''><div class='top-grid-info visiting-grid'><h3>"+data[index].NombreBarco+"</h3><p><strong>Puerto:</strong> "+data[index].NombrePuerto+"<br><strong>Precio: </strong>$"+data[index].Precio+"<br><strong>Disponibles: </strong>"+data[index].Stock+"<br><strong>Categoria: </strong>"+data[index].NombreCategoria+"<br><strong>Ciudad: </strong>"+data[index].NombreCiudad+"<br><strong>Porcentaje: </strong>"+data[index].Porcentaje+"%<center><button type='submit' class='btn btn-danger' role='button'>Agregar al carrito</button></center></p></div></div></form>")

        				});
        			}
        		});
        	});
        </script>
		<!-- start-smoth-scrolling -->
	</head>
	<body>
		<div class="head-bg green">
			<!-- container -->
			<div class="container">
				<div class="head-logo">
					<a href="index.html"><img src="images/logo1.png" alt="" /></a>
				</div>
				<div class="top-nav">
						<span class="menu"><img src="images/menu.png" alt=""></span>
							<ul class="cl-effect-1">
								<li><a href="index.php">Inicio</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Servicios <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="aerolineas.php">aerolineas</a></li>
                                        <li><a href="barcos.php">barcos</a></li>
                                        <li><a href="autos.php">Autos</a></li>
                                        <li><a href="hoteles.php">Hoteles</a></li>
                                    </ul>
                                </li>
								<li><a href="booking.php">mis reservaciones <span class='badge bg-primary'><?php echo numeroProductos();?></span></a></li>
								<li><a href="perfil.php"><?php echo $_SESSION["Usuario"];?></a></li>  
								<li><a href="../include/cerrarSesion.php">Cerrar Sesión</a></li>
							</ul>
							<!-- script-for-menu -->
							 <script>
							   $( "span.menu" ).click(function() {
								 $( "ul.cl-effect-1" ).slideToggle( 300, function() {
								 // Animation complete.
								  });
								 });
							</script>
						<!-- /script-for-menu -->
					</div>
				<div class="clearfix"> </div>
			</div>
			<!-- //container -->
		</div>
		<!-- booking -->
            <div class="container">
				<?php
					if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0){
						$button = true;
						$total =0;
						$subtotal = 0;
						
						echo "<form method='post' action='../include/cart.php'>";
						print "<div class='row'>
                                        <div class='col-md-12'>
                                            <center><h1>Mis reservaciones</h1></center><br>
                                            <div class='table-responsive'>
                                              <table class='table'>
                                                <thead>
                                                    <tr>
                                                        <th>Imagen</th>
                                                        <th>Servicio</th>
                                                        <th>Titulo</th>
                                                        <th>Precio</th>
                                                        <th>Cantidad</th>
                                                        <th>Eliminar</th>
                                                    </tr>
                                                </thead>";
						foreach ($_SESSION["cart_products"] as $cart_itm){
						
							$product_name = $cart_itm["product_name"];
							$product_qty = $cart_itm["product_qty"];
							$product_price = $cart_itm["product_price"];
                            $tipo = $cart_itm["type"];
							$id = $cart_itm["id"];
                            $imagen = $cart_itm["imagen"];
							
							print "
                                                  <tr>
                                                      <td><img width='50px' src=".$imagen." class='img-responsive img-rounded' alt=''></td>
                                                      <td>".$tipo."</td>
                                                      <td>". $product_name ."</td>
                                                      <td>$". $product_price ."</td>
                                                      <td><input type='text' class = 'form-control' size='2' maxlength='2' name='product_qty[".$id."]'  onkeypress='return validar(event)' value='".$product_qty."' /></td>
                                                      <td><div class='alert alert-danger' role='alert'>
                                                            <input type='checkbox' name='remove_code[]' value='".$id."' />
                                                            <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>
                                                        </div></td>
                                                  </tr>
							";
							$subtotal = $product_price * $product_qty;
							$total = $total + $subtotal;
						}
                        print "
                                                <tbody>
                                                </tbody>
                                              </table>
                                            </div>
                                        </div>
                                    </div>
								<hr>";
						echo "<center><h4>Total = $".$total."</h4></center>";
						echo "<input type='hidden' name='return_url' value='".$current_url."' />";
						echo "<center><button type='submit' class='btn btn-primary'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span> Actualizar Carrito</button></center>";
						
						echo "</form>";
					}
					else{
						print "
                        <div class='row'><div class='col-md-12'><h2><center>No hay productos en el carrito.</center></h2></div></div>";
						$button = false;
					}
				?>
            </div>
        <div style="margin:100px;"></div>
		<!-- footer -->
		<div class="footer">
			<!-- container -->
			<div class="container">
				<div class="footer-left">
					<p>Design by <a href="http://w3layouts.com/">W3layouts</a></p>
				</div>
				<div class="footer-right">
					<div class="footer-nav">
						<ul>
							<li><a href="index.php">Inicio</a></li>
							<li><a href="booking.php">mis reservaciones</a></li>
							<li><a href="perfil.php"><?php echo $_SESSION["Usuario"];?></a></li>  
							<li><a href="../include/cerrarSesion.php">Cerrar Sesión</a></li>
						</ul>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<!-- //container -->
		</div>
		<!-- //footer -->
		<script type="text/javascript">
									$(document).ready(function() {
										/*
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
										*/
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>
									<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- content-Get-in-touch -->
	</body>
</html>
<?php 
}
?>