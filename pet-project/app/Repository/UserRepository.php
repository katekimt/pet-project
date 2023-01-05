<?php

namespace App\Repository;

use App\DTO\RegisterDTO;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function __construct(
        private User $user
    ){

    }
    public function save(RegisterDTO $registerDTO): ?User
    {
        return $this->user->create([
            'name' => $registerDTO->name,
            'email' => $registerDTO->email,
            'password' => Hash::make($registerDTO->password),
        ]);
    }
}
