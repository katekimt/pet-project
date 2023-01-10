<?php

namespace App\Http\Controllers;

use App\DTO\CityDTO;
use App\Http\Requests\CreateCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Http\Resources\CityResource;
use App\Models\City;
use App\Repository\CityRepository;
use App\Service\CreateCityService;
use App\Service\DeleteCityService;
use App\Service\UpdateCityService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CityController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(City::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @param CityRepository $rCity
     * @return AnonymousResourceCollection
     */
    public function index(CityRepository $rCity): AnonymousResourceCollection
    {
        return CityResource::collection($rCity->getAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateCityRequest $request
     * @param CreateCityService $createCityService
     * @return CityResource
     */
    public function store(
        CreateCityRequest $request,
        CreateCityService $createCityService
    ): CityResource
    {
        $createCityDTO = $createCityService->run(CityDTO::make($request->validated()));
        return new CityResource($createCityDTO);
    }

    /**
     * Display the specified resource.
     *
     * @param string $city
     * @param CityRepository $rCity
     * @return AnonymousResourceCollection
     */
    public function show(string $city, CityRepository $rCity): AnonymousResourceCollection
    {
        return CityResource::collection($rCity->getByName($city));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCityRequest $request
     * @param string $city
     * @param UpdateCityService $updateCityService
     * @return CityResource
     */
    public function update(
        UpdateCityRequest $request,
        string $city,
        UpdateCityService $updateCityService
    ): CityResource
    {
        $updateCity = $updateCityService->run($request, $city);
        return new CityResource($updateCity);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $city
     * @param DeleteCityService $deleteCityService
     * @return JsonResponse
     */
    public function destroy(string $city, DeleteCityService $deleteCityService): JsonResponse
    {
        $deleteCityService->run($city);
        return response()->json(null, 204);

    }
}
