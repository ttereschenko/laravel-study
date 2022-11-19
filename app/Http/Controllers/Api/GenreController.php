<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GenreResource;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function list()
    {
        $genres = Genre::paginate(3);

        return GenreResource::collection($genres);
    }
}
