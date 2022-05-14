<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ChangeRequest;
use App\Helpers\CarHelper;

use Response;

class ChangeController extends Controller
{
    public function change(ChangeRequest $request)
    {
        $result = CarHelper::changeUserCar($request->userId, $request->carId);

        return Response::json([
            'status' => 'success',
            'data' => $result ,
        ]);
    }
}
