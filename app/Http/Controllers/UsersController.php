<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserDeleteRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Requests\User\UserFindRequest;
use App\Http\Requests\User\UserListRequest;
use App\Services\User\UserService;
use App\Models\User;

use Response;

class UsersController extends Controller
{
    public function list(UserListRequest $request, UserService $carService)
    {
        $cars = $carService->get($request->getDto());

        return Response::json([
            'status' => 'success',
            'data' => $cars,
        ]);
    }

    public function find(UserFindRequest $request, UserService $carService)
    {
        $car = $carService->find($request->getDto());

        return Response::json([
            'status' => 'success',
            'data' => $car,
        ]);
    }

    public function create(UserCreateRequest $request, UserService $carService)
    {
        $car = $carService->create($request->getDto());

        return Response::json([
            'status' => 'success',
            'data' => $car,
        ]);
    }

    public function update(UserUpdateRequest $request, UserService $carService)
    {
        $car = $carService->update($request->getDto());

        return Response::json([
            'status' => 'success',
            'data' => $car,
        ]);
    }

    public function delete(UserDeleteRequest $request, UserService $carService)
    {
        $result = $carService->delete($request->getDto());

        return Response::json([
            'status' => 'success',
            'data' => $result,
        ]);
    }
}
