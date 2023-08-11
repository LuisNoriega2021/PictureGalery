<?php

namespace App\Http\Controllers;

use App\Models\imagenes;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ImagenesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

        $images['id'] = Str::uuid();
        $image = imagenes::create($images);

        return response()->json($image, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(imagenes $imagenes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(imagenes $imagenes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, imagenes $imagenes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(imagenes $imagenes)
    {
        //
    }
}
