<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\FacebookLink;
// use App\Models\Project;

class FacebookLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $projects = Project::all();
        $facebooklinks = FacebookLink::all();
        return view('admin.facebooklink.index', compact('facebooklinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $projects = Project::all();
        return view('admin.facebooklink.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_post_link' => "required|string",
            'picture' => "required|mimes:jpeg,png,jpg,gif|max:2048",
            'description' => "required|string"
        ]);

        $image = $request->file('picture');
        $image_name = uniqid() . $image->getClientOriginalName();
        $image->move(public_path('/images/fb-images/'), $image_name);

        // $project = Project::where('id', $request->id)->first();
        // if(!$project){
        //     return redirect()->back()->with('error', 'Not found project');
        // }

        $facebooklink = FacebookLink::create([
            'project_post_link' => $request->project_post_link,
            'description' => $request->description,
            'picture' => $image_name,
        ]);
        $facebooklink->save();
        return redirect('/admin/facebooklink')->with('success', 'Your facebooklink has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $projects = Project::all();
        $facebooklink = FacebookLink::where('id', $id)->first();
        if(!$facebooklink){
            return redirect()->back()->with('error', 'Not found facebooklink');
        }
        return view('admin.facebooklink.show', compact('facebooklink'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $projects = Project::all();
        $facebooklink = FacebookLink::where('id', $id)
            ->first();
            if(!$facebooklink){
                return redirect()->back()->with('error', 'not found facebooklink');
            }
        return view('admin.facebooklink.edit', compact('facebooklink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $facebooklink = FacebookLink::where('id', $id);
        if(!$facebooklink->first()){
            return redirect()->back()->with('error', 'not found facebooklink');
        }

        // $project = Project::where('id', $request->id)->first();
        // if(!$project){
        //     return redirect()->back()->with('error', 'not found project');
        // }

        if($file = $request->file('picture')){
            $file_name = uniqid() . $file->getClientOriginalName();
            $file->move(public_path('/images/fb-images'), $file_name);
        }else{
            $file_name = $facebooklink->first()->picture;
        }

        $facebooklink->update([
            'picture' => $file_name,
            'project_post_link' => $request->project_post_link,
            'description' => $request->description,
        ]);
        return redirect('/admin/facebooklink')->with('success', 'Your facebooklink has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facebooklink = FacebookLink::where('id', $id);
        if(!$facebooklink){
            return redirect()->back()->with('error', 'not found facebooklink');
        }
        File::delete(public_path('images/fb-images/' . $facebooklink->first()->picture));
        $facebooklink->delete();
        return redirect('/admin/facebooklink')->with('success', 'your facebooklink deleted successfully.');
    }
}
