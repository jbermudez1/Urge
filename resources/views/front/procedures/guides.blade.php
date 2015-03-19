@extends('front.base.layout')

@section('content')
    <section class="complemento">
        <div class="container">
            <span class="t2 fverde">Selecciona tu actividad:</span>
            <br>
            <br>
            <div class="listadoTramites">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td><b>Guia Empresarial</b></td>
                            <td><b>Municipio</b></td>
                            <td><b>Rubro:</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($guides as $value)
                            <tr>
                                <td><a href="guias/{{ $value->id }}">{{ $value->guide  }}</a></td>
                                <td>{{ $value->town }}</td>
                                <td>{{ $value->category }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@stop