<?php

namespace App\Service;

use App\DTO\CityDTO;
use App\Models\City;
use App\Repository\CityRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class CreateCityService
{
    public function __construct(
        private CityRepository $rCity,
    ) {
    }

    public function run(CityDTO $cityDTO): JsonResponse|City|null
    {
        $validator = $this->getValidator($cityDTO);

        if ($validator->fails()) {
            return response()->json(['Validation Error.', $validator->errors()]);
        }

        return $this->rCity->save($cityDTO);
    }

    private function getValidator(CityDTO $cityDTO)
    {
        $rule = 'required|string|min:2';

        return Validator::make((array) $cityDTO, [
            'name' => $rule,
        ]);
    }
}
