<?php

namespace App\Http\Requests\Api;

class RegisterUserRequest extends ApiFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'max:100', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            "birthday" => ['nullable', 'string', 'date'] // 2021-10-09/09-10-2021 12:30:00
        ];
    }
}
