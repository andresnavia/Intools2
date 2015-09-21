function mostrar(){
	$.post("views/user/consultar.php", function(data){ 
		$("#contenido").html(data) 
	});
}

$(document).ready(function(){
	mostrar();
});