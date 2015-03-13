<div class="col-sm-6">
    <div class="boxNews">
        <div class="columna">
            <div class="imgNewVer" style="background-image:url({{ $notice->image }})"></div>
        </div>
        <div class="columna">
            <div class="descNew">
                <p class="fecha">{{ date('d/m/Y',strtotime($notice->created_at)) }}</p>
                <p>{{ $notice->title . ' ' . $notice->description }}</p>
            </div>
            <div class="verNew">
                <a href="notices/{{ $notice->id }}">Leer</a>
            </div>
        </div>
    </div>
</div>
