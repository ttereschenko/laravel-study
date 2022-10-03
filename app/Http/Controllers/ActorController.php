<?php

namespace App\Http\Controllers;

use App\Http\Requests\Actor\CreateRequest;
use App\Http\Requests\Actor\EditRequest;
use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function createForm()
    {
        return view('actors.create');
    }

    public function create(CreateRequest $request)
    {
        $data = $request->validated();
        $actor = new Actor($data);
        $actor->save();

        session()->flash('success', 'Success!');

        return redirect()->route('actor.show', ['actor' => $actor->id]);
    }

    public function list(Request $request)
    {
        $actors = Actor::paginate(3);

        return view('actors.list', compact('actors'));
    }

    public function show(Actor $actor)
    {
        return view('actors.show', compact('actor'));
    }

    public function editForm(Actor $actor)
    {
        return view('actors.edit', compact('actor'));
    }

    public function edit(Actor $actor, EditRequest $request)
    {
        $data = $request->validated();
        $actor->fill($data);
        $actor->save();

        session()->flash('success', 'Successfully edited!');

        return redirect()->route('actor.show', ['actor' => $actor->id]);
    }

    public function delete(Actor $actor)
    {
        $actor->delete();

        session()->flash('success', 'Successfully deleted!');

        return redirect()->route('actor.list');
    }
}
