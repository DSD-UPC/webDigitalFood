
<?php


if (isset($_POST['usuario']))
{
	$mensaje_error=0;
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];

	$url = 'http://localhost:8088/api/ValUsuario2';

	$data = array('codusuario'=>$usuario,
                'password'=> $password
                );
				
				//$jsonDataEncoded = json_encode($data);
	
	//  $postdata = http_build_query($jsonDataEncoded);

$opts = array('http' =>
    array(
        'method'  => 'POST',
		'header' => "Content-Type: application/json\r\n",
		'content' => json_encode($data)
    )
);



$context = stream_context_create($opts);

$response = file_get_contents($url, false, $context);
	
// Decode the response
$DataUsuario = json_decode($response, TRUE);

$mensaje_error = 1;
$nomusuario = $DataUsuario["nomusuario"];

// Print the date from the response

	
	
}	




?>
<html> 
<head> 

<title>Digital Food - Login</title> 
<link rel="stylesheet" href="css/style1.css"

</head> 
<body>


 

<form class="" action="" method="POST">
<h2>Iniciar Sesion</h2>

  <input type="text" name="usuario" placeholder="usuario" value="<?= (isset($_POST['usuario']))?$_POST['usuario']:""; ?>">

  <input type="password" name="password" placeholder="&#128272; password" value="">
 
  <input type="submit" name="button" value="Ingresar">
  
 <center> <label for="male"><?php 
  
  if (isset($_POST['usuario'])){
	  
	
	    if ($mensaje_error==1){
	        echo $nomusuario;
		
	  
        }

else
{
	
	echo "";
}	
  }


   ?>
  
  
  </label>
</center>
</form>

</body> 

</html>
