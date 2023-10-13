<?php

namespace App\DTO;

use App\Http\Requests\Web\Admin\StoreUserRequest;
use Carbon\Carbon;

class UserStoreDto
{
    public function __construct(
        public readonly string $first_name,
        public readonly string $last_name,
        public readonly string $email,
        public readonly string $password,
        public readonly ?Carbon $birthday,
    ) {}

    public static function fromRequest(StoreUserRequest $request): UserStoreDto
    {
        return new self(
            $request->input('first_name'),
            $request->input('last_name'),
            $request->input('email'),
            $request->input('password'),
            $request->input('birthday'),
        );
    }
}
