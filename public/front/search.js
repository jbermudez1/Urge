$(function () {
    var $iconos = $('.filtro1'),
        $buscador = $('.buscador'),
        $filtro1 = $('#filtroUno'),
        $filtro2 = $('#filtroDos'),
        $filtro3 = $('#filtroTres');


    $iconos.click(function(){
        $buscador.fadeOut();
        $filtro1.fadeOut(function(){
            $filtro2.fadeIn();
        });
    });

    $filtro2.find('.btn').click(function(){
        $filtro2.fadeOut( function(){
            $filtro3.fadeIn();
        });
    })
});