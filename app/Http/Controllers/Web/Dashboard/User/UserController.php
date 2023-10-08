<?php

namespace App\Http\Controllers\Web\Dashboard\User;

use App\Http\Requests\Web\Dashboard\StoreUserRequest;
use App\Http\Requests\Web\Dashboard\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends BaseUserController
{
    public function index() : View
    {
        $users = $this->repository->all();

        //$users = UsersIndexResource::collection($users);

        return view('dashboard.users.index', compact('users'));
    }

    public function create() : View
    {
        return view('dashboard.users.create');
    }

    public function store(StoreUserRequest $request) : RedirectResponse
    {
        $this->repository->store($request->validated());

        return redirect(route('dashboard.users.index'));
    }

    public function show(User $user) : View
    {
        return view('dashboard.users.show', compact('user'));
    }

    public function edit(User $user) : View
    {
        return view('dashboard.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user) : RedirectResponse
    {
        $this->repository->update($request->validated(), $user);

        return redirect(route('dashboard.users.show', $user));
    }

    public function destroy(User $user)
    {
        //
    }
}
