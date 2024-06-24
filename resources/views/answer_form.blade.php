@extends('layouts.main')

@section('title', 'Ответ')

@section('content')
<h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Форма ответа</h2>
<form action="{{ route('doAnswer', ["ticketId" => (string)$ticket->id]) }}" method="post">
    @csrf
    <div class="mb-4">
        <label for="answer" class="block text-sm font-medium text-gray-700">Ответ:</label>
        <textarea name="answer" id="answer" class="block mt-1 w-full h-52 border-gray-700 border-2 resize-none rounded-md shadow-sm p-2 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ $ticket->answer ?? old('answer') }}</textarea>
        @error('answer')
        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
        @enderror
    </div>

    <div class="flex items-center justify-end mt-4">
        <a href="{{route('tickets')}}" class="ml-4 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700">⭠</a>
        <button type="submit" class="ml-4 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700">
            Ответить
        </button>
    </div>
</form>
@endsection
