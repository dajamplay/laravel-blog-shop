<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UserRepository
{
    const PER_PAGE = 15;
    private Builder $query;

    public function __construct(User $model)
    {
        $this->query = $model->withoutAdmins();
    }

    public function all()
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
