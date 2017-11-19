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
        $incident =Incident::orderBy('created_at','desc')->get();
            return response(['status'=>true,'data'=>$incident]);
    }
    public  function login(){
        return view('auth.login');
    }




}
