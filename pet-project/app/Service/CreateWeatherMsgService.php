<?php

namespace App\Service;

use App\Jobs\WeatherMailJob;
use Illuminate\Http\JsonResponse;

class CreateWeatherMsgService
{
    public function run(array $data, string $city): JsonResponse
    {
        $email = auth()->user()->email;
        WeatherMailJob::dispatch($email, $data, $city);

        return new JsonResponse(
            [
                'success' => true,
                'message' => 'Weekly weather forecast according to your request',
            ], 200
        );
    }
}
