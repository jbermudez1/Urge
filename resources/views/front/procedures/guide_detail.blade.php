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
                            <td><b>Descripción</b></td>
                            <td><b>Precio:</b></td>
                            <td><b>Requisitos</b></td>
                            <td><b>Dependencia:</b></td>
                            <!-- <td><b>Realizar Tramite:</b></td> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($guide_town->procedures as $value)
                            @if($value->is_enabled)
                                <tr>
                                    <td>{{ $value->procedure->title }}</td>
                                    <td style="text-transform:lowercase;">{{ $value->procedure->description }}</td>
                                     <td style="min-width: 100px">
                                       
                                   
                                            {{ $value->price }}</td>
                                 
                                    <td>Pendiente</td>
                                    <td> {{ $value->dependency }}</td>
                                   <!--  <td>
                                        @if($value->procedure->type == "town")
                                            Municipal
                                        @elseif( $value->procedure->type == "state" )
                                            Estatal
                                        @elseif( $value->procedure->type == "federal" )
                                            Federal
                                        @endif
                                    </td> -->
                                    <!-- <td><a href="#" target="_blank">Realizar Tramite</a></td> -->
                          
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@stop