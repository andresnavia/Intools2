function ModalVerUsuarios(id_tabla,fila){
	var tabla=document.getElementById(id_tabla);
	var tabla_fila=tabla.rows[fila].getElementsByTagName('td');
	document.getElementById("id_nombre").value=tabla_fila[2].innerHTML.toLowerCase();
}