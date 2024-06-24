@extends('layouts.main')

@section('title', 'Проблема')

@section('content')
<h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Форма подачи проблемы</h2>
<form action="{{ route('createTicket') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
        <label for="problem_theme" class="block text-sm font-medium text-gray-700">Тема проблемы</label>
        <select name="problem_theme" id="problem_theme" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm p-2 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <option value="product">Вопросы по продуктам и услугам</option>
            <option value="recovery">Возвраты и обмены</option>
            <option value="complaint">Жалобы и претензии</option>
            <option value="more_info">Запросы на дополнительную информацию</option>
            <option value="tech_support">Техническая поддержка для клиентов</option>
        </select>
        @error('problem_theme')
        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="description" class="block text-sm font-medium text-gray-700">Описание проблемы</label>
        <textarea name="description" id="description" class="block mt-1 w-full border-gray-300 resize-none rounded-md shadow-sm p-2 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('description') }}</textarea>
        @error('description')
        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="photo" class="block text-sm font-medium text-gray-700">Фотоотчёт (Необязательно)</label>
        <input type="file" name="photo" id="photo" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm p-2 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
        @error('photo')
        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="importance" class="block text-sm font-medium text-gray-700">Важность</label>
        <select name="importance" id="importance" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm p-2 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            <option value="low">Низкая</option>
            <option value="normal">Средняя</option>
            <option value="high">Высокая</option>
        </select>
        @error('importance')
        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
        @enderror
    </div>

    <div class="flex justify-center">
        <span>{{ $success ?? null }}</span>
    </div>

    <div class="flex items-center justify-end mt-4">
        <button type="submit" class="ml-4 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700">
            Отправить
        </button>
    </div>
</form>
@endsection
