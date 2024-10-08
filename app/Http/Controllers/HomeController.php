<?php

namespace App\Http\Controllers;

use App\Models\kompetisi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

            $tittle ='homepage';
        
        $kompetisis = kompetisi::all();
        return view('layouts.home', compact('tittle', 'kompetisis'));

    }

}
