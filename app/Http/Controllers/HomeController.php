<?php

namespace App\Http\Controllers;

use App\Models\kompetisi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $title ='homepage';     
        $kompetisi = kompetisi::all();
       
        return view('layouts.home', compact('title', 'kompetisi'));

    }

}
