
		
  



  function addProduct(code){
	var amount = document.getElementById("cant").value;
	window.location.href = 'detalleProducto.php?action=add&code='+code+'&amount='+amount;
}

function deleteProduct(code){
	window.location.href = 'carritoPedido.php?action=remove&code='+code;
}