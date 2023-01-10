<?php

namespace App\DTO;

use Illuminate\Http\Request;

class CityDTO
{
    public string $name;

    public string $latitude;

    public string $longitude;

    public function __construct(string $name, string $latitude, string $longitude){
        $this->name = $name;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public static function make(array $validatedRequest): static
    {
        return new static(
            $validatedRequest['name'],
            $validatedRequest['latitude'],
            $validatedRequest['longitude'],
        );
    }
}
