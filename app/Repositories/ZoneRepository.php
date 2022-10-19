<?php 

namespace App\Repositories;

use App\Interfaces\ZoneRepositoryInterface;
use App\Models\Zone;

class ZoneRepository implements ZoneRepositoryInterface 
{
  public function getAllZones($name, $name_mm, $city_name)
  {
    return Zone::when($name, function($query, $name) {
                  return $query->where('name', $name);
                })
                -> when($name_mm, function($query, $name_mm) {
                   return $query->where('name_mm', $name_mm);
                }) 
                -> when($city_name, function($query, $city_name) {
                  return $query->whereHas('City', function($query) use ($city_name) {
                    $query->where('name', $city_name);
                  });
                })
                ->paginate(10);
  }

  public function getZoneById($zoneId) 
  {
    return Zone::findOrFail($zoneId);
  }

  public function deleteZone($zoneId)
  {
    Zone::destroy($zoneId);
  }

  public function createZone(array $zoneDetails)
  {
    return Zone::create($zoneDetails);
  }

  public function updateZone($zoneId, array $zoneDetails)
  { 
    $zone = Zone::find($zoneId);
    $zone->update($zoneDetails);
    return $zone;
  }
}