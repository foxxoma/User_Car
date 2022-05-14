<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Services\User\UserService;
use App\Dto\User\UserCreateDto;
use App\Dto\User\UserUpdateDto;
use App\Dto\User\UserFindDto;
use App\Dto\User\UserDeleteDto;

use App\Services\Car\CarService;
use App\Dto\Car\CarCreateDto;
use App\Dto\Car\CarUpdateDto;
use App\Dto\Car\CarFindDto;
use App\Dto\Car\CarDeleteDto;

use Illuminate\Support\Facades\DB;

class ChangeTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function testCRUD()
    {
        DB::transaction(function() {
            $userService = new UserService();
            $carService = new CarService();

            $user = $userService->create(new UserCreateDto(
                'test-name',
                'test-email@unit.test',
                'test-password',
            ));

            $car1 = $carService->create(new CarCreateDto(
                'test-name1',
                $user->id
            ));
            $this->assertEquals($car1->user_id, $user->id);

            $car2 = $carService->create(new CarCreateDto(
                'test-name2',
                $user->id
            ));
            $this->assertEquals($car2->user_id, $user->id);

            $car1 = $carService->find(new CarFindDto(
                $car1->id
            ));
            $this->assertEquals(null, $car1->user_id);

            $car1 = $carService->update(new CarUpdateDto(
                $car1->id,
                'test-name2',
                $user->id
            ));
            $this->assertEquals('test-name2', $car1->name);
            $this->assertEquals($car1->user_id, $user->id);

            $car2 = $carService->find(new CarFindDto(
                $car2->id
            ));
            $this->assertEquals(null, $car2->user_id);

            $result = $carService->delete(new CarDeleteDto(
                $car1->id
            ));
            $this->assertEquals($result, true);

            $result = $carService->delete(new CarDeleteDto(
                $car2->id
            ));
            $this->assertEquals($result, true);

            $result = $userService->delete(new UserDeleteDto(
                $user->id
            ));
            $this->assertEquals($result, true);
        });
    }
}
