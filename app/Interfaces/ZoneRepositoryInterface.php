<?php

namespace App\interfaces;

interface ZoneRepositoryInterface
{
  public function getAllZones($name, $name_mm, $city_name);
  public function getZoneById($zoneId);
  public function deleteZone($zoneId);
  public function createZone(array $zoneDetails);
  public function updateZone($zoneId, array $zoneDetails);
}