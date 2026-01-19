<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BodyLevel;
use App\Models\Type;
use Illuminate\Http\Request;

class BodyLevelController extends Controller
{

    /**
     * Display a listing of the resource.
     * protected $fillable=['client_image','client_name','review','client_designation'];
     */
    public function index()
    {
        $bodyLevel = BodyLevel::with('type')->latest()->get();
        return view('admin.bodylevel.list', compact('bodyLevel'));
    }

    public function create()
    {
        $types=Type::all();

        return view('admin.bodylevel.add',[
            'types'=>$types
        ]);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'type_id' => 'required|exists:types,id',
            'with_equipment' => 'nullable|boolean',


        ]);


        BodyLevel::create($validatedData);

        return redirect()->route('bodylevel.list')->with('success', 'BodyLevel created successfully!');
    }

    public function show($id)
    {
        $bodyLevel = BodyLevel::with('type')->findOrFail($id);

        return view('admin.bodylevel.list', compact('bodyLevel'));
    }

    public function edit($id)
    {
        $bodyLevel = BodyLevel::findOrFail($id);
        $types=Type::all();
        return view('admin.bodylevel.edit', compact('bodyLevel','types'));
    }

    public function update(Request $request, $id)
    {
        $bodyLevel = BodyLevel::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'type_id' => 'required|exists:types,id',
            'with_equipment' => 'nullable|boolean',

        ]);


        $bodyLevel->update($validatedData);

        return redirect()->route('bodylevel.list')->with('success', 'BodyLevel updated successfully!');
    }

    public function destroy($id)
    {
        $bodyLevel = BodyLevel::findOrFail($id);

        $bodyLevel->delete();

        return redirect()->route('bodylevel.list')->with('success', 'BodyLevel deleted successfully!');

    }




}


