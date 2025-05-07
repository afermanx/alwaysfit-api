<?php

namespace App\Http\Requests\NutritionPlan;

use Illuminate\Foundation\Http\FormRequest;

class NutritionPlanIndexRequest extends FormRequest
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
        'perPage' => ['bail', 'numeric', 'min:10', 'max:100'],
        ];
    }
    public function messages(): array
    {
        return [
            'perPage.numeric' => 'O perPage deve ser um número',
            'perPage.min' => 'O perPage não pode ser menor que 10',
            'perPage.max' => 'O perPage não pode ser maior que 100',
        ];
    }
}
