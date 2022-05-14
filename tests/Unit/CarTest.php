<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\Car\CarService;
use App\Dto\Car\CarCreateDto;
use App\Dto\Car\CarUpdateDto;
use App\Dto\Car\CarFindDto;
use App\Dto\Car\CarDeleteDto;
use Illuminate\Support\Facades\DB;

class CarTest extends TestCase
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
            $carService = new CarService();

            $car = $carService->create(new CarCreateDto(
                'test-name',
                null
            ));

            $this->assertEquals('test-name', $car->name);

            $car = $carService->find(new CarFindDto(
                $car->id
            ));

            $this->assertEquals('test-name', $car->name);

            $car = $carService->update(new CarUpdateDto(
                $car->id,
                'test-name-update',
                null
            ));

            $this->assertEquals('test-name-update', $car->name);

            $car = $carService->find(new CarFindDto(
                $car->id
            ));

            $this->assertEquals('test-name-update', $car->name);

            $result = $carService->delete(new CarDeleteDto(
                $car->id
            ));

            $this->assertEquals($result, true);
        });
    }
}
