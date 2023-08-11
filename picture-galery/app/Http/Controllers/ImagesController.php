<?php

namespace App\Http\Controllers;

use App\Models\images;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = images::all();
        return response()->json($images);
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
        $images = $request->validate([
            'title' => 'required',
            'details' => 'required',
            'path' => 'required',
            'disks' => 'required',
            'collection_id' => 'nullable|uuid',
            'create_time' => 'nullable',
        ]);

        $image = images::create($images);
        $images['id'] = Str::uuid();
        $image->save();

        return response()->json($image, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($collection_id)
    {
        $images = images::where('collection_id', $collection_id)->get();
        return response()->json($images);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(images $images)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, images $images)
    {
        $images->update($request->all());
        return response()->json($images);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(images $images)
    {
        //
    }
}
