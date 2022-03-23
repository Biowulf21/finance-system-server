<?php

namespace App\Repositories\User;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

use App\Repositories\User\UserRepositoryInterface;
use App\Exceptions\UserNotFoundException;

class UserRepository implements UserRepositoryInterface
{
    private function authenticateUser($data)
    {
        if (!Auth::attempt($data)) {
            throw new UserNotFoundException();
        }
    }

    private function createToken($tokenType)
    {
        if ($tokenType === 'accessToken') {
            return Auth::user()->createToken('authToken')->accessToken;
        }
    }

    public function login($data)
    {
        try {
            $this->authenticateUser($data);
            $accessToken = $this->createToken('accessToken');

            return response()->json([
                'user' => Auth::user(),
                'accessToken' => $accessToken
            ]);
        } catch (UserNotFoundException $e) {
            $content = 'User credentials mismatch';
            return response($content, 401);
        }
    }

    private function saveUser($data)
    {
        $user = new User;

        $user->name = $data["name"];
        $user->username = $data["username"];
        $user->password = Hash::make($data["password"]);

        $user->save();
    }

    public function createUser($data)
    {
        try {
            $this->saveUser($data);
        } catch (QueryException $e) {
            return $e->getMessage();
            $content = 'Email already exist';
            return response($content, 406);
        }
    }
}
