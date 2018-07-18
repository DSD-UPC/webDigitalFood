
		
  



  function addProduct(code){
	var amount = document.getElementById("cant").value;
	window.location.href = 'detalleProducto.php?action=add&code='+code+'&amount='+amount;
}

function deleteProduct(code){
	window.location.href = 'carritoPedido.php?action=remove&code='+code;
}


  function EntrarCantegoria(){
	

  
  var nromesa = document.getElementById("nromesa").value;
  window.location.href = 'listado.php?nromesa='+ nromesa;
	
}



  function LoadPedido(){
	

  
  
  window.location.href = 'carritoPedido.php?action=guardar';
	
}