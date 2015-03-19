@extends('front.base.layout')

@section('content')
    <section class="complemento">
        <div class="container">
            <span class="t2 fverde">Estos son los tramites que tienes que realizar para: </span>

            <span><b>{{ $guide_town->guide->description }}</b></span>
            <span>en <b>{{ $guide_town->town->description }}</b></span>
            <br> <br>

            <div class="listadoTramites">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td><b>Trámite</b></td>
                            <td><b>Descripcion</b></td>
                            <td><b>Lugar</b></td>
                            <td><b>Realizar Tramite:</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($guide_town->procedures as $value)
                            {{--{{ dd($value) }}--}}
                            <tr>
                                <td>{{ $value->procedure->title }}</td>
                                <td>{{ $value->procedure->description }}</td>
                                <td>
                                    @if($value->procedure->type == "town")
                                        Municipio
                                    @else
                                        Estado
                                    @endif
                                </td>
                                <td><a href="#">Realizar Tramite</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@stop