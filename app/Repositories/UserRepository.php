<?php

namespace App\Repositories;

use App\Http\Filters\UserFilter;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    const PER_PAGE = 10;

    public function allWithPaginate(UserFilter $filter): LengthAwarePaginator
    {
        return $this->startConditions()
            ->query()
            ->filter($filter)
            ->paginate(self::PER_PAGE);
    }

    public function update(mixed $attributes, User $user): bool
    {
        return $user->update($attributes);
    }

    public function store(array $data): User
    {
        return $this->startConditions()
            ->create($data);
    }

    protected function getModelClass(): string
    {
        return User::class;
    }
}
