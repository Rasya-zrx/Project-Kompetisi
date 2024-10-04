<?php

namespace App\Http\Controllers;

use App\Models\Kompetisi;
use Illuminate\Http\Request;

class KompetisiController extends Controller
{
    public function index()
    { 
            $kompetisi = Kompetisi::all();
            $title = 'Kompetisi';
        return view('admin.kompetisi.list', compact('title', 'kompetisi'));
    }   

    public function store(Request $request)
    {
        Kompetisi::create([
            'nama_kompetisi' => $request->nama_kompetisi,
        ]);
        return redirect('/kompetisi')->with('success', 'Data Berhasil');
    }   

    public function update(Request $request, $id)
    {
            $nama = Kompetisi::find($id);
            $nama->update([
            'nama_kompetisi' => $request->nama_kompetisi,
        ]);
        return redirect('/kompetisi')->with('success', 'Data Berhasil');
    }

    public function destroy($id)
    {   
        $data = Kompetisi::find($id);
        $data->delete();
        return redirect('/kompetisi')->with('success', 'Data Berhasil');
    }
}
