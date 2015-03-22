@if($count==1)
    <div class="col-xs-12 col-sm-7">
        <div class="row">
@endif

<div class="col-sm-6">
    <div class="boxNews">
        <div class="columna">
            <div class="imgNewVer" style="background-image:url({{ $notice->image }})"></div>
        </div>
        <div class="columna">
            <div class="descNew">
                <p class="fecha">{{ date('d/m/Y',strtotime($notice->created_at)) }}</p>
                <p>{{ $notice->title }}</p>
                {!! $notice->description !!}
            </div>
            <div class="verNew">
                <a href="noticia/{{ $notice->id }}">Leer</a>
            </div>
        </div>
    </div>
</div>

@if($count==2)
        </div>
    </div>
@endif