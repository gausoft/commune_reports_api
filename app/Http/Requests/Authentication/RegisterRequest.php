<?php

namespace App\Http\Requests\Authentication;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema()
 */
class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * 
     * @OA\Property(property="username", type="string", example="John Doe")
     * @OA\Property(property="email", type="string", example="johndoe@gmail.com")
     * @OA\Property(property="password", type="string", example="password")
     * @OA\Property(property="password_confirmation", type="string", example="password")
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
            'username' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed',
        ];
    }
}
