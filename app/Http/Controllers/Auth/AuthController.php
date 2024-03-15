<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    /**
     * user registration
     * @param RegisterRequest $request
     * @return mixed
     */
    public function register(RegisterRequest $request): mixed
    {
        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password_confirmation),
            'role_id'   => $request->role_id
        ]);

        return $user->createToken('API Token')->plainTextToken;

    }

    /**
     * @throws ValidationException
     */
    public function login(LoginRequest $request): mixed
    {
        $user = User::where( 'email', request( 'email' ) )->first();

        if ( ! $user || ! Hash::check( request( 'password' ), $user->password ) ) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken( $request->device_name )->plainTextToken;

    }

}
