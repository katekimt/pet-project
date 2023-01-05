<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\JsonResponse;

class WeatherService
{

    public function run($coordinates): array|string
    {
        $response = Http::get('https://api.open-meteo.com/v1/forecast?latitude='.
            $coordinates['lat'] . '&longitude=' . $coordinates['lng'] .
            '&daily=temperature_2m_max,temperature_2m_min&timezone=UTC');
        if ($response->successful()) {
            return $response->json('daily');
        }
        return 'No such city in database';
    }

}
