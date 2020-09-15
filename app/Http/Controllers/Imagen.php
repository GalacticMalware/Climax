<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class Imagen extends Controller
{
    
    public function subida(Request $request){
        /*$imagen =*/ return $request->file('file')->store('public');
        
        //$url = Storage::url($imagen);

    }
}
