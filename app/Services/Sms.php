<?php
declare(strict_types = 1);


namespace App\Services;

 use Aloha\Twilio\Twilio;

 class Sms
{


 public static  $fromNumber="";
     /**
      * @return Twilio
      */
    public static  function Twilio(){
        return new Twilio(env('TWILIO_SID'), env('TWILIO_KEY'), self::$fromNumber);
    }

}
