<?php

namespace App\DTO;

use Illuminate\Http\Request;

class CreateCityDTO
{
    public string $name;

    public string $latitude;

    public string $longitude;

    public function __construct(string $name, string $latitude, string $longitude){
        $this->name = $name;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public static function make(Request $request): static
    {
        return new static(
            $request->get('name'),
            $request->get('latitude'),
            $request->get('longitude'),
        );
    }
}
