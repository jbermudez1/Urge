@extends('admin.layout.modal')

@section('modal-title')
    Detalle de Lineamiento
@stop

@section('modal-id')
    "modal-detail"
@stop

@section('modal-body')
   <div class="well">
        <h4 class="text-center">Informacion</h4>
       <span><strong>Municipio:</strong> {{ $data->town->description }}</span> <br/>
       <span><strong>Guia:</strong> {{ $data->guide->description }}</span> <br/>
       <span><strong>Descripcion:</strong> {{ $data->description }}</span>
       <br/>
   </div>
   <table class="table table-bordered table-detail">
       <thead>
       <tr>
           <th>Tramite</th>
           <th>Descripcion</th>
           <th>Lugar</th>
           <th>URL</th>
       </tr>
       </thead>
       <tbody>
       @foreach($data->procedures as $value)
           @if($value->is_enabled)
               <tr>
                   <th>{{ $value->procedure->title }}</th>
                   <th>{{ $value->procedure->description }}</th>
                   <th>
                       @if($value->procedure->type == "town")
                           Municipio
                       @else
                           Estado
                       @endif
                   </th>
                   <th>
                       <a href="{{ $value->url }}" target="_blank">{{ $value->url }}</a>
                   </th>
               </tr>
           @endif
       @endforeach
       </tbody>
   </table>
@stop

@section('modal-footer')
    <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Cancelar</button>
@stop

<script>
    App.initDT('.table-detail');
</script>