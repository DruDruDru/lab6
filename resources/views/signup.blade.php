@extends('layouts.main')

@section('title', 'Регистрация')

@section('content')
<h2 class="text-2xl font-bold mb-6 text-center">Регистрация</h2>
<form method="POST" action="{{ route('createUser') }}">
    @csrf

    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Имя пользователя</label>
        <input id="name" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm p-2" type="text" name="name" value="{{ old('name') }}" required autofocus>
        @error('name')
        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
        @enderror
    </div>

    <div class="mt-4">
        <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
        <input id="email" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm p-2" type="email" name="email" value="{{ old('email') }}" required>
        @error('email')
        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
        @enderror
    </div>

    <div class="mt-4">
        <label for="password" class="block text-sm font-medium text-gray-700">Пароль</label>
        <input id="password" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm p-2" type="password" name="password" required value="{{ old('password') }}">
        @error('password')
        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
        @enderror
    </div>

    <div class="mt-4">
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Подтвердите пароль</label>
        <input id="password_confirmation" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm p-2" type="password" name="password_confirmation" required>
        @error('password_confirmation')
        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
        @enderror
    </div>

    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('showAuthForm') }}">
            Уже есть аккаунт?
        </a>
        <button class="ml-4 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700">
            Зарегистрироваться
        </button>
    </div>
</form>
@endsection
