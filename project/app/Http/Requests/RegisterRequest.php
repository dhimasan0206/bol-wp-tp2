<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            "email" => ["bail", "required", "email", "unique:users", "max:255"],
            "name" => ["bail", "required", "max:255"],
            "password" => ["bail", "required", Password::min(10)->mixedCase()->letters()->numbers()->symbols(), "confirmed", "max:255"],
            "password_confirmation" => ["bail", "required", Password::min(10)->mixedCase()->letters()->numbers()->symbols(), "same:password", "max:255"],
        ];
    }
}
