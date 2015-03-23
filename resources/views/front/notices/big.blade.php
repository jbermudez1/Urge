<div class="col-xs-12 col-sm-5 ">
    <div class="boxNews firsNew">
        <!-- insertar imagen con estilo -->
        <div class="imgNewHor" style="background-image:url({{ $notice->image  }})"></div>
        <div class="descNew">
            <p class="fecha">{{ date('d/m/Y',strtotime($notice->created_at)) }}</p>
            <p><b>{{ $notice->title }}</b></p>
            <div class="txtNew hidden-xs">
               <!--  {!! $notice->description !!} -->
               Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
               tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
               quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
               consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
               cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
               proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
        </div>
        <div class="verNew">
            <a href="noticia/{{ $notice->id }}">Leer</a>
        </div>
    </div>
</div>