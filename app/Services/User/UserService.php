<?php

namespace App\Services\User;

use App\Models\Car;
use App\Models\User;
use App\Dto\User\UserCreateDto;
use App\Dto\User\UserDeleteDto;
use App\Dto\User\UserUpdateDto;
use App\Dto\User\UserFindDto;
use App\Dto\User\UserListDto;

final class UserService
{
    public function get(UserListDto $request)
    {
        //filters//sort//pagen

        $users = User::get();

        return $users;
    }

    public function find(UserFindDto $request) : User
    {
        $id = $request->getId();

        $user = User::find($id);

        return $user;
    }

    public function create(UserCreateDto $request) : User
    {
        $user = User::create([
            'name' => $request->getName(),
            'email' => $request->getEmail(),
            'password' => \Hash::make($request->getPassword()),
        ]);

        if (empty($user))
            throw new \Exception("No create user");

        return $user;
    }

    public function delete(UserDeleteDto $request)
    {
        $id = $request->getId();

        $user = User::find($id);
        $user->deleteOrFail();

        return true;
    }

    public function update(UserUpdateDto $request) : User
    {
        $id = $request->getId();
        $password = $request->getPassword();
        $password = $password?\Hash::make($password):null;

        $user = User::find($id);
        $user->name = $request->getName()??$user->name;
        $user->email = $request->getEmail()??$user->email;
        $user->password = $password??$user->password;

        $user->saveOrFail();

        return $user;
    }
}