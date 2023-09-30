<?php

namespace App\Http\Requests\Api;

class StoreEventRequest extends ApiFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:2', 'max:250'],
            'content' => ['required', 'string', 'min:5'],
        ];
    }
}
