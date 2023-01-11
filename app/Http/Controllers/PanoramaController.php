<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
// use App\Models\Gallery;

class PanoramaController extends Controller
{
    public function panorama($id)
    {
        $project = Project::find($id);
        return view('panorama360', compact('project'));
    }
}
