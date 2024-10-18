<?php

namespace App\Http\Controllers;

use App\Models\kompetisi;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title ='Slebew Competition';     
        $kompetisi = kompetisi::all();
        $jumlahuser = User::count();
        $jumlahkompe = kompetisi::count();
       
        return view('layouts.home', compact('title', 'kompetisi', 'jumlahkompe', 'jumlahuser'));
    }

}
