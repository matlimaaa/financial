<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface 
{
    public function getUsers();
    public function getUserByUuid(string $uuid);
    public function createNewUser(array $request);
    public function updateUser(array $request, string $uuid);
    public function deleteUser(string $uuid);
}