<?php

namespace App\Actions\Auth;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Auth\Events\Registered;

class RegisterUserAction
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(array $data, string $guard): User
    {
        $user = $this->userRepository->store($data);

        event(new Registered($user));

        auth($guard)->login($user);

        return $user;
    }
}
