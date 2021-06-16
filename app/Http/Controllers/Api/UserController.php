<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ValidateUser;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users =  $this->userService->getUsers();
        return UserResource::collection($users);
    }

    public function show($uuid)
    {
        if(!$user = $this->userService->getUserByUuid($uuid))
            return response()->json(['message' => 'Not Found'], 404);

        return new UserResource($user);
    }

    public function store(ValidateUser $request)
    {
        $user = $this->userService->createNewUser($request->all());
        return new UserResource($user);
    }

    public function update(ValidateUser $request, $uuid)
    {
        $user = $this->userService->updateUser($request->all(), $uuid);
        return new UserResource($user);
    }
    
    public function destroy(string $uuid)
    {
        return $this->userService->deleteUser($uuid);
    }
}
