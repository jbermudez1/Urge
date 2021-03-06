@extends('admin.layout.modal')

@section('modal-title')
    Eliminar Noticia
@stop

@section('modal-id')
    "modal-delete"
@stop

@section('modal-body')
    {!! Form::open(['route' => ['admin.notices.destroy', $data->id],'id'=>'form-delete','method' => 'DELETE','class'=>'form-horizontal']) !!}
    ¿ Desea eliminar el registro ?
    {!! Form::close() !!}
@stop

@section('modal-footer')
    <button id="btn-delete" type="button" class="btn btn-effect-ripple btn-primary">Si</button>
    <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Cancelar</button>
@stop