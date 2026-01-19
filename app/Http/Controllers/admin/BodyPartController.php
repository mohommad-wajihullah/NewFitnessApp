<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BodyPart;
use Illuminate\Http\Request;

class BodyPartController extends Controller
{


    public function index()
    {
        $bodyPart = BodyPart::latest()->get();
        return view('admin.bodypart.list', compact('bodyPart'));
    }

    public function create()
    {
        return view('admin.bodypart.add');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',


        ]);


        BodyPart::create($validatedData);

        return redirect()->route('bodypart.list')->with('success', 'BodyPart created successfully!');
    }

    public function show($id)
    {
        $bodyPart =BodyPart::findOrFail($id);
        return view('admin.bodypart.list', compact('bodyPart'));
    }

    public function edit($id)
    {
        $bodyPart = BodyPart::findOrFail($id);
        return view('admin.bodypart.edit', compact('bodyPart'));
    }

    public function update(Request $request, $id)
    {
        $bodyPart = BodyPart::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',

        ]);


        $bodyPart->update($validatedData);

        return redirect()->route('bodypart.list')->with('success', 'BodyPart updated successfully!');
    }

    public function destroy($id)
    {
        $bodyPart = BodyPart::findOrFail($id);

        $bodyPart->delete();

        return redirect()->route('bodypart.list')->with('success', 'BodyPart deleted successfully!');

    }


}



