<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'name' => ['requires', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8'],
            'cpf' => ['required', 'string', 'min:11', 'max:11', 'unique:users']
        ];
    }


    public function attributes(): array
    {
        return [
            'name' => 'nome',
            'email' => 'email',
            'password' => 'senha',
            'password_confirmation' => 'confirmação de senha',
            'cpf' => 'CPF'
        ];
    }

/*************  ✨ Windsurf Command ⭐  *************/
/*******  ddf954de-2860-471b-97b1-365a6766f9fc  *******/
    public function messages(): array
    {
        return [
            'name.required' => 'O campo :attribute é obrigatório.',
            'email.required' => 'O campo :attribute é obrigatório.',
            'password.required' => 'O campo :attribute é obrigatório.',
            'password_confirmation.required' => 'O campo :attribute é obrigatório.',
            'cpf.required' => 'O campo :attribute é obrigatório.'
        ];
    }
}
