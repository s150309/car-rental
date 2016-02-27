@extends('layouts.master')

@section('content')



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
                        <a href="{{ url('reservations/create/' . $item->id . '') }}">
                            <button type="submit" class="btn btn-success btn-xs">Zarezerwuj</button>
                        </a> 
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $cars->render() !!} </div>
    </div>





@endsection