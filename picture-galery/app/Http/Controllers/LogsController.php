<?php

namespace App\Http\Controllers;

use App\Models\logs;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $logData = $request->all();
        $log = logs::create($logData);
        return response()->json($log, 201);
    }
}
