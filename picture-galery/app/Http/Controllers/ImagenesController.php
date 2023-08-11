<?php

namespace App\Http\Controllers;

use App\Models\imagenes;
use App\Models\collection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ImagenesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = imagenes::all();
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

        $images['id'] = Str::uuid();
        $image = imagenes::create($images);

        return response()->json($image, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $images = imagenes::where('id', $id)->get();
        return response()->json($images);
    }


    /**
     * Display the specified resource.
     */
    // public function get_image($id,$collection_id )
    // {
    //     $images = imagenes::where('id', $id)->were('collection_id', $collection_id)->get();
    //     return response()->json($images);
    // }


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
    public function update(Request $request, $id)
    {
        // Validar la solicitud
        $request->validate([
            'title' => 'required',
            'details' => 'required',
            'path' => 'required',
            'disks' => 'required',
            'collection_id' => 'nullable|uuid',
            'create_time' => 'nullable',
        ]);

        // Obtener la imagen
        $image = Imagenes::find($id);

        if (!$image) {
            return response()->json(['message' => 'Imagen no encontrada'], 404);
        }
        // Verificar la propiedad del usuario
        $collection = Collection::find($image->collection_id);
        if (!$collection || $collection->user_id != auth()->user()->id) {
            return response()->json(['message' => 'No tienes permiso para actualizar esta imagen'], 403);
        }
        // Realizar la actualización
        $image->title = $request->input('title');
        $image->details = $request->input('details');
        $image->path = $request->input('path');
        $image->disks = $request->input('disks');
        $image->collection_id = $request->input('collection_id');
        $image->create_time = $request->input('create_time');
        $image->save();
        return response()->json(['message' => 'Imagen actualizada correctamente'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Obtener la imagen
    $image = Imagenes::find($id);

    if (!$image) {
        return response()->json(['message' => 'Imagen no encontrada'], 404);
    }
    // Si todo está en orden, eliminar la imagen
    $image->delete();

    return response()->json(['message' => 'Imagen eliminada correctamente'], 200);
    }
}
