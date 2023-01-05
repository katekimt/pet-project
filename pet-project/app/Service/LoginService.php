<?php

namespace App\Service;

use App\DTO\LoginDTO;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    public function run(LoginDTO $loginDTO): string
    {
        if (Auth::attempt(['email' => $loginDTO->email, 'password' => $loginDTO->password])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            return $success['token'];
        } else {
            return 'Unauthorised.';
        }
    }

}
