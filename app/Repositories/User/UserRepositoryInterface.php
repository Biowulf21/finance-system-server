<?php

namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function login($data);
    public function createUser($data);
}
