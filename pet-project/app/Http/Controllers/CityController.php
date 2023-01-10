<?php

namespace App\Http\Controllers;

use App\DTO\CreateCityDTO;
use App\Http\Requests\CityRequest;
use App\Http\Resources\CityResource;
use App\Repository\CityRepository;
use App\Service\CreateCityService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class CityController extends Controller
{
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
     * @param Request $request
     * @param CreateCityService $createCityService
     * @return CityResource
     */
    public function store(
        Request           $request,
        CreateCityService $createCityService
    ): CityResource
    {
        $cityDTO = $createCityService->run(CreateCityDTO::make($request));
        return new CityResource($cityDTO);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
