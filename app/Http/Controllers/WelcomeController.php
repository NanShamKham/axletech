<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
// use App\Models\Address;
use App\Models\Slider;
use App\Models\FacebookLink;
use App\Models\Amenity;
use App\Models\City;
use App\Models\Town;
// use App\Models\Gallery;
use App\Models\Category;

class WelcomeController extends Controller
{
    public function welcome()
    {
        // $projects = Project::where('id', '<=', 6)->get();
        $projects = Project::latest()->limit(6)->get();
        $amenities = Amenity::all();
        $facebooklinks = FacebookLink::all();
        $slider = Slider::all();
        // $address = Address::all();
        $cities = City::all();
        $towns = Town::all();
        return view('welcome', compact('projects', 'slider', 'facebooklinks', 'amenities', 'cities', 'towns'));
    }

    public function detail($id)
    {
        $project = Project::find($id);
        $amenity = Amenity::all();
        $city = City::all();
        $town = Town::all();
        // $address = Address::all();
        // $gallery = Gallery::all();
        $category = Category::all();

        return view('projectdetail', compact('project', 'amenity', 'city', 'town', 'category'));
    }
    
    // public function livewire()
    // {
    //     return view('welcome', 'livewire');
    // }

}
