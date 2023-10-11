<?php

namespace App\Http\Controllers\Web\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\StoreUserRequest;
use App\Http\Requests\Web\Admin\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(UserService $service) : View
    {
        return view('admin.users.index', [
            'users' => $service->allWithPaginate()
        ]);
    }

    public function create() : View
    {
        return view('admin.users.create');
    }

    public function store(
        StoreUserRequest $request,
        UserService $service
    ) : RedirectResponse
    {
        $service->store($request->validated());

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

    public function update(
        UpdateUserRequest $request,
        User $user,
        UserService $service
    ) : RedirectResponse
    {
        $message = $service->update($request->validated(), $user);

        return redirect(route('admin.users.show', $user))
            ->with('message', $message);
    }

    public function destroy(User $user)
    {
        //
    }
}
