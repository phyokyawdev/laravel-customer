<?php

namespace App\interfaces;

interface UserRepositoryInterface
{
  public function getAllUsers($name, $email);
  public function getUserById($userId);
  public function deleteUser($userId);
  public function createUser(array $userDetails);
  public function updateUser($userId, array $userDetails);
}