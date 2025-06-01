<?php

namespace App\Http\Controllers;

use App\Http\Requests\FullnameRequest;
use App\Http\Resources\FullnameResource;
use App\Services\FullnameService;

class RequestController extends Controller
{
    public function fullname(FullnameRequest $request): FullnameResource
    {
        $probability = $request
            -> safe()
            -> input('probability', 30);
        $service = new FullnameService();

        return new FullnameResource($service -> getFullname($probability));
    }
}
