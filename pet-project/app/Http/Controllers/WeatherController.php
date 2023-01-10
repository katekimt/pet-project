<?php

namespace App\Http\Controllers;

use App\Service\CreateWeatherMsgService;
use App\Service\WeatherService;

class WeatherController extends Controller
{
    public function __invoke(
        string $city,
        WeatherService $weatherService,
        CreateWeatherMsgService $createWeatherMsgService)
    {
        $data = $weatherService->run(config('app.cities.' . $city));
        $createWeatherMsgService->run($data, $city);

    }
}
