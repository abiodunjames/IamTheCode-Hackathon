<?php

namespace App\Http\Controllers;

use App\Incident;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public  function  index(){

    }

    public  function getDashboard(){
        $incident =Incident::all();
            return response(['status'=>true,'data'=>$incident]);
    }


}
