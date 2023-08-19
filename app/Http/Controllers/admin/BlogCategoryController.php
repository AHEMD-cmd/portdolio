<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = BlogCategory::all();
        return view('admin.blog-category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255'
        ]);
        $category = new BlogCategory();
        $category->name = $request->name;
        $category->slug =  Str::slug( $request->name);
        $category->save();
        return redirect()->route('admin.blog-category.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = BlogCategory::findOrFail($id);
        if($category){
            return view('admin.blog-category.edit', compact('category'));
        }
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = BlogCategory::findOrFail($id);

        if(!$category){
            return abort(404);
        }
        $category->name = $request->name;
        $category->slug =  Str::slug( $request->name);
        $category->save();
        return redirect()->route('admin.blog-category.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = BlogCategory::findOrFail($id);

        if(!$category){
            return abort(404);
        }
        $category->delete();
        return back();
    }
}

