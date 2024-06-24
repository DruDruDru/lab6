@extends('layouts.main')

@section('title', 'Уведомления')

@section('content')
    @foreach($tickets as $ticket)
        <div class="flex flex-col gap-2 shadow-lg border-2 p-2 rounded-xl m-2">
            <div class="flex flex-col gap-1">
                <div class="flex justify-between">
                    <span>{{ $ticket->problem }}</span>
                </div>
                <span class="text-auto break-all">Проблема: {{ $ticket->description }}</span>
                <div class="flex items-center gap-2">
                    <div class="flex flex-col gap-1">
                        <span>Уровень важности: {{ $ticket->importance }}</span>
                    </div>
                </div>
            </div>
            @if($ticket->photo)
                <img src="../storage/{{ $ticket->photo }}" alt="photo" class="rounded-xl" />
            @endif
            <div class="flex flex-col gap-2">
                <span>Статус: {{$ticket->status}}</span>
                @if($ticket->answer)
                    <span>Ответ: {{$ticket->answer}}</span>
                @else
                    <span>Ответа нет</span>
                @endif
            </div>
        </div>
    @endforeach
@endsection
