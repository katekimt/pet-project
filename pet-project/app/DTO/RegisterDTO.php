<?php

namespace App\DTO;

use Illuminate\Http\Request;

class RegisterDTO
{
    public string $name;

    public string $email;

    public string $password;

    public string $c_password;

    public function __construct(string $name, string $email, string $password, string $c_password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->c_password = $c_password;
    }

    public static function make(Request $request): static
    {
        return new static(
            $request->get('name'),
            $request->get('email'),
            $request->get('password'),
            $request->get('c_password'),
        );
    }
}
