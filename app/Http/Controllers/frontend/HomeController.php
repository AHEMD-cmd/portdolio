<?php

namespace App\Http\Controllers\frontend;

use toastr;
use App\Models\Blog;
use App\Models\Hero;
use App\Models\About;
use App\Models\Service;
use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$hero = Hero::first();
		$about = About::first();
		$services = Service::all();
		$portfolioes = Portfolio::with('category')->take(3)->get();
		$categories = Category::all();
		$blogs = Blog::with('category')->take(3)->get();
		return view('frontend.home',compact('hero', 'services', 'about', 'portfolioes', 'categories', 'blogs'))->with('success', '');
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		//
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
	}
}
