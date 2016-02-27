@extends('layouts.master')

@section('content')

    <h1>Dodaj nowy samochód</h1>
    <hr/>

    {!! Form::open(['url' => 'cars', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('nazwa') ? 'has-error' : ''}}">
                {!! Form::label('nazwa', 'Nazwa: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('nazwa', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('nazwa', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('segment') ? 'has-error' : ''}}">
                {!! Form::label('segment', 'Segment: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('segment', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('segment', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('cena_dzien') ? 'has-error' : ''}}">
                {!! Form::label('cena_dzien', 'Cena Dzien: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('cena_dzien', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('cena_dzien', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Dodaj', ['class' => 'btn btn-primary form-control']) !!}
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