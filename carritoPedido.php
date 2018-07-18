

<?php

 include_once('Producto_1.php');
 include_once('carrito.php');
 include_once('MantPedido.php');
$nro_mesa= $_SESSION['nro_mesa'];
//echo $nro_mesa;
 
 $usuario=$_SESSION['user'];
 //echo $usuario;
 
 	$product = new Product();
	$cart = new Cart();
	$pedido = new Pedido();
	
     
	



	if(isset($_GET['action'])){
		switch ($_GET['action']){

			case 'remove':
				$cart->remove_item($_GET['code']);
			break;
			
			case 'guardar':
			    
		    $fechaActual = date('d/m/Y H:i:s');
   
                $itemPedido = array(
				"numcliente" => "454297990",
				"nummesa" => $nro_mesa,
				"fechpedido" => $fechaActual,
				"estproceso" => 1,				
				"estpedido" => 1,
				"obspersonal" => "",
				"fechupdpedido" => "",
				"obscliente" => "",
		        "codusuario" => $_SESSION['user']);
				
				//$data=>CrearCabeceraPedido($itemPedido);
				
				
				$pedido ->CrearCabeceraPedido($itemPedido);
	

	
	            
				
					
				//$pedido->	guardar_detPedido()
					
					//echo "Datos guardados correctamente";
					
				
				
			break;    

				
              
			
		}
	}

	

	
	
	
	 
?>

<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
<link rel="stylesheet" href="css/style5.css">
<link rel="stylesheet" href="css/style_tabla.css">
<script type="text/javascript" src="js/functions.js"></script>

</head>
<body >

<?php
include_once("cabecera_2.php");
?>

<center>


<?=$cart->get_items_carrito();?>





</center>







</body>

</html>