<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Models\ExercisePosition;
use Illuminate\Http\Request;

class ExercisePositionController extends Controller
{



    public function index()
    {
        $exercisePosition = ExercisePosition::with('exercise')->latest()->get();
        return view('admin.exerciseposition.list', compact('exercisePosition'));
    }

    public function create()
    {
        $exercise = Exercise::all();


        return view('admin.exerciseposition.add',compact('exercise'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'description' => 'required|string',
            'exercise_id' => 'required|exists:exercises,id'


        ]);


        ExercisePosition::create($validatedData);

        return redirect()->route('exerciseposition.list')->with('success', 'ExercisePosition created successfully!');
    }

    public function show($id)
    {
        $exercisePosition = ExercisePosition::findorFail($id);
        $exercise = Exercise::all();
        return view('admin.muscel.list', compact('exercisePosition','exercise'));
    }

    public function edit($id)
    {
        $exercisePosition = ExercisePosition::findOrFail($id);
        $exercise=Exercise::all();
        return view('admin.exerciseposition.edit', compact('exercisePosition','exercise'));
    }

    public function update(Request $request, $id)
    {
        $exercisePosition = ExercisePosition::findOrFail($id);

        $validatedData = $request->validate([
            'description' => 'required|string',
            'exercise_id' => 'required|exists:exercises,id',

        ]);


        $exercisePosition->update($validatedData);

        return redirect()->route('exerciseposition.list')->with('success', 'ExercisePosition updated successfully!');
    }

    public function destroy($id)
    {
        $exercisePosition = ExercisePosition::findOrFail($id);

        $exercisePosition->delete();

        return redirect()->route('exerciseposition.list')->with('success', 'ExercisePosition deleted successfully!');

    }

}
