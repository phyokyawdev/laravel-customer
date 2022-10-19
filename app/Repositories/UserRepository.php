<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
  public function getAllUsers($name, $email)
  {  
    return User::when($name, function($query, $name) {
                    return $query->where('name', $name);
                })
                -> when($email, function($query, $email) {
                    return $query->where('email', $email);
                }) 
                ->paginate(10);
  }

  public function getUserById($userId)
  {
    return User::findOrFail($userId);
  }

  public function deleteUser($userId)
  {
    User::destroy($userId);
  }

  public function createUser(array $userDetails)
  {
    return User::create($userDetails);
  }

  public function updateUser($userId, array $userDetails)
  {
    $user = User::find($userId);
    $user->update($userDetails);
    return $user;
  }
}
