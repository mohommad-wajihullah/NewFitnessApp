<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Muscle;
use Illuminate\Http\Request;

class MuscleController extends Controller
{


    public function index()
    {
         $muscle=Muscle::latest()->get();
        return view('admin.muscel.list', compact('muscle'));
    }

    public function create()
    {
        return view('admin.muscel.add');
    }
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',

        ]);
        Muscle::create($validatedData);

        return redirect()->route('muscle.list')->with('success', 'Muscel created successfully!');
    }

    public function show($id)
    {
        $muscle = Muscle::findOrFail($id);

        return view('admin.muscel.list', compact('muscle'));
    }

    public function edit($id)
    {
        $muscle = Muscle::findOrFail($id);
        return view('admin.muscel.edit', compact('muscle'));
    }

    public function update(Request $request, $id)
    {
         $muscle= Muscle::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',

        ]);


        $muscle->update($validatedData);

        return redirect()->route('muscle.list')->with('success', 'Muscel updated successfully!');
    }

    public function destroy($id)
    {
        $muscle = Muscle::findOrFail($id);

        $muscle->delete();

        return redirect()->route('muscle.list')->with('success', 'Muscel deleted successfully!');

    }
}
