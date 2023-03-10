<?php

namespace App\Service;

use App\Repository\CityRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class WeatherService
{
    public function __construct(
        public CityRepository $rCity,
    ) {
    }

    public function run(string $city): array|string
    {
        $city = $this->rCity->getByName($city);

        return Cache::remember('city'.$city, 60 * 5, function () use ($city) {
            $response = Http::get('https://api.open-meteo.com/v1/forecast?latitude='.
                $city->latitude.'&longitude='.$city->longitude.
                '&daily=temperature_2m_max,temperature_2m_min&timezone=UTC');
            if ($response->successful()) {
                return $response->json('daily');
            }

            return 'No such city in database';
        });
    }
}
