<?php

namespace App\Http\Controllers;

use App\Models\collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collection = collection::all();
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
        $collection = new collection();
        $collection->id = $request->input('id');
        $collection->title = $request->input('title');
        $collection->details = $request->input('details');
        $collection->users_id = $request->input('users_id');
        $collection->state = $request->input('state');
        $collection->create_time = $request->input('create_time');
        $collection->save();
        return response()->json($collection, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $collection = collection::find($id);
        return response()->json($collection);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(collection $collection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $collection = collection::find($id);
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
        $collection = collection::find($id);
        $collection->delete();
        return response()->json(null, 204);
    }
}
