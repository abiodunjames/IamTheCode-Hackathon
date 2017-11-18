<?php
declare(strict_types = 1);


namespace App\Services;

 use Aloha\Twilio\Twilio;

 class Sms
{

 public static  $acct_idd ='ACffd25bb140a4fb747cdb7bb27ff36bd3';
 public static  $token='52e647d6adf825ed7bcdc8faf2797ddc';
 public static  $fromNumber="";

     /**
      * @return Twilio
      */
    public static  function Twilio(){
        return new Twilio(self::$acct_idd, self::$token, self::$fromNumber);
    }

}
