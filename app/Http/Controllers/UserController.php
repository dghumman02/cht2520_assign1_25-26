<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    //
    function getuser(){
        return "Mughees";
    }

    function info(){
        return "Hello I am a BSCS student";
    }
    function getname($name){
        return "Hello, I am ".$name;
    }

    function show_admin_login_page(){
        if(View::exists('adminlogin')){
            return view('adminlogin');
        }
        else{
            return "View not found";
        }
    

    }
}
