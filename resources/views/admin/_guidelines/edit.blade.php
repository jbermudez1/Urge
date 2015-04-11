@extends('admin.layout.modal')

@section('modal-title')
    Editar Lineamiento
@stop

@section('modal-id')
    "modal-edit"
@stop

@section('modal-body')
    {!! Form::open(['url' => 'admin/guidelines/edit/' . $data->id,'id'=>'form-edit','method' => 'POST','class'=>'form-horizontal']) !!}
    <div class="well">
        <h4 class="text-center">Informacion</h4>
        <span><strong>Municipio:</strong> {{ $data->town->description }}</span> <br/>
        <span><strong>Guia:</strong> {{ $data->guide->description }}</span> <br/>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label" for="description">Descripcion:</label>
        <div class="col-md-9">
            <textarea name="description" rows="3" class="form-control" placeholder="Description" >{{ $data->description }}</textarea>
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
            @foreach($data->procedures as $value)
                <tr>
                    <td>{{ $value->procedure->title }}</td>
                    <td>
                        @if($value->procedure->type == "town")
                            Municipio
                        @else
                            Estado
                        @endif
                    </td>
                    <td>
                        <div class="col-sm-9">
                            <label class="switch switch-primary"><input type="checkbox" class="is_enabled" @if($value->is_enabled) {{"checked"}} @endif><span></span></label>
                        </div>
                    </td>
                    <td>
                        <input type="text" class="link form-control" value="{{ $value->url }}"/>
                        <input type="hidden" class="id" value="{{ $value->procedure->id }}"/>
                        <input type="hidden" class="id_detail" value="{{ $value->id }}"/>
                    </td>
                </tr>
            @endforeach
            @foreach($procedures_new as $procedure)
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
                            <label class="switch switch-primary"><input type="checkbox" class="is_enabled" ><span></span></label>
                        </div>
                    </td>
                    <td>
                        <input type="text" class="link form-control" value=""/>
                        <input type="hidden" class="id" value="{{ $procedure->id }}"/>
                        <input type="hidden" class="id_detail" value="0"/>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! Form::close() !!}
@stop

@section('modal-footer')
    <button id="btn-edit" type="button" class="btn btn-effect-ripple btn-primary">Guardar</button>
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
        Helper.validate('#form-edit');
    })
</script>