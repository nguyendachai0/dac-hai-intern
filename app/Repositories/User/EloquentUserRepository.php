<?php

namespace App\Repositories\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function getAll()
    {
        return User::all();
    }
    public function getById($userId)
    {
        return User::findOrFail($userId);
    }
    public function create($data)
    {
        $data['password'] = Hash::make($data['password']);
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->save();
        return $user;
    }
}
