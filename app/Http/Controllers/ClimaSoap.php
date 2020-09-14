<?php
namespace App\Http\Controllers;


class ClimaSoap extends BaseSoapController
{
    private $service;

    public function BienesServicios(){
        try {
            self::setWsdl('http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl');
            $this->service = InstanceSoapClient::init();

            $paisCode = 'MX';
            $numero = '47458714';

            $params = [
                'paisCode' => request()->input('paisCode') ? request()->input('paisCode') : $paisCode,
                'numero'   => request()->input('numero') ? request()->input('numero') : $numero
            ];
            $response = $this->service->checkVat($params);
            return view ('bienes-servicios-soap', compact('response'));
        }
        catch(\Exception $e) {
            return $e->getMessage();
        }
    }

    public function clima(){
        try {
            self::setWsdl('http://www.webservicex.net/globalweather.asmx?WSDL');
            $this->service = InstanceSoapClient::init();

            $cities = $this->service->GetCitiesByCountry(['CountryName' => 'Peru']);
            $ciudades = $this->loadXmlStringAsArray($cities->GetCitiesByCountryResult);
            dd($ciudades['Table'][1]);
        }
        catch(\Exception $e) {
            return $e->getMessage();
        }
    }
}
