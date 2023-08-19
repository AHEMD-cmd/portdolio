<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(2);
        return view('frontend.blog',compact('blogs'));
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->load('category');
        return view('frontend.blog-details',compact('blog'));
    }


}
