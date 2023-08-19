<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\PortfolioRequest;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolioes = Portfolio::all();
        return view('admin.portfolio.index', compact('portfolioes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.portfolio.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PortfolioRequest $request)
    {

        $data =  $request->validated();
        $data['img'] = $this->upload_img();
        Portfolio::create($data);
        return to_route('admin.portfolio.index');
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
        $portfolio = Portfolio::findOrFail($id);
        $categories = Category::all();
        return view('admin.portfolio.edit', compact('portfolio', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PortfolioRequest $request, string $id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $data =  $request->validated();
        if(isset($data['img'])){
            if(File::exists(public_path('portfolio_imgs/'. $portfolio->img))){
				File::delete(public_path('portfolio_imgs/'. $portfolio->img));
			}
            $data['img'] = $this->upload_img();
        }
        $portfolio->update($data);
        return to_route('admin.portfolio.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $portfolio = Portfolio::findOrFail($id);
        if(File::exists(public_path('portfolio_imgs/'. $portfolio->img))){
            File::delete(public_path('portfolio_imgs/'. $portfolio->img));
        }
        $portfolio->delete();
        return to_route('admin.portfolio.index');

    }

    public function upload_img()
	{
		$img = '';
		if(request()->hasFile('img')){
			$file = request()->file('img');
			$img = time().'_'. $file->getClientOriginalName();
			$file->move(\public_path('portfolio_imgs/'),$img);
			return $img;
		}
	}
}
