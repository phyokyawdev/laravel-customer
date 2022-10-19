<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository= $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = $this->userRepository->getAllUsers($request->query('name'), $request->query('email'));
        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {   
        $user = $this ->userRepository->createUser($request->all());
        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  $userId
     * @return \Illuminate\Http\Response
     */
    public function show($userId)
    {
        $user = $this->userRepository->getUserById($userId);
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $userId
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $userId)
    {
        $user = $this->userRepository->updateUser($userId, $request->all());
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $userId
     * @return \Illuminate\Http\Response
     */
    public function destroy($userId)
    {
        $this->userRepository->deleteUser($userId);
        return response()->json(null, 204);
    }
}
