<div class="col-xs-12 col-sm-5 ">
    <div class="boxNews firsNew">
        <!-- insertar imagen con estilo -->
        <div class="imgNewHor" style="background-image:url({{ $notice->image  }})"></div>
        <div class="descNew">
            <p class="fecha">{{ date('d/m/Y',strtotime($notice->created_at)) }}</p>
            <p><b>{{ $notice->title }}</b></p>
            {!! $notice->description !!}
        </div>
        <div class="verNew">
            <a href="noticia/{{ $notice->id }}">Leer</a>
        </div>
    </div>
</div>