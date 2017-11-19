<?php

namespace App\Http\Controllers;

use App\Incident;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public  function  index(){
        return view('page.dashboard');
    }

    public  function getDashboard(){
        $incident =Incident::all();
            return response(['status'=>true,'data'=>$incident]);
    }
    public  function login(){
        return view('auth.login');
    }




}
