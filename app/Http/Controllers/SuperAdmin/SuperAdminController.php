<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class SuperAdminController extends Controller
{


    public function index()
    {
        // \Session::put('url.intended',\Request::fullUrl());
        
        return view('superadmin-login');
    }

}
