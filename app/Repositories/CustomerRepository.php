<?php 

namespace App\Repositories;

use App\Interfaces\CustomerRepositoryInterface;
use App\Models\Customer;

class CustomerRepository implements CustomerRepositoryInterface 
{
  public function getAllCustomers($name, $phone_no, $city_name, $zone_name)
  {
    return Customer::when($name, function($query, $name) {
      return $query->where('name', $name);
    })
    -> when($phone_no, function($query, $phone_no) {
       return $query->where('phone$phone_no', $phone_no);
    }) 
    -> when($city_name, function($query, $city_name) {
      return $query->whereHas('City', function($query) use ($city_name) {
        $query->where('name', $city_name);
      });
    })
    -> when($zone_name, function($query, $zone_name) {
      return $query->whereHas('Zone', function($query) use ($zone_name) {
        $query->where('name', $zone_name);
      });
    })
    ->paginate(10);
  }

  public function getCustomerById($customerId)
  {
    return Customer::findOrFail($customerId);
  }

  public function deleteCustomer($customerId) 
  {
    Customer::destroy($customerId);
  } 

  public function createCustomer(array $customerDetails)
  {
    return Customer::create($customerDetails);
  }

  public function updateCustomer($customerId, array $customerDetails)
  {
    $customer = Customer::find($customerId);
    $customer->update($customerDetails);
    return $customer;
  }
}
