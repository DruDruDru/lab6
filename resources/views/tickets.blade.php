@extends('layouts.main')

@section('title', 'Тикеты')

@section('content')
@foreach($tickets as $ticket)
    <div>
        <p>{{ $ticket->description }}</p>
    </div>
@endforeach
@endsection
