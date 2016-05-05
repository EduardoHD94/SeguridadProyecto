<?php
session_start(); 
	if(empty($_SESSION['idUsuario']))
	{
		header('Location: index.php');
	}
	else
	{
        function numeroProductos(){
			$i = 0;
			if(isset($_SESSION["cart_products"]))
				foreach($_SESSION["cart_products"] as $c){
					$i = $i + $c["product_qty"];
				}  
			return $i;
		}
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
        			url:"../include/perfil.php",
        			dataType:"json",
        			success:function(data)
                    {
        				$.each(data, function(index)
                        {
                            $("#correos").append("<li>"+data[index].Email+"</li>")

        				});
        			}
        		});
        		$.ajax({
        			url:"../include/telefonos.php",
        			dataType:"json",
        			success:function(data)
                    {
        				$.each(data, function(index)
                        {
                            $("#telefonos").append("<li>"+data[index].Telefono+"</li>")

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
		<div class="booking">
			<!-- container -->
			<div class="container">
				<div class="booking-info">
					<h3>Perfil</h3>
				</div>
			    <div class="col-md-4">
			                        <div class = "form-group">
			                          <center><img ng-if="blob=='0'" src="images/defaultprofile.jpg" alt="Default Profile" class="img-thumbnail"><br></center>
			                          <form method="post" enctype="multipart/form-data" name="myForm">
										<center><label for="urlFile">Foto de Perfil</label>
			  							<input type="file" name="file" required/><br>
			  							<input type="submit" name="submit" class="btn btn-info" value="Agregar foto" /></center>
									  </form>
			                            <center><button type="button" ng-click="deleteimg()" class="btn btn-danger">Eliminar</button></center>
			                          </div>
			    </div>
			    <div class = "col-md-8">
			                        <form>
			                        <div class="form-group  col-md-12">
			                            <label for="usuario">Usuario</label>
			                            <input type="text" class="form-control" name="usuario" value="<?php echo $_SESSION['Usuario'];?>">
			                        </div>
			                        <div class="form-group  col-md-12">
			                            <label>Nombre Completo</label>
			                            <input type="text" class="form-control" name="nombreCompleto" value="<?php echo $_SESSION['NombreCompleto']?>">
			                        </div>
			                        <div class="form-group col-md-6">
			                            <label>Correos Electrónicos</label>
			                            <input type="text" class="form-control" name="newcorreo">
			                        	<ul id="correos">
        								</ul>
        							</div>
        							<div class="form-group col-md-6">
			                            <label>Números de Teléfono</label>
			                            <input type="text" class="form-control" name="newcorreo">
			                        	<ul id="telefonos">
        								</ul>
        							</div>
        							<div class="col-md-12">
									<button class="btn btn-success" type="submit">Guardar los cambios</button>
									</div>
			                        </form><br>
			    </div>
			</div>
		</div>
		<!-- booking -->
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
								<li><a href="inicio.html">Inicio</a></li>
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