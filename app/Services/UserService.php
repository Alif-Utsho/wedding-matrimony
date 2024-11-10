<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService
{

    public function createUser(array $data): User
    {
        $slug = Str::slug($data['name']);
        $userExist = User::where('slug', $slug)->count();
        if ($userExist) {
            $slug .= '-' . ($userExist + 1);
        }

        return User::create([
            'name' => $data['name'],
            'slug' => $slug,
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
