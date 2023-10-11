<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Admin\UserRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService
{
    private UserRepository $repository;
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function allWithPaginate() : LengthAwarePaginator
    {
        return $this->repository->allWithPaginate();
    }

    public function store(array $data) : void
    {
        $this->repository->store($data);
    }

    public function update(array $data, User $user) : string
    {
        $this->repository->update($data, $user);

        return __('Пользователь обновлен');
    }
}
