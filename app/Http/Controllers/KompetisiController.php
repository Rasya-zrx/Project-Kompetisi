<?php

namespace App\Http\Controllers;

use App\Models\Kompetisi;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KompetisiController extends Controller
{
    public function index()
    { 
            $kompetisi = Kompetisi::paginate(2);
            $title = 'Daftar Kompetisi';
            Paginator::useBootstrapFour();
        return view('admin.kompetisi.list', compact('title', 'kompetisi'));
    }   

    public function store(Request $request)
    {
        //  dd($request->all());
        if($request->hasFile('gambar')){
            $gambar = $request->file('gambar')->store('gambar', 'public');
        }
      
        Kompetisi::create([
            'nama_kompetisi' => $request->nama_kompetisi,
            'deskripsi' => $request->deskripsi,
            'tgl_kompetisi' => $request->tgl_kompetisi,
            'tgl_buka_regist' => $request->tgl_buka_regist,
            'tgl_tutup_regist' => $request->tgl_tutup_regist,
            'gambar' => $gambar ?? ''
        ]);
      
        return redirect('/kompetisi')->with('success', 'Data Berhasil');
    }   

    public function update(Request $request, $id)
    {
        $kompetisi = Kompetisi::find($id);

        if($request->hasFile('gambar')){
            if ($kompetisi->gambar){
                Storage::disk('public')->delete($kompetisi->gambar);
            }
            $gambar = $request->file('gambar')->store('gambar', 'public');
            
        }
        else{
            $gambar = $kompetisi->gambar;
        }

        $kompetisi->update([
            'nama_kompetisi' => $request->nama_kompetisi,
            'deskripsi' => $request->deskripsi,
           'tgl_kompetisi' => $request->tgl_kompetisi,
            'tgl_buka_regist' => $request->tgl_buka_regist,
            'tgl_tutup_regist' => $request->tgl_tutup_regist,  
            'gambar' => $gambar ?? ''
            ]);
        return redirect('/kompetisi')->with('success', 'Data Berhasil');
    }

    public function destroy($id)
    {   
        $kompetisi = Kompetisi::find($id);
        if ($kompetisi->gambar){
            Storage::disk('public')->delete($kompetisi->gambar);
        }
        $kompetisi->delete();
        return redirect('/kompetisi')->with('success', 'Data Berhasil');
    }
}
