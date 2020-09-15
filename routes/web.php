<?php

use Illuminate\Support\Facades\Route;



/*Route::get('/', function () {
    return view('app');
}); 
*/
Route::get('/', 'SinglePageController@index')->where('any', '.*');
//Route::resource('climax','ClimaApi');

Route::get('climax', 'ClimaApi@index');

Route::post('busqueda','ClimaApi@BusquedaApi');

Route::get('usuarioNombre','ClimaApi@UserName');

Route::get('datosInicio','ClimaApi@DatosInicio');

Route::post('imagenFile','Imagen@subida');


Route::get('prueba/clima', function () {
    $opts = array(
        'ssl' => array('ciphers'=>'RC4-SHA', 'verify_peer'=>false, 'verify_peer_name'=>false)
    );
    $params = array ('encoding' => 'UTF-8', 'verifypeer' => false, 'verifyhost' => false, 'trace' => 1, 'exceptions' => 1, "connection_timeout" => 180, 'stream_context' => stream_context_create($opts) );
    //$url = "http://www.webservicex.net/globalweather.asmx?WSDL";
    $urlLocal = 'localhost:8080/ws-myservice-app/ClimaPruebaWS?WSDL';
    $url = 'https://cvnet.cpd.ua.es/servicioweb/publicos/pub_gestdocente.asmx?wsdl';
    //$urlApi ="https://samples.openweathermap.org/data/2.5/weather?WSDL,q=London&mode=xml&appid=439d4b804bc8187953eb36d2a8c26a02";

    try{
        $client = new SoapClient($urlLocal,$params,['soap_version' => 2]);
        //return response($client);
        //return reponse($client->GetCitiesByCountry(['CountryName' => 'Mexico']));
        dd($client->GetCitiesByCountry(['CountryName' => 'Mexico'])->GetCitiesByCountryResult);
    }
    catch(SoapFault $fault) {
        echo '<br>'.$fault;
    }

});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
