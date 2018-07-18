


<?php
			
include_once('conexion.php');

	class Product extends Model{
		public $code;
		public $product;
		//public $description;
		public $price;
		public $imagen;

		public function __construct(){ 
      parent::__construct(); 
    } 
   
   	
		//$cart->add_item(codigo, $_POST['cant']);
		

	

		public function get_products(){ 
      $sql = $this->db->query("SELECT * FROM tbl_productos");  
      $html = '';
      foreach ($sql->fetch_all(MYSQLI_ASSOC) as $key){
        $code = "'".$key['producto_codigo']."'";
        $html .= '<tr>
                    <td>'.$key['producto_codigo'].'</td>
                    <td>'.$key['producto_nombre'].'</td>
                    <td>'.$key['producto_descripcion'].'</td>
                    <td align="right">'.$key['producto_precio'].'</td>
                    <td align="right">
                      <input type="number" id="'.$key['producto_codigo'].'" value="1" min="1">
                    </td>
                    <td>
					<input type="image" src="images/login.jpg" alt="Submit Form" />
					
					
                    </td>
                  </tr>';
      }
      return $html;
	  
	  
   	}

public function getProductobyCodigo($codigo)
{
	
		 $nomCategoria='POLLOS A LA BRASA';
	 
	 	
		$url = 'http://localhost:8092/producto/id/' . $codigo;

		$response = file_get_contents($url);
	
// Decode the response
		$DataProducto = json_decode($response, TRUE);


		$totalReg =  count($DataProducto);
	
		return $DataProducto;
	
}

public function getCategoriabyCodigo($codigo)
{
	
		 $nomCategoria='POLLOS A LA BRASA';
	 
	 	$url = 'http://localhost:8088/api/DetalleProducto/' . $codigo;

		$response = file_get_contents($url);
	
// Decode the response
		$DataProducto = json_decode($response, TRUE);


		$totalReg =  count($DataProducto);
	
		return $DataProducto;
	
}




	public function getDetalleProducto($codigo){ 
	
   // $DataProducto = getProductobyCodigo($codigo)  ;

	$DataProducto = $this->getProductobyCodigo($codigo)  ;
	
	 $nomCategoria='POLLOS A LA BRASA';
	 

	
	$html = '';
	$html.='



<div class="contain">


<div class="left">

    <img src="'.$DataProducto['foto'].'" >
   

</div>




<div class="right" >
<br>

<div >
   <p >'.$DataProducto['nomproducto'].'<br></p>
</div>


<p id="precio" style="font-weight:bold;text-align:left;">S/ ' .$DataProducto['precio'].'</p>

<p >
'.$DataProducto['descriplarga'].'
</p>

<p style="font-weight:bold;">Cantidad<input type="text" name="cantidad" id="cant" style="width:90px;">

</p>


 

    		     <button  id="addProdut" class="boton_personalizado" onClick="addProduct('.$codigo.');">
                        Agregar
                      </button>


					  
					  
</div>';

					  
	return $html	;			  
	}				  
					  
	

 		public function search_code($code){

               $status = 0;
	  
	          $DataProducto = $this-> getProductobyCodigo($code);

			    // IF (count($DataProducto)>0){
						$this->code = $DataProducto['codproducto'];
						$this->product = $DataProducto['nomproducto'];
						$this->price = $DataProducto['precio'];
						$this->imagen =$DataProducto['foto']; 
				 $status=1;
				 
				 //}
    	
    	return $status;
 		}
	}
?>