<?php

namespace App\Http\Requests\User;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public mixed $image;

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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','string'],
            'surname' => ['required','string'],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif'],
            'email' => ['required','email'],
            'birthdate' => ['nullable','date'],
            'position' => ['nullable','string'],
            'password' => ['nullable','string']
        ];
    }
}
