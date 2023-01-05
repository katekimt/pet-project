<?php

namespace App\Http\Controllers;

use App\Mail\WeatherMail;
use App\Service\CreateWeatherMsgService;
use App\Service\WeatherService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

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
