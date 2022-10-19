<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCityRequest;
use App\Http\Resources\CityResource;
use App\interfaces\CityRepositoryInterface;
use Illuminate\Http\Request;

class CityController extends Controller
{
    private CityRepositoryInterface $cityRepository ;

    public function __construct(CityRepositoryInterface $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cities = $this->cityRepository->getAllCities($request->query('name'), $request->query('name_mm'));
        return CityResource::collection($cities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCityRequest $request)
    {
        $city = $this->cityRepository->createCity($request->all());
        return new CityResource($city);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = $this->cityRepository->getCityById($id);
        return new CityResource($city); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCityRequest $request, $id)
    {
        $city = $this->cityRepository->updateCity($id, $request->all());
        return new CityResource($city);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->cityRepository->deleteCity($id);
        return response()->json(null, 204);
    }
}
