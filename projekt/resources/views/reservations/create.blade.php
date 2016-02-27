@extends('layouts.master')

@section('content')

    <h1>Formularz składania rezerwacji</h1>
    <hr/>

    {!! Form::open(['url' => 'reservations/execute', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('imie') ? 'has-error' : ''}}">
                {!! Form::label('imie', 'Imie: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('imie', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('imie', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('nazwisko') ? 'has-error' : ''}}">
                {!! Form::label('nazwisko', 'Nazwisko: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('nazwisko', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('nazwisko', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                {!! Form::label('email', 'Email: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('data_od') ? 'has-error' : ''}}">
                {!! Form::label('data_od', 'Data Od: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('data_od', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('data_od', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('data_do') ? 'has-error' : ''}}">
                {!! Form::label('data_do', 'Data Do: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('data_do', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('data_do', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
    
    {{ Form::hidden('car_id', $id, array()) }}

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Zarezerwuj', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection