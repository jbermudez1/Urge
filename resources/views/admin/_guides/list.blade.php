@extends('admin.list.list')

@section('list-title')
    Guias
@stop

@section('button-create-text')
    Nueva Guia
@stop

@section('list-content')
    @parent

@section('list-content-columns')
    <th class="text-center" style="width: 50px;">#</th>
    <th>Descripcion</th>
    <th>Categoria</th>

    <th class="text-center" style="width: 75px;"><i class="fa fa-flash"></i></th>
@stop

@section('list-content-values')
    @foreach($data as $key => $value)
        <tr>
            <td class="text-center">{{ $key + 1 }}</td>
            <td>{{ $value->description }}</td>
            <td>{{ $value->category_guide->description }}</td>
            
            <td class="text-center">
                <a href="#" data-id="{{ $value->id }}" data-toggle="tooltip" title="Editar" class="btn btn-effect-ripple btn-xs btn-success edit"><i class="fa fa-pencil"></i></a>
                <a href="#" data-id="{{ $value->id }}" data-toggle="tooltip" title="Eliminar" class="btn btn-effect-ripple btn-xs btn-danger delete"><i class="fa fa-times"></i></a>
            </td>
        </tr>
    @endforeach
@stop

@include('admin._guides.create',compact('fields'))

<div id="div-modal"></div>
<script>
    $(function(){
        CRUD.url_base = 'admin/guides';
        Helper.rules = {
            'title':{ required : true },
            'description'  : { required  : true },
            'type'  : { required  : true }
        };
        Helper.messages = {
            'title':{ required : 'Debe ingresar un titulo' },
            'description' : { required : 'Debe ingresar una descripcion' },
            'type' : { required : 'Debe ingresar un tipo' }
        }
        Helper.validate('#form-create');
    })
</script>
{!! Html::script('app/helpers/crud_operate.js') !!}
@stop