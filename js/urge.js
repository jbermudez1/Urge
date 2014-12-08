$(document).on( "ready", inicio );

function inicio (){
	console.log("carhandop");
	$( "nav" ).load( "menu.html" );
	$("#filtroDos").hide();
}

$("#empresario").click(esEmpresario);

function esEmpresario(){
	var f4 = $("#filtroDos");
	$("#filtroUno").append(f4);
}