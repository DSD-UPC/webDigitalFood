<?php
 include_once('Producto_1.php');
 include_once('carrito.php');
class Pedido extends Cart{

	
  public function CrearCabeceraPedido($itemPedido){
		

	  $url = 'http://localhost:8095/pedido/registrar';

 $opts = array('http' =>
    array(
        'method'  => 'POST',
		'header' => "Content-Type: application/json\r\n",
		'content' => json_encode($itemPedido)
		
    )
   );

	$context = stream_context_create($opts);

	$response = file_get_contents($url, false, $context);
	
    // Decode the response
	$DataPedido = json_decode($response, TRUE);
	
	//return $DataPedido;	
	
    $this->guardar_detPedido($DataPedido['codpedido']);
	
	}
	
	
	
		public function guardar_detPedido($nro_Pedido){
	    	
	    	if(!empty($this->cart)){
				
	    		foreach ($this->cart as $key){
					$hora = date('H:i:s');
					$code= $key['code'];
					$price = $key['price'];
	    						
														
								 $itemdetPedido = array(
											"numpedido" => $nro_Pedido,
											"codproducto" => $code,
											"precio" => $price,
											"cantidad" => $key['amount'],				
											"descuento" => "0",
											"horapedido" => $hora
									);
									
									
									$this->CrearDetallePedido($itemdetPedido);
									
									$this->remove_item($code);
									
									
									
									

				}
				
				
				
				header('Location:carritoPedido.php');
				
	    	}
	  
	    }
	
	
	
	  public function CrearDetallePedido($itemdetPedido){
		
       //var_dump($itemdetPedido);
	   
	  $url = 'http://localhost:8095/detpedido/registrar';

	  $opts = array('http' =>
      array(
        'method'  => 'POST',
		'header' => "Content-Type: application/json\r\n",
		'content' => json_encode($itemdetPedido)
		
    )
   );

	$context = stream_context_create($opts);

	$response = file_get_contents($url, false, $context);
	
    // Decode the response
	$DataDetPedido = json_decode($response, TRUE);
	
	
		return true;
	}
	
	
	
	
	

	
	
	
	
	
}

?>