<?php

namespace App\Http\Controllers;

class FrontController extends Controller
{


    public function __construct()
    {
    }

    public function index()
    {
        return redirect('/admin');
    }


}
