@extends('front.base.layout')

@section('content')
    <section class="contenidoInterno">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <p class="">Encuentra rapidamente el trámite que buscas.</p>
                    <article id="filtroUno" class="iconos">
                        <div class="row text-center">
                            <div class="col-xs-6 primerIcono">
                                <img src="img/icon1.png">
                                <p>Soy emprendedor</p>
                            </div>
                            <div class="col-xs-6">
                                <img id="empresario" src="img/icon2.png">
                                <p>Soy Empresario</p>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-sm-6 hidden-xs">
                    <article class="redes">
                        <a hreft=""><i class="fa fa-facebook fa-2x"></i></a>
                        <a href="#"><i class="fa fa-twitter fa-2x"></i></a>
                    </article>
                </div>

            </div>
        </div>

    </section>
    <section class="complemento">
        <div class="container">
            <span class="t2 fverde">Ultimas noticias.- </span>Enterate como tener mayor provecho del instituto.

            <div class="viewNoticias">
                <?php $contador = 1; ?>
                @foreach($notices as $key => $notice)
                    @if($key%5==0)
                        @if($key>0)
                            </div>
                        @endif
                        <div class="row">
                        @include('front.notices.big',compact('notice'))
                    @else
                        @if($contador==1)
                            <div class="col-xs-12 col-sm-7">
                                <div class="row">
                                    @include('front.notices.small',compact('notice'))
                                    <?php $contador = 2; ?>
                        @else
                            @include('front.notices.small',compact('notice'))
                            <?php $contador = 1; ?>
                        @endif

                        @if(($key+1)==count($notices) || $contador==1)
                            </div> </div>
                            @endif
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@stop