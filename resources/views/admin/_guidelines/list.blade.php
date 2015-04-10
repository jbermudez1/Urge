@extends('admin.list.list')

@section('list-title')
    Lineamientos para Guias
@stop

@section('buttons')
    <a id="btn-new" href="#" class="btn btn-effect-ripple btn-important" >Nuevo Lineamiento</a>
@stop

@section('list-content')
    @parent

@section('list-content-columns')
    <th class="text-center" style="width: 50px;">#</th>
    <th>Municipio</th>
    <th>Guia</th>
    <th>Description</th>
    <th class="text-center" style="width: 75px;"><i class="fa fa-flash"></i></th>
@stop

@section('list-content-values')
    @foreach($data as $key => $value)
        <tr>
            <td class="text-center">{{ $key + 1 }}</td>
            <td>{{ $value->town->description }}</td>
            <td>{{ $value->guide->description }}</td>
            <td>{{ $value->description }}</td>
            <td class="text-center">
                <a href="#" data-id="{{ $value->id }}" data-toggle="tooltip" title="Detalle" class="btn btn-effect-ripple btn-xs btn-info detail"><i class="fa fa-list"></i></a>
            </td>
        </tr>
    @endforeach
@stop

<div id="div-modal"></div>
@stop

{!! Html::script('app/admin/guidelines.js') !!}