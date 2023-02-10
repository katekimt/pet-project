<?php

namespace App\Repository;

use App\DTO\CityDTO;
use App\Http\Requests\UpdateCityRequest;
use App\Models\City;
use Illuminate\Database\Eloquent\Collection;

class CityRepository
{
    public function __construct(
        private City $city,
    ) {
    }

    public function getAll(): Collection
    {
        return $this->city->all();
    }

    public function save(CityDTO $cityDTO): ?City
    {
        return $this->city->create([
            'name' => $cityDTO->name,
            'latitude' => $cityDTO->latitude,
            'longitude' => $cityDTO->longitude,
        ]);
    }

    public function getByName(string $nameOfCity): ?City
    {
        return $this->city->where('name', $nameOfCity)->first();
    }

    public function update(City $updatedCity, UpdateCityRequest $request): City
    {
        $updatedCity->update($request->validated());

        return $updatedCity;
    }

    public function delete(City $deletedCity): void
    {
        $deletedCity->delete();
    }
}
