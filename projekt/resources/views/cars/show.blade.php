@extends('layouts.master')

@section('content')

    <h1>Samochód</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Nazwa</th><th>Segment</th><th>Cena Dzień</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $car->id }}</td> <td> {{ $car->nazwa }} </td><td> {{ $car->segment }} </td><td> {{ $car->cena_dzien }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection