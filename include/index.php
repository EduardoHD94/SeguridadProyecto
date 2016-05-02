<?php

	/*********** INSERT RESPONSE ****************/

	if(isset( $_GET['insert']))
		if( $_GET['insert'] === true)
			echo "Registro realizado correctamente<br><br>";
		else
			echo "No se pudo realizar el registro<br><br>";

	/********* END INDSERT  *********************/



	/********** UPDATE RESPONSE *****************/

	if (isset($_GET['update']))
		if ($_GET['update'] === true)
			echo "Actualización realizada correctamente<br><br>";
		else
			echo "No se pudo actualizar la información<br><br>";

	/********* END UPDATE  *********************/


	/********** SELECT RESPONSE ****************/
	
	if (isset($_GET['select']))
	{
		if (isset($_GET['ok']))
		{
			if($_GET['ok'] ==true )
			{
				$response = unserialize(urldecode($_GET['select']));
				//		print_r($response); Imprimir en formato array
				foreach($response as $res)
				{
				    echo $res["id"]." ".$res["nombre"]." ".$res["apellidos"]." ";
				    echo $res["email"]." ".$res["password"]." ".$res["creado"]."<br/>";
				}
			}
			else
				echo "No se pudo recuperar la información";
		}
		else
			echo "No se pudo recuperar la información";
	}

	/********* END SELECT  *********************/



	/**************DELETE RESPONSE**************/

	if (isset($_GET['delete']))
		if ($_GET['delete'] === true)
			echo "Registro eliminado correctamente";
		else
			echo "No se pudo eliminar el registro";

	/********* END DELETE  *********************/

?>

