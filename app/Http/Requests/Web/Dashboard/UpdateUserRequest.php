<?php

namespace App\Http\Requests\Web\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
//            'email' => ['required', 'string', 'max:100', 'email', 'unique:users,email'],
            "birthday" => ['nullable', 'string', 'date']
        ];
    }
}
