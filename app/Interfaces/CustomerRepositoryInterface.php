<?php

namespace App\interfaces;

interface CustomerRepositoryInterface
{
  public function getAllCustomers($name, $phone_no, $city_name, $zone_name);
  public function getCustomerById($customerId);
  public function deleteCustomer($customerId);
  public function createCustomer(array $customerDetails);
  public function updateCustomer($customerId, array $customerDetails);
}