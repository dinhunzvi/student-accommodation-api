<?php

namespace App\Http\Requests;

use App\Models\Role;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => [ 'required', 'confirmed', Password::defaults() ],
            'password_confirmation' => 'required',
            'role_id'   => [ 'required', Rule::in(Role::ROLE_PROPERTY_OWNER, Role::ROLE_STUDENT) ],
        ];

    }

    /**
     * validation error messages
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'name.required'         => 'Enter your name',
            'name.string'           => 'Name must be a string',
            'name.max'              => 'Name must have a maximum of 255 characters',
            'email.required'        => 'Enter your email address',
            'email.email'           => 'Enter a valid email address',
            'email.unique'          => 'Email address already exists',
            'password.required'     => 'Please enter your password',
            'password.confirmed'    => 'Confirm your password',
            'password_confirmation.required' => 'Confirm your password',
            'role_id.required'     => 'Select your role',
            'role_id.in'            => 'Role must be Property Owner or Student'
        ];

    }

}
