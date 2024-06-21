@extends('layouts.main')

@section('title', 'Авторизация')

@section('content')
<h2 class="text-2xl font-bold mb-6 text-center">Авторизация</h2>
<form method="POST" action="{{ route('auth') }}">
    @csrf

    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Имя пользователя</label>
        <input id="name" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm p-2" type="text" name="name" value="{{ old('name') }}" required autofocus>
        @error('name')
        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
        @enderror
    </div>

    <div class="mt-4">
        <label for="password" class="block text-sm font-medium text-gray-700">Пароль</label>
        <input id="password" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm p-2" type="password" name="password" required>
        @error('password')
        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
        @enderror
    </div>

    <div class="flex items-center justify-end mt-4">
        <button class="ml-4 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700">
            Вход
        </button>
    </div>
</form>
@endsection
