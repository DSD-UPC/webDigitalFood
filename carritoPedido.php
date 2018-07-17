

<?php
 include_once('Producto_1.php');
 include_once('carrito.php');

 
 	$product = new Product();
	$cart = new Cart();
	
     
	



	if(isset($_GET['action'])){
		switch ($_GET['action']){

			case 'remove':
				$cart->remove_item($_GET['code']);
			break;
		}
	}
	else{
		
		
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