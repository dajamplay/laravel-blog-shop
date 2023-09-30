<?php

namespace App\Http\Controllers\Api\V1;

use App\Exceptions\GeneralJsonException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginUserRequest;
use App\Http\Requests\Api\RegisterUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginUserRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw new GeneralJsonException( __('Неправильный логин или пароль.'),403);
        }

        $response = [
            "result" => $user->createToken($request->email)->plainTextToken,
            "error" => null
        ];

        return response($response,202);
    }

    public function register(RegisterUserRequest $request)
    {
        $user = User::store(
            $request["email"],
            $request["password"],
            $request["first_name"],
            $request["last_name"],
            $request["birthday"]
        );

        $response = [
            "result" => $user->createToken($request['email'])->plainTextToken,
            "error" =>null
        ];

        return response($response, 202);
    }

    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();

        $response = [
            "result" => __('Выход выполнен успешно.'),
            "error" => null
        ];

        return response($response, 202);
    }
}
