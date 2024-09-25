<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = array(
            'tittle' => 'homepage'
        );
        return view('layouts.app', $data);
    }
}
