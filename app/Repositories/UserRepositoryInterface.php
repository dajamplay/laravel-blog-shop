<?php

namespace App\Repositories;

use App\Http\Filters\UserFilter;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface
{
    public function allWithPaginate(UserFilter $filter): LengthAwarePaginator;

    public function update(mixed $attributes, User $user): bool;

    public function store(array $data): User;
}
