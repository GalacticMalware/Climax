<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class ClimaApi extends Controller
{
    public function index()
    {

        $prueba = '3531013,3516499,3531011,3483197,3483393,3514049,3514207,3514349,3514424,3514502,3514583,3514669,3514680,3514785,3514916,3515002,3515056,3515195,3515314';

        $key = env('API_KEY');

        $respuesta = Http::get('https://api.openweathermap.org/data/2.5/group?id=' . $prueba . '&units=metric&appid=' . $key);
        return response($respuesta['list']);
    }

    public function BusquedaApi(Request $request)
    {

        $pais = $request['pais'];

        $key = env('API_KEY');

        $respuesta = Http::get('https://api.openweathermap.org/data/2.5/weather?q='.$pais.'&appid='.$key);
        return response($respuesta);
    }

    public function UserName(){
        $nombre = Auth::user()->name;
        return response($nombre);
    }

    public function DatosInicio(){
        $key = env('API_KEY');
        $respuesta = Http::get('https://api.openweathermap.org/data/2.5/weather?q=Mexico&appid='.$key);
        return response($respuesta);
    }

}
