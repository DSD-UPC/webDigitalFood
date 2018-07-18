

<?php


session_start();
	
	 
	 	
		$url = 'http://localhost:8085/mesa/findAll';

		$response = file_get_contents($url);
	
// Decode the response
		$DataMesas = json_decode($response, TRUE);


		$totalReg =  count($DataMesas);
	
		
	


?>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Mesas</title>


	<link rel="stylesheet" href="css/style5.css">
	<script type="text/javascript" src="js/functions.js"></script>
</head>
<body>

<center>
<div class="div_mesa">
<p>MESAS DEL RESTAURANTE</p>



<p1>SELECCIONE MESA : </p1>     <select name="nromesa" id="nromesa">
<?php
    
		for ($index = 0; $index < $totalReg; $index++) { 
?>
		  <option value="<?=$DataMesas[$index]['nromesa']?>"><?=$DataMesas[$index]['nombremesa']?></option>
		<?php	
	}
?>


</select> 
<br>

<br>


    		     <button  id="addProdut" class="boton_personalizado" onClick="EntrarCantegoria();" style="height:40px;">
                        Siguiente
                      </button>

</div>
</center>
</body>

</html>
