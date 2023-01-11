<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Admin::all();
        return view('admin.setting.setting', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Admin::all();
        return view('admin.setting.moderatorcreate', compact('data'));
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins',
            'phone' => 'required|max:15',
            'password' => 'required|confirmed|min:8',
            'role' => 'required|string|max:50',
            'image' => 'required|mimes:jpeg,png,jpg,gif',
        ]);
         $image = $request->file('image');
         $image_name = uniqid() . $image->getClientOriginalName();
         $image->move(public_path('/images/admin/'), $image_name);

         $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->passwrod),
            'role' => $request->role,
            'image' => $image_name,
         ]);
         return redirect('/admin/setting')->with('success', 'Your role has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::where('id', $id)->first();
        if(!$admin){
            return redirect()->back()->with('error', 'there is no role');
        }
        return view('admin.setting.moderatoredit', compact('admin'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect('/admin/setting')->with('success', 'deleted');
    }
}
