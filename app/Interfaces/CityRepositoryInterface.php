<?php

namespace App\interfaces;

interface CityRepositoryInterface
{
  public function getAllCities($name, $name_mm);
  public function getCityById($cityId);
  public function deleteCity($cityId);
  public function createCity(array $cityDetails);
  public function updateCity($cityId, array $cityDetails);
}