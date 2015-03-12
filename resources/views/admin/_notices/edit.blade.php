@extends('admin.layout.modal')

@section('modal-title')
    Editar Noticia
@stop

@section('modal-id')
    "modal-edit"
@stop

@section('modal-body')
    {!! Form::open(['route' => ['admin.notices.update', $data->id],'id'=>'form-edit','method' => 'PUT','class'=>'form-horizontal']) !!}
    {!! $fields !!}
    {!! Form::close() !!}
@stop

@section('modal-footer')
    <button id="btn-edit" type="button" class="btn btn-effect-ripple btn-primary">Guardar</button>
    <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Cancelar</button>
@stop
<script>
    $(function(){Helper.validate('#form-edit'); $('#form-edit input[type=file]').on('change',CRUD.uploadImage);})
</script>