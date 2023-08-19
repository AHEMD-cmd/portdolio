<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use GuzzleHttp\Psr7\ServerRequest;
use Illuminate\Http\Request;

class SevicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        Service::create($request->validated());
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        if($service){
            return view('admin.service.edit', compact('service'));
        }
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, Service $service)
    {
        if(!$service){
            return abort(404);
        }
        $service->update($request->validated());
        return back();


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        if(!$service){
            return abort(404);
        }
        $service->delete();
        return back();
    }
}
