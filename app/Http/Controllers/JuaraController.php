<?php

namespace App\Http\Controllers;

use App\Models\juara;
use Illuminate\Http\Request;

class JuaraController extends Controller
{
    public function index()
    {
        $juara = juara::all();
        $title = 'Juara';
        return view('admin.juara.list', compact('title', 'juara'));
    }
}
