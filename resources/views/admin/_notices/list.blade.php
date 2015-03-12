@extends('admin.list.list')

@section('list-title')
    Noticias
@stop

@section('list-content')
    @parent

@section('list-content-columns')
    <th class="text-center" style="width: 50px;">#</th>
    <th>Titulo</th>
    <th>Descripcion</th>
    <th>Tags</th>
    <th>Usuario</th>
    <th class="text-center" style="width: 75px;"><i class="fa fa-flash"></i></th>
@stop

@section('list-content-values')
    @foreach($data as $key => $value)
        <tr>
            <td class="text-center">{{ $key + 1 }}</td>
            <td>{{ $value->title }}</td>
            <td>{{ $value->description }}</td>
            <td>
                @foreach($value->tags_data as $tag)
                    <span class="label label-info">{{ $tag }}</span>
                @endforeach
            </td>
            <td>
                {{ $value->user->full_name }}
            </td>
            <td class="text-center">
                <a href="#" data-id="{{ $value->id }}" data-toggle="tooltip" title="Editar" class="btn btn-effect-ripple btn-xs btn-success edit"><i class="fa fa-pencil"></i></a>
                <a href="#" data-id="{{ $value->id }}" data-toggle="tooltip" title="Eliminar" class="btn btn-effect-ripple btn-xs btn-danger delete"><i class="fa fa-times"></i></a>
            </td>
        </tr>
    @endforeach
@stop

@include('admin._notices.create',compact('fields'))

<div id="div-modal"></div>
<script>
    $(function(){
        CRUD.url_base = 'admin/notices';
        Helper.rules = {
            'title':{
                required : true
            },
            'description'  : {
                required  : true
            }
        };
        Helper.messages = {
            'title':{
                required: 'Debe ingresar un titulo'
            },
            'description' : {
                'required' : 'Debe ingresar una descipcion'
            }
        }
        Helper.validate('#form-create');
        $('#form-create input[type=file]').on('change',CRUD.uploadImage);
    })
</script>
{!! Html::script('app/helpers/crud_operate.js') !!}
@stop