<?php

namespace App\Service;

use App\Jobs\WeatherMailJob;
use App\Mail\WeatherMail;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

class CreateWeatherMsgService
{

    public function run(array $data, string $city): JsonResponse
    {
        $email = auth()->user()->email;
        WeatherMailJob::dispatch($email, $data, $city);
        return new JsonResponse(
            [
                'success' => true,
                'message' => "Weekly weather forecast according to your request"
            ], 200
        );

    }
}
