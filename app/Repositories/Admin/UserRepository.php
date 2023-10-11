<?php

namespace App\Repositories\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository
{
    const PER_PAGE = 10;

    private Builder $query;

    public function __construct(User $model)
    {
        $this->query = $model->withoutAdmins();
    }

    public function all() : LengthAwarePaginator
    {
        return $this->query->paginate(self::PER_PAGE);
    }

    public function update(mixed $attributes, User $user) : bool
    {
        return $user->update($attributes);
    }

    public function store(array $data) : User
    {
        return $this->query->create($data);
    }
}
