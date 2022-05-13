<?php

namespace App\Helpers;

use App\Models\Car;
use App\Models\User;

class CarHelper
{
    public static function changeUserCar($userId, $carId)
    {
        $user = User::find($userId);
        $car = Car::find($carId);

        if (empty($user) || empty($car)) {
            throw new \Exception("Car or user not found");
        }

        $userCars = $user->car()->where('id', '!=', $carId)->get();
    
        if (empty($userCars)) {
            return $user->car()->save($car);
        }

        foreach($userCars as $userCar) {
            $userCar->user_id = null;
            $userCar->saveOrFail();
        }

        return $user->car()->save($car);
    }
}