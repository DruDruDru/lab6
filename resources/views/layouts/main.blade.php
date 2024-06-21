<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Тикет сервис')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 m-0 p-0">
<div class="bg-gray-800 text-white py-4 fixed left-0 top-0 w-full z-1000">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
        <h2 class="text-2xl font-bold">Ticket Service</h2>
        <nav class="flex items-center">
            @if(Auth::check() && Auth::user()->role === 'admin')
                <a href="{{ route('tickets') }}" class="px-3 py-2 rounded-md text-sm font-medium hover:underline cursor-pointer m-0">Тикеты</a>
            @endif
            @auth
                <a href="{{ route('showTicketForm') }}" class="px-3 py-2 rounded-md text-sm font-medium hover:underline cursor-pointer m-0">Написать тикет</a>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <input type="submit" value="Выйти ({{ Auth::user()->email }})" class="px-3 py-2 rounded-md text-sm font-medium border-0 bg-transparent hover:underline cursor-pointer m-0">
                </form>
            @else
                <a href="{{ route('showAuthForm') }}" class="px-3 py-2 rounded-md text-sm font-medium hover:underline">Авторизация</a>
                <a href="{{ route('showSignupForm') }}" class="px-3 py-2 rounded-md text-sm font-medium hover:underline">Регистрация</a>
            @endauth
        </nav>
    </div>
</div>

<div class="flex flex-col items-center justify-center mt-52">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
        @yield('content')
    </div>
</div>
</body>
</html>
