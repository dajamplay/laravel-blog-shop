<?php

namespace App\Http\Controllers\Web\Dashboard\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserUserController extends BaseUserController
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

    public function store(Request $request)
    {
        //
    }

    public function show(User $user) : View
    {

        return view('dashboard.users.show');
    }

    public function edit(string $id) : View
    {
        return view('dashboard.users.edit');
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
