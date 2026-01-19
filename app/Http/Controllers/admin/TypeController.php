<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     * protected $fillable=['client_image','client_name','review','client_designation'];
     */
    public function index()
    {
        $types = Type::latest()->get();
        return view('admin.type.list', compact('types'));
    }

    public function create()
    {
        return view('admin.type.add');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'boolean:default,1',


        ]);


        Type::create($validatedData);

        return redirect()->route('type.list')->with('success', 'Type created successfully!');
    }

    public function show($id)
    {
        $types = Type::findOrFail($id);
        return view('admin.type.list', compact('types'));
    }

    public function edit($id)
    {
        $types = Type::findOrFail($id);
        return view('admin.type.edit', compact('types'));
    }

    public function update(Request $request, $id)
    {
        $types = Type::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'boolean:default,1',

        ]);


        $types->update($validatedData);

        return redirect()->route('type.list')->with('success', 'Type updated successfully!');
    }

    public function destroy($id)
    {
        $types = Type::findOrFail($id);

        $types->delete();

        return redirect()->route('type.list')->with('success', 'Type deleted successfully!');

    }




}
