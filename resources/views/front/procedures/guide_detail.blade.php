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
                            <td><b>Tipo</b></td>
                            <td><b>Precio:</b></td>
                            <td><b>Dirección:</b></td>
                            <td><b>Realizar Tramite:</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($guide_town->procedures as $value)
                            @if($value->is_enabled)
                                <tr>
                                    <td>{{ $value->procedure->title }}</td>
                                    <td>{{ $value->procedure->description }}</td>
                                    <td>
                                        @if($value->procedure->type == "tow")
                                            Municipal
                                        @elseif( $value->procedure->type == "state" )
                                            Estatal
                                        @elseif( $value->procedure->type == "fede" )
                                            Federal
                                        @endif
                                    </td>
                                     <td>
                                        @if($value->price === null)
                                            Pendiente
                                        @else
                                            {{ $value->price }}</td>
                                        @endif
                                    <td>Pendiente</td>
                                    <td><a href="#" target="_blank">Realizar Tramite</a></td>
                          
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@stop