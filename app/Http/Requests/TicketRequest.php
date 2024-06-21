<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'description' => 'required|string|max:2000',
            'importance' => 'required|string|max:100',
            'problem_theme' => 'required|string|max:100',
            'photo' => 'file|mimes:jpg,jpeg,png|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'description.required' => 'Описание проблемы обязательно',
            'description.max' => 'Описание должно быть менее 2000 символов',
            'importance.required' => 'Важность проблемы обязательна',
            'importance.max' => 'Важность проблемы должна быть менее 100 символов',
            'problem_theme.required' => 'Тип проблемы обязательна',
            'problem_theme.max' => 'Тип проблемы должна быть менее 100 символов',
            'photo.mimes' => 'Расширение файла должно быть: jpg, jpeg, png',
            'photo.max' => 'Максимальный размер файла 2048 Кб'
        ];
    }
}
