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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collection = collections::where('state',1)->get();
        $images = [];
            foreach ($collection as $result) {
        $image = Imagenes::where('collection_id',$result->id)->first();
        if ($image !== null) {
            $images[] = $image;
            }
        }
        //return view('home', compact('collection'));
        return view('home', ['image' => $images]);
    }

    //return response()->json(['images' => $images], 200);
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
        //$log->user_id = Auth::id();
        $log->user_id = $resultValidated['users_id'];
        $log->table_name = 'collections';
        $log->save();

        return response()->json($image, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $collection = collections::where('id',$id)->where('state',1)->first();
        if (!$collection) {
            return response()->json(['error' => 'No se encontro la coleccion.'], 403);
        }
        $image = Imagenes::where('collection_id',$collection['id'])->get();
        if (!$image) {
            return response()->json(['error' => 'No se encontro coincidencias.'], 403);
        }
        return response()->json($image);
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
