<?php

namespace App\Service;

use App\Http\Requests\UpdateCityRequest;
use App\Repository\CityRepository;
use Validator;
use App\Models\City;
use Illuminate\Http\JsonResponse;


class UpdateCityService
{
    public function __construct(
        private CityRepository $rCity,
    ){
    }

    public function run(UpdateCityRequest $request, string $city): JsonResponse|City
    {
        $validator = $this->getValidator($request);

        if($validator->fails()){
            return response()->json(['Validation Error.', $validator->errors()]);
        }
        $updatedCity = $this->rCity->getByName($city);
        return $this->rCity->update($updatedCity, $request);
    }

    private function getValidator(UpdateCityRequest $request)
    {
        $rule = 'nullable|string|min:2';

        return Validator::make((array)$request, [
            'name' => $rule,
        ]);
    }
}
