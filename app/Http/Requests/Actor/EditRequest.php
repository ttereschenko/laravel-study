<?php

namespace App\Http\Requests\Actor;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:1', 'max:30'],
            'surname' => ['required', 'min:1', 'max:50'],
            'patronymic' => ['required', 'min:1', 'max:50'],
            'date_of_birth' => ['required', 'date'],
            'growth' => ['required', 'numeric'],
        ];
    }
}
