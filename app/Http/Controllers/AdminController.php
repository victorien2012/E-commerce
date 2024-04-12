<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(){
        return view('dashbord.admin');

    }

    public function login(){
        return view('dashbord.login');

    }


    public function validation(){
        return view('dashbord.validation');

    }


    public function datatable(){
        return view('dashbord.data-table');
    }
}
