<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Apicontroleer extends Controller
{
    //
 public function verificar(Request $request)
 {
    return csrf_token(); 
    //return '1';
    //dd($request);
 }
}
