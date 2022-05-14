<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\User\UserService;
use App\Dto\User\UserCreateDto;
use App\Dto\User\UserUpdateDto;
use App\Dto\User\UserFindDto;
use App\Dto\User\UserDeleteDto;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserTest extends TestCase
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

            $user = $userService->create(new UserCreateDto(
                'test-name',
                'test-email@unit.test',
                'test-password',
            ));

            $this->assertEquals('test-name', $user->name);
            $this->assertEquals('test-email@unit.test', $user->email);

            $user = $userService->find(new UserFindDto(
                $user->id
            ));

            $this->assertEquals('test-name', $user->name);
            $this->assertEquals('test-email@unit.test', $user->email);

            $user = $userService->update(new UserUpdateDto(
                $user->id,
                'test-name-update',
                'test-email-update@unit.test',
                'test-password2'
            ));

            $this->assertEquals('test-name-update', $user->name);
            $this->assertEquals('test-email-update@unit.test', $user->email);

            $user = $userService->find(new UserFindDto(
                $user->id
            ));

            $this->assertEquals('test-name-update', $user->name);
            $this->assertEquals('test-email-update@unit.test', $user->email);

            $result = $userService->delete(new UserDeleteDto(
                $user->id
            ));

            $this->assertEquals($result, true);
        });
    }
}
