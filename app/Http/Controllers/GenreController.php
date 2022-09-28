<?php

namespace App\Http\Controllers;

use App\Http\Requests\Genre\CreateRequest;
use App\Http\Requests\Genre\EditRequest;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function createForm()
    {
        return view('genres.create');
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();
        $genre = new Genre($data);
        $genre->save();

        session()->flash('success', 'Success!');

        return redirect()->route('genre.list');
    }

    public function list(Request $request)
    {
        $genres = Genre::all();

        return view('genres.list', compact('genres'));
    }

    public function editForm(Genre $genre)
    {
        return view('genres.edit', compact('genre'));
    }

    public function edit(Genre $genre, EditRequest $request)
    {
        $data = $request->validated();
        $genre->fill($data);
        $genre->save();

        session()->flash('success', 'The genre was successfully edited!');

        return redirect()->route('genre.list');
    }

    public function delete(Genre $genre)
    {
        $genre->delete();

        session()->flash('success', 'Successfully deleted!');

        return redirect()->route('genre.list');
    }
}
