<?php
declare(strict_types = 1);

namespace App\Services;

use GuzzleHttp\Client;
use Spatie\Geocoder\Geocoder;

class GeoCord
{

    /**
     * @param $address
     * @return null
     */
    public  function client(){
        $client = new Client();
        return new Geocoder($client);
    }

    public function getByAddress($address)
    {
        if (!is_null($address)) {

            return $this->client()->getCoordinatesForAddress($address, env('GOOGLE_MAPS_GEOCODING_API_KEY'));
        }
        return null;
    }

    public  function getLocationFromCoordinate($lat,$long){
        return $this->client()->getAddressForCoordinates($lat, $long);
    }

    /**
     * @param $ip
     * @return null
     */
    public function getByIpAddress($ip)
    {
        if (!is_null($ip)) {
            return app('geocoder')->geocode($ip)->get();
        }
        return null;
    }

}
