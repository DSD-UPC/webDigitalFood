<?php


?>
<?php
    
	
	
	include_once('Producto_1.php');
    include_once('carrito.php');
	$product = new Product();
	$cart = new Cart();
	
   	if(isset($_GET['action'])){
		switch ($_GET['action']){
			case 'add':
				$cart->add_item($_GET['code'], $_GET['amount']);
				$codigo=$_GET['code'];
			break;

		}
	}
	else
	{
		
		
		$codigo = $_GET['cod'];
	
	}
	

?>

<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	<link rel="stylesheet" href="css/style4.css">

	<link rel="stylesheet" href="css/style5.css">
	
	<script type="text/javascript" src="js/functions.js"></script>
</head>
<body >
	<header>
		<div class="main-header" name="main-header" id="main-header">
		<div id="title_" class="title_">
			DIGITAL FOOD
			
			</div>
	<div id="opciones" class="opciones">
	     <a href="listado.php">INICIO</a>
				   <a href="carritoPedido.php" title="">
                        <img src="images/carrito.jpg"  />
                    </a>
</div>
</div>
</header>

<center>
<div class="title">
<text>


 POLLOS A LA BRASA
  
  

</text>

</div>

   <?=$product->getDetalleProducto($codigo);?>

   
</center>



</html>


<?



