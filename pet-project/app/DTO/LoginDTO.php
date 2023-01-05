<?php

namespace App\DTO;

use Illuminate\Http\Request;

class LoginDTO
{
    public string $email;

    public string $password;

    public function __construct(string $email, string $password){
        $this->email = $email;
        $this->password = $password;
    }

    public static function make(Request $request): static
    {
        return new static(
            $request->get('email'),
            $request->get('password'),
        );
    }
}
