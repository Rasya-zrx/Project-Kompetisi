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
        $users = User::all();
        $jumlahuser = User::count();
       
        return view('layouts.home', compact('title', 'kompetisi', 'users', 'jumlahuser'));
    }

}
