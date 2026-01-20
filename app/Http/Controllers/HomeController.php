<?php

namespace App\Http\Controllers;

use App\Models\BodyLevel;
use App\Models\BodyPart;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $bodyParts=BodyPart::all();
        $bodyLevels=BodyLevel::all();
        return view('index', compact('bodyParts','bodyLevels'));
    }

}
