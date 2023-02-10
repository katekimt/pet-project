<?php

namespace App\Service;

use App\Repository\CityRepository;

class DeleteCityService
{
    public function __construct(
        private CityRepository $rCity,
    ) {
    }

    public function run($city): void
    {
        $deletedCity = $this->rCity->getByName($city);
        $this->rCity->delete($deletedCity);
    }
}
