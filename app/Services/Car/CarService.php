<?php

namespace App\Services\Car;

use App\Models\Car;
use App\Models\User;
use App\Dto\Car\CarCreateDto;
use App\Dto\Car\CarDeleteDto;
use App\Dto\Car\CarUpdateDto;
use App\Dto\Car\CarFindDto;
use App\Dto\Car\CarListDto;

final class CarService
{
    public function get(CarListDto $request)
    {
        //filters//sort//pagen

        $cars = Car::get();

        return $cars;
    }

    public function find(CarFindDto $request) : Car
    {
        $id = $request->getId();

        $car = Car::find($id);

        return $car;
    }

    public function create(CarCreateDto $request) : Car
    {
        $car = new Car();
        $car->name = $request->getName();

        if (!empty($reques->userId)) {
            return $this->addUser($car, $reques->userId);
        }

        $car->saveOrFail();

        return $car;
    }

    public function delete(CarDeleteDto $request)
    {
        $id = $request->getId();

        $car = Car::find($id);
        $car->deleteOrFail();

        return true;
    }

    public function update(CarUpdateDto $request) : Car
    {
        $id = $request->getId();

        $car = Car::find($id);
        $car->name = $request->getName();

        if (!empty($reques->userId)) {
            return $this->addUser($car, $reques->userId);
        }

        return $car;
    }

    public function addUser(Car $car, $userId)
    {
        $user = User::find($userId);

        if (empty($user->car))
            throw new \Exception("Car not free");

        return $user->car()->save($car);
    }
}