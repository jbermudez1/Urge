$(document).on( "ready", inicio );

function inicio (){

	$(".verMenu").click( function(){
		$(".menulateral").toggleClass("ocultaMenu");
	});
}


$("#empresario").click(esEmpresario);

function esEmpresario(){
	var f4 = $("#filtroDos");
	$("#filtroUno").append(f4);
}

function vermenu (){
	alert("ok2")

	// $(".verMenu").click( function(){
	// 	$(".menulateral").toggleClass("ocultaMenu");
	// });
}