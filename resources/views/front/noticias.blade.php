@extends('front.base.layout')

    @section('content')
    <section class="contenidoInterno">
        <div class="container">
            <h1>Ultimas Noticias.-</h1>
        </div>
    </section>
    <section class="complemento">
        <div class="container">
            <span class="t2 fverde">Sinaloa, Competimos en el Mundo</span>

            <div class="viewNoticias">
                <?php $count = 1; ?>
                @foreach($notices as $key => $notice)
                    @if($key%5==0)
                        @if($key>0)
                            </div>
                        @endif
                        <div class="row">
                        @include('front.notices.big',compact('notice'))
                    @else
                        @include('front.notices.small',compact('notice','count'))
                        <?php $count = ($count==1) ? 2 : 1; ?>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@stop
