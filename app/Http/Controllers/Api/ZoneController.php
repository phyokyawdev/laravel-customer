<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreZoneRequest;
use App\Http\Resources\ZoneResource;
use App\interfaces\ZoneRepositoryInterface;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    private ZoneRepositoryInterface $zoneRepository;
    
    public function __construct(ZoneRepositoryInterface $zoneRepository)
    {
        $this->zoneRepository = $zoneRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->query('name');
        $name_mm = $request->query('name_mm');
        $city_name = $request->query('city_name');

        $zones = $this->zoneRepository->getAllZones($name, $name_mm, $city_name);
        return ZoneResource::collection($zones);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreZoneRequest $request)
    {
        $zone = $this->zoneRepository->createZone($request->all());
        return new ZoneResource($zone);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $zone = $this->zoneRepository->getZoneById($id);
        return new ZoneResource($zone);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreZoneRequest $request, $id)
    {
        $zone = $this->zoneRepository->updateZone($id, $request->all());
        return new ZoneResource($zone);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->zoneRepository->deleteZone($id);
        return response()->json(null, 204);
    }
}
