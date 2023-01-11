<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'category_name' => 'required|string|min:3|max:255'
        ]);
        Category::create([
            'category_name' => $request->category_name
        ]);
        return redirect('/admin/category')->with('success', 'Your Category has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category_id)
    {
        $category = Category::where('category_id', $category_id)->first();
        if(!$category) {
            return redirect()->back()->with('error', 'Category not found');
        }
        return view('admin.category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($category_id)
    {
       $category = Category::where('category_id', $category_id)->first();
        if(!$category) {
            return redirect()->back()->with('error', 'Category not found');
        }
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category_id)
    {
        $request->validate([
        'category_name' => 'required|string|min:3|max:255'
    ]);
        $category = Category::where('category_id', $category_id)->first();
        if(!$category) {
            return redirect()->back()->with('error', 'Category not found');
    }
    Category::where('category_id', $category_id)->update([
        'category_name' => $request->category_name,
    ]);
        return redirect('/admin/category')->with('success', 'Your Category updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id)
    {
        $category = Category::where('category_id', $category_id);
        if (!$category->first()){
            return redirect()->back()->with('error', 'Category Not Found');
        }
        $category->delete();
        return redirect('/admin/category')->with('success', 'Category deleted successfully');
    }
}
