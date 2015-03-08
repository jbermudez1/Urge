$(document).on( "ready", inicio );

function inicio (){

}

$("#empresario").click(esEmpresario);

function esEmpresario(){
	var f4 = $("#filtroDos");
	$("#filtroUno").append(f4);
}