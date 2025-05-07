<?php

namespace App\Http\Requests\NutritionPlan;

use Illuminate\Foundation\Http\FormRequest;

class NutritionPlanStoreRequest extends FormRequest
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
           'title' => ['required','string','min:3','max:255'],
           'description'=> ['required','string','max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'O campo título é obrigatório',
            'description.required' => 'Description is required',
            'description.max' => 'Description must be less than 255 characters',
        ];
    }
}
