<?php

namespace App\Http\Controllers;

use App\Models\juara;
use App\Models\kompetisi;
use Illuminate\Http\Request;

class JuaraController extends Controller
{
    public function index()
    {
        $kompetisi = kompetisi::all();   
        return view('juara.list', compact('kompetisi'));
    }

    public function lihatPeringkat($id)
    {
        $title = 'Juara';
        $kompetisi = kompetisi::find($id);

        $regist = $kompetisi->registrasi;

        $peringkat = [];

        foreach ($regist as $data) { 
            // dd($data->toArray());
            foreach ($data->juara as $juara) {
                // dd($juara->toArray());
                $peringkat[] = $juara;   
            }
        }


        return view('juara.peringkat', compact('title', 'kompetisi', 'peringkat'));
        // dd($juara);

        // $juara = juara::where('kompetisi_id', $id)->get();
        // return view('admin.juara.peringkat', compact('title', 'kompetisi', 'juara'));
    }
    


    public function store(Request $request)
    {
        $request->validate([    
            'registrasi_id' => 'required',
            'keterangan_peringkat' => 'required',
        ]);

        $juara = juara::where('keterangan_peringkat', $request->keterangan_peringkat)->where('registrasi_id', $request->registrasi_id)->first();
        if (!$juara) {
            return redirect()->back()->with('error', 'User not found. Please register first');
        }


        juara::create([
            'registrasi_id' => $request->registrasi_id,
            'keterangan_peringkat' => $request->keterangan_peringkat,

        ]);
        return redirect()->back()->with('succes', 'Data user Berhasil Ditambah');
    }
}
