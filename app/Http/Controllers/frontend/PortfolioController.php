<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->load('category');
        return view('frontend.portfolio-details',compact('portfolio'));
    }


}
