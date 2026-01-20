<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BodyLevel;
use App\Models\BodyPart;
use App\Models\Exercise;
use App\Models\ExercisePosition;
use App\Models\Level;
use App\Models\Muscle;
use App\Models\Type;
use Illuminate\Http\Request;

class ExcerciseController extends Controller
{



    public function index()
    {



        $exercise=Exercise::with('muscle','bodyPart','bodyLevel','levelExercise')->latest()->get();

        return view('admin.exercise.list', compact('exercise'));
    }




    public function create()
    {
        $exercise = Exercise::all();
        $bodyLevel = BodyLevel::all();
        $bodyPart=BodyPart::all();
        $levelExercise=Level::all();
        $muscle=Muscle::all();


        return view('admin.exercise.add', compact('exercise','bodyLevel','bodyPart','levelExercise','muscle'));
    }
    public function getExercises($bodyPartId)
    {
        $exercises = Exercise::where('part_id', $bodyPartId)->get();
        return response()->json($exercises); // send as JSON for AJAX
    }
    public function getBodyExercises($bodyLevelId)
    {
        $exercises = Exercise::where('level_id', $bodyLevelId)->get();
        return response()->json($exercises); // send as JSON for AJAX
    }

    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'order_by'=>'nullable|integer',
            'cloudflare_video'=>'nullable|string',
            'thumbnail'=>'nullable|string',
            'youtube_video'=>'nullable|string',
            'going_up'=>'nullable|boolean',
            'going_down'=>'nullable|boolean',
            'time_tense'=>'nullable|date_format:H:i:s',
            'body_id'=>'nullable|exists:body_levels,id',
            'part_id'=>'nullable|exists:body_parts,id',
            'muscle_id'=>'nullable|exists:muscles,id',
            'level_id'=>'nullable|exists:levels,id',


        ]);


        Exercise::create($validatedData);

        return redirect()->route('exercise.list')->with('success', 'Exercise created successfully!');
    }

    public function show($id)
    {
        $exercise = Exercise::with('muscle','bodyPart','levelExercise','bodyLevel',)->findOrFail($id);

        return view('admin.exercise.list', compact('exercise'));
    }
    public function edit($id)
    {
        $exercise=Exercise::findorFail($id);
        $bodyLevel = BodyLevel::all();
        $bodyPart=BodyPart::all();
        $levelExercise=Level::all();
        $muscle=Muscle::all();

        return view('admin.exercise.edit', compact('exercise','bodyLevel','bodyPart','levelExercise','muscle'));
    }

    public function update(Request $request, $id)
    {
        $exercise = Exercise::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'order_by'=>'nullable|integer',
            'cloudflare_video'=>'nullable|string',
            'thumbnail'=>'nullable|string',
            'youtube_video'=>'nullable|string',
            'going_up'=>'nullable|boolean',
            'going_down'=>'nullable|boolean',
            'time_tense'=>'nullable|date_format:H:i:s',
            'body_id'=>'nullable|exists:body_levels,id',
            'part_id'=>'nullable|exists:body_parts,id',
            'muscle_id'=>'nullable|exists:muscles,id',
            'level_id'=>'nullable|exists:levels,id',
        ]);


        $exercise->update($validatedData);

        return redirect()->route('exercise.list')->with('success', 'Exercise updated successfully!');
    }

    public function destroy($id)
    {
        $exercise = Exercise::findOrFail($id);

        $exercise->delete();

        return redirect()->route('exercise.list')->with('success', 'Exercise deleted successfully!');

    }

}
