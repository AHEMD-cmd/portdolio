<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HeroRequest;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HeroController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$hero = Hero::first();
		if(!$hero){
			$hero = new Hero();
		}
		return view('admin.hero.index', compact('hero'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function upload_img()
	{
		$img = '';
		if(request()->hasFile('img')){
			$file = request()->file('img');
			$img = time().'_'. $file->getClientOriginalName();
			$file->move(\public_path('hero_imgs/'),$img);
			return $img;
		}
	}



	/**
	 * Update the specified resource in storage.
	 */
	public function update(HeroRequest $request, string $id)
	{
        $img = $this->upload_img();

		$hero = Hero::where('id', $id)->first();

		if($hero){
			if(File::exists(public_path('hero_imgs/'. $hero->img)) && isset($request->img)){
                //   dd('asa');
				File::delete(public_path('hero_imgs/'. $hero->img));
			}
			$hero->update([
				'title' => $request->title,
				'sub_title' => $request->sub_title,
				'btn_text' => $request->btn_text,
				'btn_url' => $request->btn_url,
				'img' => $img ? $img : $hero->img,
			]);
		}else{
			Hero::create([
				'title' => $request->title,
				'sub_title' => $request->sub_title,
				'btn_text' => $request->btn_text,
				'btn_url' => $request->btn_url,
				'img' => isset($img) ? $img: "",
			]);
		}


		return back();
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
	}
}
