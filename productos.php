<?php

     $codigo =$_GET['cod_categ'];
	 $nomCategoria='POLLOS A LA BRASA';

	$url = 'http://localhost:8088/api/ListarProductos/' . $codigo;

$response = file_get_contents($url);
	
// Decode the response
$DataProductos = json_decode($response, TRUE);

$totalReg =  count($DataProductos);

// Print the date from the response
//echo $totalReg;
?>





<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	
<link rel="stylesheet" href="css/title.css">
<link rel="stylesheet" href="css/style_products.css">
<link rel="stylesheet" href="css/style5.css">	
	</head>
<body >
<center>

<?php
include_once("cabecera_2.php");
?>

<div class="title">
<text>
		

  <?=$nomCategoria ?>
  
  

</text>

</div>
<?php

 for ($index = 0; $index < $totalReg; $index++) {   ?>


<center>
	<div class="contain">

		<a href="detalleProducto.php?cod=<?=$DataProductos[$index]['codproducto']?>">
		
	
		  <div class="left">

  
			  <img src="<?=$DataProductos[$index]['foto']?>" >
   

		  </div>




		  <div class="right" >
		     <p id="nomproduct"><?=$DataProductos[$index]['nomproducto']?></p>
			
			 <p style="margin-top:10x;color:#134085;" ><?=$DataProductos[$index]['descripcorta']?></p>

		  </div>
	   </a>
	</div>
</center>

<?php
}
?>

</body>

</html>