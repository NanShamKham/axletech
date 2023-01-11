<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Amenity;
use App\Models\Category;
// use App\Models\Address;
use App\Models\Town;
use App\Models\City;
// use App\Models\Gallery;
use Illuminate\Support\Facades\Session;

class ProjectListController extends Controller
{
    public function projectlist(){

        $cities = City::all();
        $amenities = Amenity::all();
        $categories = Category::all();
        // $address = Address::all();
        $towns = Town::all();
        $projects = Project::latest()->paginate(9);
        $findCat = Category::where('category_id')->first();
        $findTon = Town::where('id')->first();
        $finPro = Project::where('id')->first();
        $findPro = Project::where('id')->first();

        return view('projectlist', compact('projects', 'amenities', 'categories', 'towns', 'cities', 'findCat', 'findTon', 'findPro', 'finPro'));
    }

    public function advance(Request $request)
    {
        $categories = Category::all();
        $cities = City::all();
        $amenities = Amenity::all();
        // $address = Address::all();
        $towns = Town::all();
        $projects = Project::latest();

        if($category_id = request()->category){
            $findCategory = Category::where('category_id', $category_id)->first();
            if(!$findCategory){
                return redirect('/projectlist')->with('error', 'category not found');
            }
            $projects->where('category_id', $findCategory->category_id);
        }

        if($id = request()->township){
            $findTown = Town::where('id', $id)->first();
            if(!$findTown){
                return redirect('/projectlist')->with('error', 'township not found');
            }
            $projects->where('township_id', $findTown->id);
        }

        if( $request->min_price && $request->max_price ){
            $projects = $projects->where('lower_price', '>=', $request->min_price)
                         ->where('upper_price', '<=', $request->max_price);
        }
        
        if( $request->input('search')){
            $projects = $projects->where('project_name','LIKE', "%" .$request->search . "%")
                                //  ->orWhere('description', 'LIKE', "%" .$request->search . "%")
                                 ->orWhere('lower_price','LIKE',"%".$request->search."%")
                                 ->orWhere('upper_price','LIKE',"%".$request->search."%")
                                 ->orWhere('squre_feet','LIKE',"%".$request->search."%")
                                //  ->orWhere('gmlink','LIKE',"%".$request->search."%")
                                 ->orWhere('progress','LIKE',"%".$request->search."%")
                                 ->orWhere('layer','LIKE',"%" .$request->search. "%")
                                 ->orWhere('project_id_number','LIKE', "%".$request->search ."%");
        }

        // if($search = request()->search){
        //     $projects->where('project_name', 'like', "%$search%")
        //              ->orWhere('description', 'like', "%$search%")
        //              ->orWhere('lower_price', 'like', "%$search%")
        //              ->orWhere('upper_price', 'like', "%$search%")
        //              ->orWhere('layer', 'like', "%$search%")
        //              ->orWhere('squre_feet', 'like', "%$search%")
        //              ->orWhere('progress', 'like', "%$search%")
        //              ->orWhere('hou_no', 'like', "%$search%")
        //              ->orWhere('street', 'like', "%$search%")
        //              ->orWhere('ward', 'like', "%$search%")
        //              ->orWhere('project_id_number', 'like', "%$search%");
        // }

        $findCat = Category::where('category_id', $category_id)->pluck('category_name')->first();
        $findTon = Town::where('id', $id)->pluck('name')->first();
        $finPro = $request->get('min_price');
        $findPro = $request->get('max_price');

         if (!$projects || !$projects->count()) {
        Session::flash('no-results', 'Sorry, no search results were found');
        }

        $projects =$projects->paginate(9);

        return view('projectlist', compact('projects', 'amenities', 'categories', 'towns', 'cities', 'findCat', 'findTon', 'finPro', 'findPro'));
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

}
    // public function advance(Request $request)
    // {
    //     $data = \DB::table('projects');
    //     if( $request->min_price && $request->max_price ){
    //         $data = $data->where('l_price', '>=', $request->min_price)
    //                      ->where('r_price', '<=', $request->max_price);
    //     }
    //     $data = $data->paginate(3);
    //     return view('projectlist', compact('data'));
    // }

    // public function index()
    // {
    //     $data['categories'] = Category::get(["category_name", "category_id"]);
    //     return view('projectlist', $data);
    // }
    // public function fetchProject(Request $request)
    // {
    //     $data['projects'] = Project::where("category_id",$request->category_id)->get(["name", "id"]);
    //     return response()->json($data);
    // }

