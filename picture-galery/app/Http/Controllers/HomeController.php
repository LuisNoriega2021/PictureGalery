<?php

namespace App\Http\Controllers;
use App\Models\collections;
use App\Models\imagenes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = Auth::id();

        $collections = collections::where('state', 1)->get();
        $imagesByCollection = [];

        foreach ($collections as $collection) {
            $image = Imagenes::where('collection_id', $collection->id)->first();
            if ($image !== null) {
                $imageData = [
                    'title' => $image->title,
                    'details' => $image->details,
                    'path' => $image->path,
                    'disks' => $image->disks,
                    'collection_id' => $image->collection_id,
                    'users_id' => $collection->users_id,
                    'collection_title' => $collection->title,
                    'collection_details' => $collection->details,
                ];
                $imagesByCollection[] = $imageData;
            }
        }

        return view('home', [
            'user_id' => $user_id,
            'imagesByCollection' => $imagesByCollection
        ]);
    }
}
