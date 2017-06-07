@extends('front.base.layout')

@section('content')
    <section class="contenido">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <article class="mensaje">
                        <span class="t2">EN SINALOA, HAY</span><br>
                        <span class="t1">FACILIDAD PARA HACER NEGOCIOS</span><br><br>
                        <p class="t2">Encuentra rapidamente el trámite que buscas, por sector, rubro, o tamaño de tu empresa.</p>
<!--                         <article class="redes visible-xs">
                            <a hreft=""><i class="fa fa-facebook fa-2x"></i></a>
                            <a href="#"><i class="fa fa-twitter fa-2x"></i></a>
                        </article> -->
                    </article>
                    <article id="" class="filtros">
                        {!! Form::open(['url' => 'guias','method' => 'POST']) !!}
                            <div id="filtroUno" class="">
                                <div class="row text-center">
                                    <div class="col-xs-6 primerIcono">
                                        <img class="filtro1" src="img/icon1.png">
                                        <p>Soy emprendedor</p>
                                    </div>
                                    <div class="col-xs-6">
                                        <img class="filtro1" src="img/icon2.png">
                                        <p>Soy Empresario</p>
                                    </div>
                                </div>
                            </div>

                            <div id="filtroDos">
                                <p>Selecciona tu <b>municipio.</b></p>
                                {!! Form::select('idtown',array(''=>'Municipio') + $towns,null,['class'=>'selects']) !!}
<!--                                 <button type="button" class="btn btn-primary"><i class="fa fa-arrow-circle-right fa-3x"></i></button>
 -->                                <i class="fa fa-arrow-circle-right fa-3x btn"></i>
                            </div>
                            <div id="filtroTres">
                                <p>Selecciona tu <b>Rubro.</b></p>
                                {!! Form::select('idcategoryguide',array(''=>'Selecciona un rubro') + $categoryguides,null,['class'=>'selects']) !!}
                                <button type="submit" class="btn-next"><i class="fa fa-arrow-circle-right fa-3x btn"></i></button>
                            </div>
                        {!! Form::close() !!}
                    </article>
                    <article class="busqueda">
                        <div class="buscador">
                                
                                    {!! Form::open(['url' => 'guias','method' => 'POST','role'=>'form']) !!}
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-9">
                                                <input type="text" class="form-control" name="search" placeholder="Eje. Permiso de construcción en Culiacán" required="required">
                                            </div>
                                            <div class="col-xs-12 col-sm-3">
                                                <button type="submit" class="btn btn-encontrar">Encontrar</button>
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                            
                        </div>
                    </article>
                </div>
                <div class="col-sm-6 hidden-xs">
                    <article class="redes">
                        <a hreft=""><i class="fa fa-facebook fa-2x"></i></a>
                        <!-- <a href="#"><i class="fa fa-twitter fa-2x"></i></a> -->
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="complemento">
        <div class="container">
            <span class="t2 fverde">Más información.- </span>Enterate como tener mayor provecho del instituto.
            <article class="accesos">
                <div class="row boxes">
                    <!--  -->
                    <div class="col-xs-12 col-sm-4">
                        <div class="box">
                            <!-- div class="boxHeader bglila"></div> -->
                            <div class="boxContainer boxFirst"></div>
                            <div class="firsBoxContainer">
                               El INADEM te ayuda a crear, crecer y consolidar tu empresa.
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="col-xs-6 col-sm-2">
                        <div class="box">
                            <div class="boxHeader bgverde"></div>
                            <div class="boxContainer">
                                <p class="tituloNoticia">Vinculación</p>
                                <img class="img-responsive" src="img/n1.jpg">

                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="col-xs-6 col-sm-2">
                        <div class="box">
                            <div class="boxHeader bgnaranja"></div>
                            <div class="boxContainer">
                                <p class="tituloNoticia">Guía de <br>tramites</p>
                                <img class="img-responsive" src="img/n2.jpg">
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="col-xs-6 col-sm-2">
                        <div class="box">
                            <div class="boxHeader bglila"></div>
                            <div class="boxContainer">
                                <a href="img/fondo_compite.png" target="_blank">
                                    <p class="tituloNoticia">Financiamiento</p>
                                    <img class="img-responsive" src="img/n3.jpg">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="col-xs-6 col-sm-2">
                        <div class="box">
                            <div class="boxHeader bgazul"></div>
                            <div class="boxContainer">
                                <a href="/formulario">
                                    <p class="tituloNoticia">Trámites en problemas</p>
                                    <img class="img-responsive" src="img/n4.jpg">
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </article>
            <article class="noticias">
                <p class="verNoticias text-center">
                    <a href="/noticias">Ver noticias</a>
                </p>
            </article>
        </div>
    </section>
@stop

@section('other-scripts')
    {!! Html::script('front/search.js') !!}
@stop
    