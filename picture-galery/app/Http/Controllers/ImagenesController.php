<?php

namespace App\Http\Controllers;

use App\Models\imagenes;
use App\Models\collections;
use App\Models\logs;
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
            'title' => 'required|max:50',
            'details' => 'required|string',
            'path' => 'required',
            'disks' => 'required',
            'collection_id' => 'nullable|uuid',
            'create_time' => 'nullable|date',
        ]);

        $loteMessage = [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute no debe exceder :max caracteres.',
            'string' => 'El campo :attribute debe ser una cadena de texto.',
            'date' => 'El campo :attribute debe ser una fecha válida.',
            'uuid' => 'El campo :attribute debe ser un UUID válido.',
        ];

        $resultValidated = array_merge($images, $request->validate([], $loteMessage));
        $resultValidated['id'] = Str::uuid();
        $image = imagenes::create($resultValidated);

        $log = new logs();
        $log->details = 'insert ' . $image['id'];
        //$log->user_id = Auth::id();
        $log->user_id = $resultValidated['collection_id'];
        $log->table_name = 'imagenes';
        $log->save();

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
        $rules = [
            'title' => 'required|max:50',
            'details' => 'required|string',
            'path' => 'required',
            'disks' => 'required',
            'collection_id' => 'nullable|uuid',
            'create_time' => 'nullable|date',
        ];
        $loteMessage = [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute no debe exceder :max caracteres.',
            'string' => 'El campo :attribute debe ser una cadena de texto.',
            'date' => 'El campo :attribute debe ser una fecha válida.',
            'uuid' => 'El campo :attribute debe ser un UUID válido.',
        ];
        $resultValidated = $request->validate($rules, $loteMessage);

        $data = $request->json()->all();
        $collection = Collections::where('users_id', $data['user_collection_id'])
        ->first();
           if (!$collection) {
               return response()->json(['error' => 'No tienes permiso para actualizar esta imagen.'], 403);
           }

           $image = Imagenes::where('id',$id)->first();
           if (!$image) {
            return response()->json(['error' => 'No existe la imagen o no tienes permiso para actualizar las imagenes de la coleccion.'], 403);
            }
            $filteredCollection = $collection->where('id', $image['collection_id'])->get();
            if (!$filteredCollection->isEmpty()) {
                $image->title = $resultValidated['title'];
                $image->details = $resultValidated['details'];
                $image->path = $resultValidated['path'];
                $image->disks = $resultValidated['disks'];
                $image->collection_id = $resultValidated['collection_id'];
                $image->create_time = $resultValidated['create_time'];
                $image->save();

                $log = new logs();
                $log->details = 'update ' . $image['id'];
                //$log->user_id = Auth::id();
                $log->user_id = $collection['users_id'];
                $log->table_name = 'imagenes';
                $log->save();

                return response()->json(['message' => 'Imagen actualizada exitosamente.']);
            } else {
                return response()->json(['error' => 'No tienes permiso para actualizada esta imagenes.'], 403);
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id, $users)
    {
    $collection = Collections::where('users_id', $users)->get();
    if (!$collection || $collection ->isEmpty()) {
        return response()->json(['error' => 'No tienes permiso para eliminar esta imagen.'], 403);
    }
    $image = Imagenes::where('id',$id)->first();
    if (!$image) {
        return response()->json(['message' => 'Imagen no encontrada'], 404);
    }
    $filteredCollection = $collection->where('id', $image['collection_id']);
    if(!$filteredCollection)
    {
        return response()->json(['error' => 'No tienes permiso para eliminar esta imagen.'], 403);
    }
    $image->delete();

    $log = new logs();
    $log->details = 'delete ' . $id;
    //$log->user_id = Auth::id();
    $log->user_id = $users;
    $log->table_name = 'imagenes';
    $log->save();

    return response()->json(['message' => 'Imagen eliminada correctamente'], 200);
    }
}
