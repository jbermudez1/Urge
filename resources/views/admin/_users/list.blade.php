@extends('admin.list.list')

@section('list-title')
    Usuarios
@stop

@section('button-create-text')
    Nuevo Usuario
@stop

@section('list-content')
    @parent

@section('list-content-columns')
    <th class="text-center" style="width: 50px;">#</th>
    <th>Email</th>
    <th>Tipo</th>
    <th>Nombre</th>
    <th>Apellido</th>
    <th class="text-center" style="width: 75px;"><i class="fa fa-flash"></i></th>
@stop

@section('list-content-values')
    @foreach($data as $key => $value)
        <tr>
            <td class="text-center">{{ $key + 1 }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->type }}</td>
            <td>{{ $value->first_name }}</td>
            <td>{{ $value->last_name }}</td>
            <td class="text-center">
                <a href="#" data-id="{{ $value->id }}" data-toggle="tooltip" title="Editar" class="btn btn-effect-ripple btn-xs btn-success edit"><i class="fa fa-pencil"></i></a>
                <a href="#" data-id="{{ $value->id }}" data-toggle="tooltip" title="Eliminar" class="btn btn-effect-ripple btn-xs btn-danger delete"><i class="fa fa-times"></i></a>
            </td>
        </tr>
    @endforeach
@stop

@include('admin._users.create',compact('fields'))

<div id="div-modal"></div>
<script>
    $(function(){
        CRUD.url_base = 'admin/users';
        Helper.rules = {
            'first_name':{ required : true },
            'last_name'  : { required  : true },
            'password'  : { required  : true },
            'email' : {
                required: true,
                email: true
            }
        };
        Helper.messages = {
            'first_name':{ required : 'Debe ingresar un nombre' },
            'last_name' : { required : 'Debe ingresar un apellido' },
            'password' : { required : 'Debe ingresar una contraseña' },
            'email': {
                required: 'Debe ingresar un email',
                email: 'Debe ingresar un email valido'
            }
        }
        Helper.validate('#form-create');
    })
</script>
{!! Html::script('app/helpers/crud_operate.js') !!}
@stop