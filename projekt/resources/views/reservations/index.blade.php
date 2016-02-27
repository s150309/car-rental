@extends('layouts.master')

@section('content')

    <h1>Reservations <a href="{{ url('reservations/create') }}" class="btn btn-primary pull-right btn-sm">Add New Reservation</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>Imie</th><th>Nazwisko</th><th>Email</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($reservations as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('reservations', $item->id) }}">{{ $item->imie }}</a></td><td>{{ $item->nazwisko }}</td><td>{{ $item->email }}</td>
                    <td>
                        <a href="{{ url('reservations/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['reservations', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $reservations->render() !!} </div>
    </div>

@endsection
