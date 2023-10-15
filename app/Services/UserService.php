<?php

namespace App\Services;

use App\Http\Filters\UserFilter;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService
{
    private UserRepositoryInterface $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function allWithPaginate(array $data = []): LengthAwarePaginator
    {
        $filter = app()->make(UserFilter::class, ['queryParams' => array_filter($data)]);

        return $this->repository->allWithPaginate($filter);
    }

    public function store(array $data): void
    {
        $this->repository->store($data);
    }

    public function update(array $data, User $user): bool
    {
        return $this->repository->update($data, $user);
    }
}
