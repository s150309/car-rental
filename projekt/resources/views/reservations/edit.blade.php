@extends('layouts.master')

@section('content')

    <h1>Edit Reservation</h1>
    <hr/>

    {!! Form::model($reservation, [
        'method' => 'PATCH',
        'url' => ['reservations', $reservation->id],
        'class' => 'form-horizontal'
    ]) !!}

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
            <div class="form-group {{ $errors->has('moment_rezerwacji') ? 'has-error' : ''}}">
                {!! Form::label('moment_rezerwacji', 'Moment Rezerwacji: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::input('datetime-local', 'moment_rezerwacji', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('moment_rezerwacji', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('wypozyczono') ? 'has-error' : ''}}">
                {!! Form::label('wypozyczono', 'Wypozyczono: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                                <div class="checkbox">
                <label>{!! Form::radio('wypozyczono', '1') !!} Yes</label>
            </div>
            <div class="checkbox">
                <label>{!! Form::radio('wypozyczono', '0', true) !!} No</label>
            </div>
                    {!! $errors->first('wypozyczono', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('samochod_id') ? 'has-error' : ''}}">
                {!! Form::label('samochod_id', 'Samochod Id: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('samochod_id', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('samochod_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('do_zaplaty_lacznie') ? 'has-error' : ''}}">
                {!! Form::label('do_zaplaty_lacznie', 'Do Zaplaty Lacznie: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('do_zaplaty_lacznie', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('do_zaplaty_lacznie', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
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