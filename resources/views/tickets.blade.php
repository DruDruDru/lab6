@extends('layouts.main')

@section('title', 'Тикеты')

@php
use App\Models\User;
@endphp

@section('content')
@foreach($tickets as $ticket)
    <div class="flex flex-col gap-2 shadow-lg border-2 p-2 rounded-xl m-2">
        <div class="flex flex-col gap-1">
            <div class="flex justify-between">
                <span>{{ $ticket->problem }}</span>
                @if($ticket->status === 'new')
                    <span>Новый!</span>
                @endif
            </div>
            <span class="text-auto break-all">Проблема: {{ $ticket->description }}</span>
            <div class="flex items-center gap-2">
                <div class="flex flex-col gap-1">
                    <span>Уровень важности: {{ $ticket->importance }}</span>
                    <span>Пользователь: {{ User::where('id', $ticket->user)->first()->email }}</span>
                </div>
                <a href="{{ route('showAnswerForm', ["ticketId" => $ticket->id]) }}" class="ml-4 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700">Ответить</a>
            </div>
        </div>
        @if($ticket->photo)
            <img src="storage/{{ $ticket->photo }}" alt="photo" class="rounded-xl" />
        @endif
        <form action="{{route('updateStatus')}}" method="post" class="flex justify-center gap-2">
            @csrf
            <input type="hidden" value="{{ $ticket->id }}" name="ticketId" />
            <label for="{{'status' . '_id' . $ticket->id}}"></label>
            <select name="status" id="{{'status' . '_id' . $ticket->id}}" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm p-2 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="new"
                        @if($ticket->status==='new')
                            selected
                        @endif
                >Новый</option>
                <option value="in_process"
                        @if($ticket->status==='in_process')
                            selected
                       @endif
                >На рассмотрении</option>
                <option value="done"
                        @if($ticket->status==='done')
                            selected
                       @endif
                >Решен</option>
            </select>
            <input type="submit" value="Сохранить" class="ml-4 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700" />
        </form>
    </div>
@endforeach
<div class="absolute right-16 top-28 z-10 shadow-lg p-5">
    <form action="" method="get" class="flex flex-col gap-2 items-center justify-center">
        @csrf
        <h2 class="text-xl font-bold text-center">Фильтрация</h2>
        <label for="filter">По статусу:</label>
        <select name="filter" id="filter" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm p-2 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <option value="">Все</option>
            <option value="new">Новый</option>
            <option value="in_process">На рассмотрении</option>
            <option value="done">Решенный</option>
        </select>
        <input type="submit" value="Отфильровать" class="ml-4 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700" />
    </form>
</div>
@endsection
