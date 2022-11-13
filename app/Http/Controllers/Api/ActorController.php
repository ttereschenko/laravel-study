<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ActorResource;
use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function list()
    {
        $actors = Actor::paginate(3);

        return ActorResource::collection($actors);
    }
}
