<?php
	session_start(); //start session
	include_once("funcionesPHP/dbconnect.php"); //include config file


	function agregarProducto(){
		foreach($_POST as $key => $value){ //add all post vars to new_product array
			$new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING);
			//echo $new_product[$key] . "<br>";
		}
		//remove unecessary vars
		unset($new_product['type']);
		unset($new_product['return_url']); 
		
		//we need to get product name and price from database.
		
		$res = mysql_query( "SELECT * FROM productos WHERE id = ". $new_product['id'] );
		
		while($fila = mysql_fetch_array($res)){
			
			//fetch product name, price from db and add to new_product array
			$new_product["product_name"] = $fila["nombre"]; 
			$new_product["product_price"] = $fila["precio"];
			
			
			if(isset($_SESSION["cart_products"])){  //if session var already exist
				if(isset($_SESSION["cart_products"][$new_product['id']])) //check item exist in products array
				{
					unset($_SESSION["cart_products"][$new_product['id']]); //unset old array item
				}           
			}
			$_SESSION["cart_products"][$new_product['id']] = $new_product; //update or create product session with new item  
		} 
	}
	
	function actualizarProductos(){
		foreach($_POST["product_qty"] as $key => $value){
            if(is_numeric($value)){
                $_SESSION["cart_products"][$key]["product_qty"] = $value;
            }
        }
	}
	
	function eliminarProductos(){
		foreach($_POST["remove_code"] as $key){
            unset($_SESSION["cart_products"][$key]);
        }  
	}

	//add product to session or create new one
	if( isset($_POST["type"]) ){
			agregarProducto();
		
	}

	//update or remove items 
	if(isset($_POST["product_qty"]) || isset($_POST["remove_code"])){
		//update item quantity in product session
		if(isset($_POST["product_qty"]) && is_array($_POST["product_qty"])){
			actualizarProductos();
		}
		//remove an item from product session
		if(isset($_POST["remove_code"]) && is_array($_POST["remove_code"])){
			eliminarProductos();
		}
	}
	
	

	//back to return url
	$return_url = (isset($_POST["return_url"]))?urldecode($_POST["return_url"]):''; //return url
	header('Location:'.$return_url);

?>