<?php

namespace App\Http\Controllers;

use App\Models\collections;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CollectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collection = collections::all();
        return response()->json($collection);
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
        $collection = $request->validate([
            'title' => 'required',
            'details' => 'required',
            'users_id' => 'required',
            'state' => 'required',
            'create_time' => 'nullable',
        ]);

        $images['id'] = Str::uuid();
        $image = collections::create($collection);

        return response()->json($image, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $collection = collections::find($id);
        return response()->json($collection);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(collections $collection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $collection = collections::find($id);
        $collection->id = $request->input('id');
        $collection->title = $request->input('title');
        $collection->details = $request->input('details');
        $collection->create_time = $request->input('create_time');
        $collection->save();

        return response()->json($collection);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $collection = collections::find($id);
        $collection->delete();
        return response()->json(null, 204);
    }
}
