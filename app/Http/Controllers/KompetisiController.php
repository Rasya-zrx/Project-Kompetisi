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
        //  dd($request->all());
        Kompetisi::create([
            'nama_kompetisi' => $request->nama_kompetisi,
            'deskripsi' => $request->deskripsi,
            'tgl_kompetisi' => $request->tgl_kompetisi,
            'tgl_buka_regist' => $request->tgl_buka_regist,
            'tgl_tutup_regist' => $request->tgl_tutup_regist,
            // 'gambar' => $request->gambar    
        ]);
        return redirect('/kompetisi')->with('success', 'Data Berhasil');
    }   

    public function update(Request $request, $id)
    {
        Kompetisi::where('id', $id)
        ->where('id', $id)
        ->update([
            'nama_kompetisi' => $request->nama_kompetisi,
            'deskripsi' => $request->deskripsi,
           'tgl_kompetisi' => $request->tgl_kompetisi,
            'tgl_buka_regist' => $request->tgl_buka_regist,
            'tgl_tutup_regist' => $request->tgl_tutup_regist,           
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
