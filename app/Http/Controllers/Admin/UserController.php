<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

final class UserController extends Controller
{

//    public function __construct()
//    {
//        $this->authorize('before');
//    }

    /**
     * @throws BindingResolutionException
     */
    public function index(UserService $service, Request $request): View
    {
        return view('admin.users.index', [
            'users' => $service->allWithPaginate(
                $request->query->all()
            )
        ]);
    }

    public function create(): View
    {
        return view('admin.users.create');
    }

    public function store(
        StoreUserRequest $request,
        UserService      $service
    ): RedirectResponse
    {
        $service->store($request->validated());

        return redirect(route('admin.users.index'))
            ->with('message', trans('custom.user.created'));
    }

    public function show(User $user): View
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user): View
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(
        UpdateUserRequest $request,
        User              $user,
        UserService       $service
    ): RedirectResponse
    {
        $service->update($request->validated(), $user);

        return redirect(route('admin.users.show', $user))
            ->with('message', trans('custom.user.updated'));
    }

    public function destroy(User $user)
    {
        // TODO user service
    }
}
