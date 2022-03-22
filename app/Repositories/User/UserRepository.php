<?php

namespace App\Repositories\User;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
            return response('Unauthenticated', 401)->json([
                "message" => $e->message
            ]);
        }
    }
}
