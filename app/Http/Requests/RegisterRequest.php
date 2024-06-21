<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'email' => 'required|email|max:255|unique:users'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Имя пользователя обязательно',
            'name.max' => 'Имя пользователя должно быть не более :max символов',
            'name.unique' => 'Имя пользователя должно быть уникально',
            'password.required' => 'Пароль обязателен',
            'password.min' => 'Пароль должен быть не менее :min симовлов',
            'password.confirmed' => 'Пароли не совпадают',
            'email.required' => 'E-mail обязателен',
            'email.max' => 'E-mail должен быть не более :max символов',
            'email.unique' => 'E-mail должен быть уникальными'
        ];
    }
}
