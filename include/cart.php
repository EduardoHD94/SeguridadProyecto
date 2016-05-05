<?php
	session_start(); //start session
    include('Conexion.php');

	function agregarProducto(){
		foreach($_POST as $key => $value){ //add all post vars to new_product array
			$new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING);
		}

		//we need to get product name and price from database.
		$db = new Database();
        $db->connect();
        $table = "";
        $rows = "";
        
        switch ($new_product['type']) {
            case 'Hotel':
                    $db->sql("SELECT * FROM Hotel WHERE idHotel = ". $new_product['id']."");
                    $response = $db->getResult();

                        //fetch product name, price from db and add to new_product array
                    $new_product["product_name"] = $response[0]['NombreHotel']; 
                    $new_product["product_price"] = $response[0]['Precio'];
                    $new_product["imagen"] = $response[0]['imagen'];


                    if(isset($_SESSION["cart_products"])){  //if session var already exist
                      if(isset($_SESSION["cart_products"][$new_product['id']])) //check item exist in products array
                      {
                        unset($_SESSION["cart_products"][$new_product['id']]); //unset old array item
                      }           
                    }
                    $_SESSION["cart_products"][$new_product['id']] = $new_product; //update or create product session with new item  
                break;
            case 'Aerolinea':
                    $db->sql("select Aerolinea.NombreAerolinea, Aerolinea.Imagen, AeroLineaPuerto.idAeroLineaPuerto, AeroLineaPuerto.idAeropuerto, AeroLineaPuerto.idAerolinea, AeroLineaPuerto.Stock, AeroLineaPuerto.Precio from AeroLineaPuerto, Aerolinea where Aerolinea.idAerolinea = AeroLineaPuerto.idAerolinea and AeroLineaPuerto.idAeroLineaPuerto = ". $new_product['id']."");
                    $response = $db->getResult();
                
                        //fetch product name, price from db and add to new_product array
                    $new_product["product_name"] = $response[0]['NombreAerolinea']; 
                    $new_product["imagen"] = $response[0]['Imagen'];
                    $new_product["product_price"] = $response[0]['Precio'];


                    if(isset($_SESSION["cart_products"])){  //if session var already exist
                      if(isset($_SESSION["cart_products"][$new_product['id']])) //check item exist in products array
                      {
                        unset($_SESSION["cart_products"][$new_product['id']]); //unset old array item
                      }           
                    }
                    $_SESSION["cart_products"][$new_product['id']] = $new_product; //update or create product session with new item  
                break;
            case 'Autos':
                    $db->sql("SELECT * FROM Automovil WHERE idAutomovil = ". $new_product['id']."");
                    $response = $db->getResult();
                    
                    $new_product["product_name"] = $response[0]['NombreAutomovil']; 
                    $new_product["imagen"] = $response[0]['Imagen'];
                    $new_product["product_price"] = $response[0]['Precio'];


                    if(isset($_SESSION["cart_products"])){  //if session var already exist
                      if(isset($_SESSION["cart_products"][$new_product['id']])) //check item exist in products array
                      {
                        unset($_SESSION["cart_products"][$new_product['id']]); //unset old array item
                      }           
                    }
                    $_SESSION["cart_products"][$new_product['id']] = $new_product; //update or create product session with new item  
                break;
            case 'Barco':
                    $db->sql("SELECT * FROM Barco WHERE idBarco = ". $new_product['id']."");
                    $response = $db->getResult();
                    
                    $new_product["product_name"] = $response[0]['NombreBarco']; 
                    $new_product["imagen"] = "http://www.abc.es/Media/201305/16/fortuna-barco--644x362.jpg";
                    $new_product["product_price"] = $response[0]['Precio'];


                    if(isset($_SESSION["cart_products"])){  //if session var already exist
                      if(isset($_SESSION["cart_products"][$new_product['id']])) //check item exist in products array
                      {
                        unset($_SESSION["cart_products"][$new_product['id']]); //unset old array item
                      }           
                    }
                    $_SESSION["cart_products"][$new_product['id']] = $new_product; //update or create product session with new item  
                break;
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
            echo "HE actualizado";
		}
		//remove an item from product session
		if(isset($_POST["remove_code"]) && is_array($_POST["remove_code"])){
			eliminarProductos();
            echo "he Eliminado";
		}
	}
	
	

	//back to return url
	$return_url = (isset($_POST["return_url"]))?urldecode($_POST["return_url"]):''; //return url
	header('Location:'.$return_url);

?>