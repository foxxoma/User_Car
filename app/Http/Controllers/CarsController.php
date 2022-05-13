<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Car\CarCreateRequest;
use App\Http\Requests\Car\CarDeleteRequest;
use App\Http\Requests\Car\CarUpdateRequest;
use App\Http\Requests\Car\CarFindRequest;
use App\Http\Requests\Car\CarListRequest;
use App\Services\Car\CarService;
use App\Models\Car;

use Response;

class CarsController extends Controller
{
    public function list(CarListRequest $request, CarService $carService)
    {
        $cars = $carService->get($request->getDto());

        return Response::json([
            'status' => 'success',
            'data' => $cars,
        ]);
    }

    public function find(CarFindRequest $request, CarService $carService)
    {
        $car = $carService->find($request->getDto());

        return Response::json([
            'status' => 'success',
            'data' => $car,
        ]);
    }

    public function create(CarCreateRequest $request, CarService $carService)
    {
        $car = $carService->create($request->getDto());

        return Response::json([
            'status' => 'success',
            'data' => $car,
        ]);
    }

    public function update(CarUpdateRequest $request, CarService $carService)
    {
        $car = $carService->update($request->getDto());

        return Response::json([
            'status' => 'success',
            'data' => $car,
        ]);
    }

    public function delete(CarDeleteRequest $request, CarService $carService)
    {
        $result = $carService->delete($request->getDto());

        return Response::json([
            'status' => 'success',
            'data' => $result,
        ]);
    }
}
