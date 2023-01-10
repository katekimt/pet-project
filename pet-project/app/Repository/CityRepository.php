<?php

namespace App\Repository;

use App\DTO\CreateCityDTO;
use App\Models\City;
use Illuminate\Database\Eloquent\Collection;

class CityRepository
{

    public function __construct(
        private City $city,
    )
    {
    }

    public function getAll(): Collection
    {
        return $this->city->all();
    }

    public function save(CreateCityDTO $cityDTO): ?City
    {
        return $this->city->create([
            'name' => $cityDTO->name,
            'latitude' => $cityDTO->latitude,
            'longitude' => $cityDTO->longitude,
        ]);
    }


}
