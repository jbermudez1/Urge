@extends('front.base.layout')

@section('content')
    <section class="complemento">
        <div class="container">
            <span class="t2 fverde">{{ $notice->title }}</span><br>
            Lugar donde se  origino la noticia.

            <div class="viewNoticias">
                <!-- primera columna de noticia ULTIMA -->
                <div class="">
                    <div class="boxNews">
                        <!-- insertar imagen con estilo -->
                        <div class="imgNewHor" style="background-image:url({{ asset($notice->image) }})"></div>
                        <div class="descNew">
                            <p class="fecha">{{ date('d/m/Y',strtotime($notice->created_at)) }}</p>
                            <p>
                                {{ $notice->description }}
                            </p>
                        </div>
                        <!--                       <div class="verNew">
                                              Links de referencia
                                              </div> -->
                    </div>
                </div>

            </div>

        </div>
    </section>
@stop