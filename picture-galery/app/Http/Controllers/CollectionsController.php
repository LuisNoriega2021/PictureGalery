<?php

namespace App\Http\Controllers;

use App\Models\collections;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\imagenes;
use Illuminate\Support\Facades\Auth;
use App\Models\logs;
use View;

class CollectionsController extends Controller
{
    public function index()
{
    $user_id = Auth::id();
    return view('collections', ['user_id' => $user_id]);
}

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
        $user_id = Auth::id();

        $images = Imagenes::where('collection_id', $id)->get();
       // return view('collections', ['collection_id' => $images]);
       return view('collections', [
        'collection_id' => $images,
        'user_id' => $user_id
    ]);
    }


    public function edit(collections $collection)
    {
        //
    }

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
        $log->user_id = Auth::id();
        $log->user_id = $resultValidated['users_id'];
        $log->table_name = 'collections';
        $log->save();

        return response()->json($collection);
    }

    public function destroy($id, $users)
    {
        $collection = Collections::where('users_id', $users)->where('id', $id)->first();
        if (!$collection) {
            return response()->json(['error' => 'No tienes permiso para eliminar esta coleccion'], 403);
        }
        $collection->delete();
        $log = new logs();
        $log->details = 'delete ' . $id;
        //$log->user_id = Auth::id();
        $log->user_id = $users;
        $log->table_name = 'collections';
        $log->save();

        return redirect()->route('home');
    }
}
