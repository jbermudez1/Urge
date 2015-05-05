@extends('front.base.layout')

@section('content')
    <section class="contenidoInterno">
        <div class="container">
            <h4>Trámites en problemas.-</h4>
        </div>
    </section>
    <section class="complemento">
        <div class="container">
           <!--  <span class="t2 fverde">URGE.- </span>Unidad Rápida de Gestión Empresarial. -->
            <article class="accesos">
                <p>Te ayudamos a resolver tu situación.</p>
            </article>
            <article class="noticias">
                <div class="row">
                    <div class="col-sm-6">
                        <form class="formulario">
                            <input class="form-control" type="text" placeholder="Nombre">
                            <input class="form-control" type="text" placeholder="Telefóno">
                            <input class="form-control" type="text" placeholder="Email">
                            <input class="form-control" type="text" placeholder="Dependencia">
                            <textarea class="form-control" rows="3" placeholder="Descripción"></textarea>
                            <button type="button" class="btn btn-success">Envíar</button>


                        </form>
                    </div>
                </div>

            </article>
        </div>
    </section>
@stop