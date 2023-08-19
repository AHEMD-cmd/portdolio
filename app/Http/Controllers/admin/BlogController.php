<?php

namespace App\Http\Controllers\admin;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {

        $data =  $request->validated();
        $data['img'] = $this->upload_img();
        Blog::create($data);
        return to_route('admin.blog.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::all();
        return view('admin.blog.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, string $id)
    {
        $blog = Blog::findOrFail($id);
        $data =  $request->validated();
        if(isset($data['img'])){
            if(File::exists(public_path('blog_imgs/'. $blog->img))){
				File::delete(public_path('blog_imgs/'. $blog->img));
			}
            $data['img'] = $this->upload_img();
        }
        $blog->update($data);
        return to_route('admin.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        if(File::exists(public_path('blog_imgs/'. $blog->img))){
            File::delete(public_path('blog_imgs/'. $blog->img));
        }
        $blog->delete();
        return to_route('admin.blog.index');

    }

    public function upload_img()
	{
		$img = '';
		if(request()->hasFile('img')){
			$file = request()->file('img');
			$img = time().'_'. $file->getClientOriginalName();
			$file->move(\public_path('blog_imgs/'),$img);
			return $img;
		}
	}
}
