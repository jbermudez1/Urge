@extends('front.base.layout')

@section('content')
 <section class="contenidoInterno">
        <div class="container">
            <h4>Contacto.-</h4>
        </div>
    </section>
    <div class="container">
        <br>  <br>
        <div class="row">
            <div class="col col-md-6 col-md-offset-3"   >
                <div class="panel-off panel-default-off">
                    <div class="panel-body-off">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Wooops!</strong> Hubo algunos problemas con los datos.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {!! Form::open(['url' => 'send', 'method' => 'POST']) !!}
                        <div class="form-group">
                            {!! Form::label('email', 'E-Mail') !!}
                            {!! Form::email('email', null, ['class' => 'form-control' ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('asunto', 'Asunto') !!}
                            {!! Form::text('asunto', null, ['class' => 'form-control' ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('mensaje', 'Mensaje') !!}
                            {!! Form::textarea('mensaje', null, ['class' => 'form-control' ,'rows' => '4']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Enviar', ['class' => 'btn btn-success     ' ] ) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

