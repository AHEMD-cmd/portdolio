<?php

namespace App\Http\Controllers\admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Requests\AboutRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::first();
        if(!$about){
			$about = new About();
		}
		return view('admin.about.index', compact('about'));

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(AboutRequest $request, string $id)
    {
        $img = $this->upload('img', 'about_imgs');
        $resume = $this->upload('resume', 'resume_files');

        $about = About::where('id', $id)->first();

        if($about){
			if(File::exists(public_path('about_imgs/'. $about->img)) && isset($request->img)){
                //   dd('asa');
				File::delete(public_path('about_imgs/'. $about->img));
			}
			if(File::exists(public_path('resume_files/'. $about->resume)) && isset($request->resume)){
                //   dd('asa');
				File::delete(public_path('resume_files/'. $about->resume));
			}
			$about->update([
				'title' => $request->title,
				'sub_title' => $request->sub_title,
				'resume' => $resume ? $resume : $about->resume,
				'img' => $img ? $img : $about->img,
			]);
		}else{
			About::create([
				'title' => $request->title,
				'sub_title' => $request->sub_title,
				'resume' => isset($resume) ? $resume: "",
				'img' => isset($img) ? $img: "",
			]);
		}

		return back();
    }

    public function upload($img_name, $path)
	{
		$img = '';
		if(request()->hasFile($img_name)){
			$file = request()->file($img_name);
			$img = time().'_'. $file->getClientOriginalName();
			$file->move(\public_path("$path/"),$img);
			return $img;
		}
	}

    public function download_resume()
	{
		$about = About::first();
        return response()->download(public_path('resume_files/'.$about->resume));
	}
}
