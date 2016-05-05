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
		<link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
		<!-- web-font -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- js -->
		<script src="js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script src="js/modernizr.custom.js"></script>
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
		<!-- start-smoth-scrolling -->
	</head>
	<body>
		<!-- header -->
		<div class="header">
			<div class="head-bg">
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
			<!-- container -->
			<div class="container">
				<!-- banner Slider starts Here -->
					<script src="js/responsiveslides.min.js"></script>
					 <script>
						// You can also use "$(window).load(function() {"
						$(function () {
						  // Slideshow 4
						  $("#slider3").responsiveSlides({
							auto: true,
							pager: false,
							nav: false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
							  $('.events').append("<li>before event fired.</li>");
							},
							after: function () {
							  $('.events').append("<li>after event fired.</li>");
							}
						  });
					
						});
					  </script>
					<!--//End-slider-script -->
					<div  id="top" class="callbacks_container">
						<ul class="rslides" id="slider3">
							<li>
								<div class="head-info">
									<h1> Duis purus leo<span>faucibus eu semper ut, hendrerit</span></h1>
									<p>Sollicitudin et elit sit amet, luctus placerat ipsum</p>
								</div>
							</li>
							<li>
								<div class="head-info">
									<h1>Aenean suscipit<span>Suspendisse venenatis volutpat </span></h1>
									<p>Morbi id felis porttitor tellus viverra pulvinar. Vestibulum </p>
								</div>
							</li>
							<li>
								<div class="head-info">
									<h1>Gestas vulputate<span>Morbi id felis porttitor tellus</span></h1>
									<p>Morbi id felis porttitor tellus viverra pulvinar.ante ipsum </p>
								</div>
							</li>
						</ul>
					</div>

			</div>
			<!-- container -->
		</div>
		<!-- //header -->
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
								<li><a href="index.html">Inicio</a></li>
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