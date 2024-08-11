<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PharmacyOwnerController extends Controller
{
    public function index(){
        return view('auth.register');
    }
}
