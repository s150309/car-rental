@extends('layouts.master')

@section('content')

    <h1>Samochody <a href="{{ url('cars/create') }}" class="btn btn-primary pull-right btn-sm">Dodaj nowy samochód</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Numer</th><th>Nazwa</th><th>Segment</th><th>Cena Dzień</th><th>Akcje</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($cars as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('cars', $item->id) }}">{{ $item->nazwa }}</a></td><td>{{ $item->segment }}</td><td>{{ $item->cena_dzien }} zł.</td>
                    <td>
                        <a href="{{ url('cars/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Uaktualnij</button>
                        </a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['cars', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Usuń', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $cars->render() !!} </div>
    </div>

@endsection
