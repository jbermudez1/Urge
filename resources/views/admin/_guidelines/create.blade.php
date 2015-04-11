@extends('admin.layout.modal')

@section('modal-title')
    Crear Lineamiento
@stop

@section('modal-id')
    "modal-create"
@stop

@section('modal-body')
    {!! Form::open(['url' => 'admin/guidelines/create','id'=>'form-create','method' => 'POST','class'=>'form-horizontal']) !!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label class="col-md-3 control-label" for="id_town">Municipio:</label>
            <div class="col-md-9">
                {!! Form::select('id_town',[''=>'Eliga un Municipio']  + $towns,null,['class'=>'select-chosen form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label" for="id_guide">Guia:</label>
            <div class="col-md-9">
                {!! Form::select('id_guide',[''=>'Eliga una Guia']  + $guides,null,['class'=>'select-chosen form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label" for="description">Descripcion:</label>
            <div class="col-md-9">
                <textarea name="description" rows="3" class="form-control" placeholder="Description" ></textarea>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tramite</th>
                    <th>Lugar</th>
                    <th>Necesario</th>
                    <th>URL</th>
                </tr>
            </thead>
            <tbody>
                @foreach($procedures as $procedure)
                    <tr>
                        <td>{{ $procedure->title }}</td>
                        <td>
                            @if($procedure->type == "town")
                                Municipio
                            @else
                                Estado
                            @endif
                        </td>
                        <td>
                            <div class="col-sm-9">
                                <label class="switch switch-primary"><input type="checkbox" class="is_enabled"><span></span></label>
                            </div>
                        </td>
                        <td>
                            <input type="text" class="link form-control"/>
                            <input type="hidden" class="id" value="{{ $procedure->id }}"/>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    {!! Form::close() !!}
@stop

@section('modal-footer')
    <button id="btn-save" type="button" class="btn btn-effect-ripple btn-primary">Guardar</button>
    <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Cancelar</button>
@stop

<script>
    $(function(){
        Helper.rules = {
            'id_town':{ required : true },
            'id_guide'  : { required  : true }
        };
        Helper.messages = {
            'id_town':{ required : 'Debe elegir un municipio' },
            'id_guide' : { required : 'Debe elegir una guia' }
        }
        Helper.validate('#form-create');
    })
</script>