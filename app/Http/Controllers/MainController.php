<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $query = Movie::query()->with(['user', 'genres', 'actors'])->latest();

        if ($request->has('title')) {
            $search = '%' . $request->get('title') . '%';
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', $search);
                $q->orWhere('description', 'like', $search);
            });
        }

        if ($request->has('year')) {
            $search = '%' . $request->get('year') . '%';
            $query->where(function ($q) use ($search) {
                $q->where('year', 'like', $search);
            });
        }

        if ($request->has('genres')) {
            $query->whereHas('genres', function ($q) use ($request) {
                $q->whereIn('genres.id', $request->get('genres'));
            });
        }

        if ($request->has('actors')) {
            $query->whereHas('actors', function ($q) use ($request) {
                $q->whereIn('actors.id', $request->get('actors'));
            });
        }

        $movies = $query->paginate()->appends($request->query());

        $genres = Genre::all();
        $actors = Actor::all();

        return view('homepage', compact('movies', 'genres', 'actors'));
    }

    public function aboutUs()
    {
        return view('about');
    }
}
