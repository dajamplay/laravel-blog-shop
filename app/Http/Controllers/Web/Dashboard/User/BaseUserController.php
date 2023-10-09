<?php

namespace App\Http\Controllers\Web\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\UserRepository;

abstract class BaseUserController extends Controller
{
    protected UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
}
