<?php

namespace App\Http\Controllers;

use App\Models\juara;
use App\Models\kompetisi;
use App\Models\registrasi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;

class JuaraController extends Controller
{
    public function index()
    {
        $kompetisi = kompetisi::all();   
        return view('juara.list', compact('kompetisi'));
    }

    // public function lihatPeringkat()
    // {
    //     $title = 'Daftar Juara';
    //     $peringkat = juara::all();
    //     $registrasi = registrasi::all();
        
    //     return view('juara.peringkat', compact('title', 'peringkat', 'registrasi'));
        
    // }

    public function lihatjuara($kompetisi_id)
    {
        $title = 'Daftar Juara';
        $kompetisi = kompetisi::find($kompetisi_id);
        $registrasi = registrasi::where('kompetisi_id', $kompetisi_id)->get();

        $peringkat = [];

        foreach ($kompetisi->registrasi as $data) { 
            // dd($data->toArray());
            foreach ($data->juara as $juara) {
                // dd($juara->toArray());
                $peringkat[] = $juara;   
            }
        }

        return view('juara.peringkat', compact('title', 'kompetisi', 'registrasi', 'peringkat'));
    }
    


    public function store(Request $request)
    {
        $request->validate([    
            'registrasi_id' => 'required|exists:registrasi,id',
            'keterangan_peringkat' => 'required',
        ]);

        $cek = juara::where('registrasi_id', $request->registrasi_id)->first();
        if ($cek) {
            return redirect()->back()->with('error', 'User already registered at this competition');
        }


        juara::create([
            'registrasi_id' => $request->registrasi_id,
            'keterangan_peringkat' => $request->keterangan_peringkat,

        

        ]);
        return redirect()->back()->with('succes', 'Data user Berhasil Ditambah');
    }

    public function update(Request $request, $id)
    {
        juara::where('id', $id)->update([
            'registrasi_id' => $request->registrasi_id,
            'keterangan_peringkat' => $request->keterangan_peringkat,
        ]);
        return redirect('user')->with('success', 'Data Berhasil diupdate');
    }

    public function destroy($id)
    {
        $juara = juara::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Data Berhasil dihapus');
    }

    public function view_pdf()
        {
            $juara = juara::all();
            $pdf = PDF::loadview('juara.export', ['juara' => $juara]);
            return $pdf->download('juara.pdf');
        }
    
}
