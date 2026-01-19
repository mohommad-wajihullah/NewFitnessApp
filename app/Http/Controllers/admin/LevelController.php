<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\Type;
use Illuminate\Http\Request;

class LevelController extends Controller
{



    public function index()
    {
        $level = Level::latest()->get();
        return view('admin.level.list', compact('level'));
    }

    public function create()
    {
        return view('admin.level.add');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',


        ]);


        Level::create($validatedData);

        return redirect()->route('level.list')->with('success', 'Level created successfully!');
    }

    public function show($id)
    {
        $level = Level::findOrFail($id);
        return view('admin.level.list', compact('level'));
    }

    public function edit($id)
    {
        $level = Level::findOrFail($id);
        return view('admin.level.edit', compact('level'));
    }

    public function update(Request $request, $id)
    {
        $level = Level::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',

        ]);


        $level->update($validatedData);

        return redirect()->route('level.list')->with('success', 'Type updated successfully!');
    }

    public function destroy($id)
    {
        $level = Level::findOrFail($id);

        $level->delete();

        return redirect()->route('level.list')->with('success', 'Level deleted successfully!');

    }


}


