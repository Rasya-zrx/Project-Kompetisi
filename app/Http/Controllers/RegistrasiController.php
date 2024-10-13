<?php

namespace App\Http\Controllers;

use App\Models\kompetisi;
use App\Models\registrasi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class RegistrasiController extends Controller
{
    public function index()
    {
        $title = 'Form Registrasi';
        $kompetisi = kompetisi::all();

        return view('pendaftaran.registrasi', compact('title', 'kompetisi'));
    }

    public function list()
    {
        $registrasi = registrasi::paginate(5);
        $title = 'Data Registrasi';
        Paginator::useBootstrapFour();
        return view('pendaftaran.list', compact('title', 'registrasi'));
    }

    public function destroy($id)
    {
        $registrasi = registrasi::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Data Berhasil dihapus');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'id_kompetisi' => 'required|string|max:255',
        ]);

        $user = user::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'User not found. Please register first');
        }

        $cekregist = registrasi::where('user_id', $user->id)->where('kompetisi_id', $request->id_kompetisi)->first();
        if ($cekregist) {
            return redirect()->back()->with('error', 'User already registered at this competition');
        }

        $registrasi = registrasi::create([
            'user_id' => $user->id,
            'kompetisi_id' => $request->id_kompetisi,
            'tgl_registrasi' => Carbon::now(),
        ]);
        return redirect('/home')->with('success', 'Registrasi Berhasil');
    }
}
