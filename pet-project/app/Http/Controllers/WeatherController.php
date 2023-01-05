<?php

namespace App\Http\Controllers;

use App\Service\WeatherService;

class WeatherController extends Controller
{
    public function __invoke(string $city, WeatherService $weatherService)
    {
        $data = $weatherService->run(config('app.cities.' . $city));
        var_dump($data);
    }
}
