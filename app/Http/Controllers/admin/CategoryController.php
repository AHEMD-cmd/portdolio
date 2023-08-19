<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.portfolio-category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portfolio-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255'
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->slug =  Str::slug( $request->name);
        $category->save();
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        if($category){
            return view('admin.portfolio-category.edit', compact('category'));
        }
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        if(!$category){
            return abort(404);
        }
        $category->name = $request->name;
        $category->slug =  Str::slug( $request->name);
        $category->save();
        return back();


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if(!$category){
            return abort(404);
        }
        $category->delete();
        return back();
    }
}
