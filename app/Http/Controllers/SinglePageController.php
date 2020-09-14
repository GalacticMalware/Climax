<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class SinglePageController extends Controller
{
    public function index() {

        return view('app');
        
    }
}
