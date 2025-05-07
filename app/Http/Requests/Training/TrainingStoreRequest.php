<?php

namespace App\Http\Requests\Training;

use App\Training\TrainingLevel;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TrainingStoreRequest extends FormRequest
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
            'name' => ['bail', 'required', 'string', 'min:3', 'max:255'],
            'description' => ['bail', 'string', 'max:255'],
            'level' =>['bail', 'string', Rule::in(array_map(fn($level) => $level->value, TrainingLevel::cases())),],
        ];

    }

    public function messages(): array
    {
        return [
            'name.required' => 'O name é obrigatório',
            'name.string' => 'O name deve ser uma string',
            'name.min' => 'O name não pode ser menor que 3',
            'name.max' => 'O name não pode ser maior que 255',
            'description.string' => 'A description deve ser uma string',
            'description.max' => 'A description não pode ser maior que 255',
            'level.string' => 'O level deve ser uma string',
            'level.in' => 'O level deve ser um dos seguintes: ' . implode(', ', array_map(fn($level) => $level->value, TrainingLevel::cases())) .'',
        ];
    }
}
