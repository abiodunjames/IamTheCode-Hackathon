<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @param Request $request
     * @return void
     */
    public  function getUssD(Request $request){
        $from =$request->from;
        $body =$request->body;
        $city =isset($request->FromCity)?$request->FromCity:null;

        $state =$request->FromState;

    }

    public  function  getGeoCoordinateFromAddress(){}

}
