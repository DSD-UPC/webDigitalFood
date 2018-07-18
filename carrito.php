<?php
	class Cart extends Product{ 
	    public $cart = array();
	    public function __construct(){ 
	    	parent::__construct(); 
	    	if(isset($_SESSION['cart'])){
	    		$this->cart = $_SESSION['cart'];
	    	}
	    }

	    public function add_item($code, $amount){
			$search = $this->search_code($code);
					
			
			if($search > 0){
				$code = $this->code;
				$product = $this->product; 
				$price = $this->price;
				$imagen = $this->imagen;
				$item = array(
					'code' => $code,
					'product' => $product,
					'price' => $price,
					'amount' => $amount,
					'imagen' => $imagen
				);
				if(!empty($this->cart)){
					foreach ($this->cart as $key){
						if($key['code'] == $code){
							$item['amount'] = $key['amount'] + $item['amount'];
						}
					}
				}
				$item['subtotal'] = $item['price'] * $item['amount'];
				$id = md5($code);
				$_SESSION['cart'][$id] = $item;
				$this->update_cart();
			}
		}

		public function remove_item($code){
			$id = md5($code);
			unset($_SESSION['cart'][$id]);
			$this->update_cart();
			return true;
		}

	    public function get_items(){
	    	$html = '';
	    	if(!empty($this->cart)){
	    		foreach ($this->cart as $key){
	    			$code = "'".$key['code']."'";
					$html .= '<tr>
								<td>'.$key['code'].'</td>
								<td>'.$key['product'].'</td>
								<td align="right">'.number_format($key['price'], 2).'</td>
								<td align="right">'.$key['amount'].'</td>
								<td align="right">'.number_format($key['subtotal'], 2).'</td>
								<td>
									<button onClick="deleteProduct('.$code.');">
				                    	Eliminar
				                    </button>
								</td>	
							  </tr>';
				}
	    	}
	    	return $html;
	    }
		
		
		
		
		
		
			    public function get_items_carrito(){
	    	$html = '<table >
			         <tr class="header"><td></td><td>Nombre Producto</td><td>Precio</td>
					                    <td>Cantidad</td><td>Total</td><td></td>
					</tr>';
	    	if(!empty($this->cart)){
	    		foreach ($this->cart as $key){
	    			$code = "'".$key['code']."'";
					$html .= '						  
							  
  <tr>
	<td>
		<img src="'.$key['imagen'].'">
	</td>
	<td>
		'.$key['product'].'
	</td>
	<td class="celda_right" >'
		.number_format($key['price'], 2).'
	</td >
	<td class="celda_right">'
	    .$key['amount'].'
		</td>
	<td class="celda_right">'
		.number_format($key['subtotal'], 2).'
	</td>
	<td class="celda_right"> 
	   <a href="#" onClick="javascript:deleteProduct('.$code.');">
		   <img src="images/delete.jpg" class="img_delete" >	 
		</a>
		
		
		
				                    	
				                    
	
	</td>
</tr>';							  
				}
	    	}
			else
			{
				
				$html .= '<tr><td colspan ="6" ><p style="text-align=center;"> <center>No existen datos por mostrar</center></p></td></tr>';
			}
			
			$html .= '</table>"';
			
			
			
			if(!empty($this->cart)){
			
			$html .='<button  id="addProdut" class="boton_personalizado" onClick="LoadPedido();">
                        Guardar Pedido     </button>';
			}
	    	return $html;
	    }


		
		
		
		
		

	    public function get_total_items(){
	    	$total = 0;
	    	if(!empty($this->cart)){
	    		foreach ($this->cart as $key){
					$total += $key['amount'];
				}
	    	}
	    	return $total;
	    }

	    public function get_total_payment(){
	    	$total = 0;
	    	if(!empty($this->cart)){
	    		foreach ($this->cart as $key){
					$total += $key['subtotal'];
				}
	    	}
	    	return number_format($total, 2);
	    }

		public function update_cart(){
			self::__construct();
		}
	}
?>