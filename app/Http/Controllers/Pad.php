<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pad extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('newexpediente');
    }
    public function controlexpedientes()
    {
        return view('controlexpediente');
    }
    public function reporteexpediente()
    {
        return view('reporteexpediente');
    }

    
}
