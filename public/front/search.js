$(function () {
    $(".filtro1").click(function(){
        $(".buscador").fadeOut();
        $("#filtroUno").fadeOut(function(){
            $("#filtroDos").fadeIn();
        });
    });

    $("#filtroDos > select").change(function(){
        $("#filtroDos").fadeOut( function(){
            $("#filtroTres").fadeIn();
        });
    })
});