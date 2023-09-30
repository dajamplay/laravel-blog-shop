<?php

namespace App\Http\Requests\Api;

class LoginUserRequest extends ApiFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'max:100', 'email'],
            'password' => ['required', 'string', 'min:3'],
        ];
    }
}
