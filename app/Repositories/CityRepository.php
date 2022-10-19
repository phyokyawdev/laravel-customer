<?php 

namespace App\Repositories;

use App\Interfaces\CityRepositoryInterface;
use App\Models\City;

class CityRepository implements CityRepositoryInterface 
{
  public function getAllCities($name, $name_mm)
  {
    return City::when($name, function($query, $name) {
                  return $query->where('name', $name);
                })
                -> when($name_mm, function($query, $name_mm) {
                   return $query->where('name_mm', $name_mm);
                }) 
                ->paginate(10);
  }

  public function getCityById($cityId) 
  {
    return City::findOrFail($cityId);
  }

  public function deleteCity($cityId)
  {
    City::destroy($cityId);
  }

  public function createCity(array $cityDetails)
  {
    return City::create($cityDetails);
  }

  public function updateCity($cityId, array $cityDetails)
  { 
    $city = City::find($cityId);
    $city->update($cityDetails);
    return $city;
  }
}