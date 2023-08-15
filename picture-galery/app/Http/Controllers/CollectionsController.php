<?php

namespace App\Http\Controllers;

use App\Models\collections;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\imagenes;
use Illuminate\Support\Facades\Auth;
use App\Models\logs;

class CollectionsController extends Controller
{
    public function index()
{
    $collections = collections::where('state', 1)->get();
    $imagesByCollection = [];

    foreach ($collections as $collection) {
        $image = Imagenes::where('collection_id', $collection->id)->first();
        if ($image !== null) {
            $imageData = [
                'title' => $image->title,
                'details' => $image->details,
                'path' => $image->path,
                'disks'=> $image->disks,
                'collection_id'=> $image->collection_id,
                'users_id'=> $collection->users_id,
                'collection_title' => $collection->title,
                'collection_details' => $collection->details,
            ];
            $imagesByCollection[] = $imageData;
        }
    }
    return view('home', ['imagesByCollection' => $imagesByCollection]);
}

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|string|max:50',
            'details' => 'required|string',
            'users_id' => 'required',
            'state' => 'required',
            'create_time' => 'nullable|date',
        ];

        $loteMessage = [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute no debe exceder :max caracteres.',
            'string' => 'El campo :attribute debe ser una cadena de texto.',
            'date' => 'El campo :attribute debe ser una fecha válida.',
        ];

        $resultValidated = $request->validate($rules, $loteMessage);

        $resultValidated['id'] = Str::uuid();
        $image = collections::create($resultValidated);

        $log = new logs();
        $log->details = 'insert ' . $image['id'];
        $log->user_id = $resultValidated['users_id'];
        $log->table_name = 'collections';
        $log->save();

        return response()->json($image, 201);
    }


    public function show($id)
    {
        $images = Imagenes::where('collection_id', $id)->get();
        return view('collections', ['collection_id' => $images]);
    }


    // $collections = collections::where('state', 1)->get();
    // $imagesByCollection = [];

    // foreach ($collections as $collection) {
    //     $image = Imagenes::where('collection_id', $collection->id)->first();
    //     if ($image !== null) {
    //         $imagesByCollection[] = $image;
    //     }
    // }

    // return view('home', ['imagesByCollection' => $imagesByCollection]);
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

        $rules = [
            'title' => 'required|string|max:255',
            'details' => 'required|string',
            'create_time' => 'nullable|date',
            'users_id' => 'required',
            'state' => 'required',
        ];

        $loteMessage = [
            'required' => 'El campo :attribute es obligatorio.',
            'string' => 'El campo :attribute debe ser una cadena de texto.',
            'max' => 'El campo :attribute no debe exceder :max caracteres.',
            'date' => 'El campo :attribute debe ser una fecha válida.',
        ];
        $resultValidated = $request->validate($rules, $loteMessage);

        $data = $request->json()->all();
        $collection = Collections::where('users_id', $data['users_id'])->where('id', $id)->first();
        if (!$collection) {
            return response()->json(['error' => 'No tienes permiso para eliminar esta coleccion.'], 403);
        }
        $collection->title = $resultValidated['title'];
        $collection->details = $resultValidated['details'];
        $collection->create_time = $resultValidated['create_time'];
        $collection->users_id = $resultValidated['users_id'];
        $collection->state = $resultValidated['state'];
        $collection->save();

        $log = new logs();
        $log->details = 'update ' . $collection['id'];
        //$log->user_id = Auth::id();
        $log->user_id = $resultValidated['users_id'];
        $log->table_name = 'collections';
        $log->save();

        return response()->json($collection);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, $users)
    {
        $collection = Collections::where('users_id', $users)->where('id', $id)->first();
        if (!$collection) {
            return response()->json(['error' => 'No tienes permiso para eliminar esta coleccion.'], 403);
        }
        $collection->delete();
        $log = new logs();
        $log->details = 'delete ' . $id;
        //$log->user_id = Auth::id();
        $log->user_id = $users;
        $log->table_name = 'collections';
        $log->save();

        return response()->json(['message' => 'Coleccion eliminada correctamente'], 200);
    }
}
