<?php

namespace App\Http\Requests\NutritionPlan;

use Illuminate\Foundation\Http\FormRequest;

class NutritionUpdateRequest extends FormRequest
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
           'name' => ['sometimes','string','min:3','max:255'],
           'description'=> ['sometimes','string','max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.min' => 'O campo Nome deve ter no mínimo 3 caracteres',

            'description.max' => 'Description must be less than 255 characters',
        ];
    }
}
