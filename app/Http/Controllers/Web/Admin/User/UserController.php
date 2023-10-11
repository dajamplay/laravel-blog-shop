<?php

namespace App\Http\Controllers\Web\Admin\User;

use App\Http\Requests\Web\Admin\StoreUserRequest;
use App\Http\Requests\Web\Admin\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends BaseUserController
{
    public function index() : View
    {
        $users = $this->repository->all();

        //$users = UsersIndexResource::collection($users);

        return view('admin.users.index', compact('users'));
    }

    public function create() : View
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request) : RedirectResponse
    {
        $this->repository->store($request->validated());

        return redirect(route('admin.users.index'));
    }

    public function show(User $user) : View
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user) : View
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user) : RedirectResponse
    {
        $this->repository->update($request->validated(), $user);

        return redirect(route('admin.users.show', $user))
            ->with('status', __('Пользователь обновлен'));;
    }

    public function destroy(User $user)
    {
        //
    }
}
