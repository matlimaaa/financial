<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    protected $entity;

    public function __construct(User $user)
    {
        $this->entity = $user;
    }

    public function getUsers()
    {
        return $this->entity->paginate();
    }
    
    public function getUserByUuid(string $uuid)
    {
        return $this->entity->where('uuid', $uuid)->first();
    }

    public function createNewUser(array $request)
    {
        return $this->entity->create($request);
    }
    
    public function updateUser(array $request, string $uuid)
    {
        if(!$user = $this->entity->where('uuid', $uuid)->first())
            return response()->json(['message' => 'Not Found'], 404);

        $user->update($request);

        return $user;
    }

    public function deleteUser(string $uuid)
    {
        $user = $this->entity->where('uuid', $uuid)->first();
        
        if(!$user)
            return response()->json(['message' => 'Not Found'], 404 );

        $user->delete();
        
        return response()->json([], 200);
    }
}