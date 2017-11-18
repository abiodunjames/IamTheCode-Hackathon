<?php
declare(strict_types = 1);


namespace App\Services;

 class GeoCord
{

     /**
      * @param $address
      * @return null
      */
    public  function getByAddress($address){
        if(!is_null($address)){
           return app('geocoder')->geocode($address)->get();
        }
        return null;
    }
     /**
      * @param $ip
      * @return null
      */
    public  function  getByIpAddress($ip){
        if(!is_null($ip)){
            return app('geocoder')->geocode($ip)->get();
        }
        return null;
    }

 }
