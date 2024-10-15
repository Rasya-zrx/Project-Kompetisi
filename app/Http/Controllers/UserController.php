<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mpdf\Mpdf;
use Dompdf\Dompdf;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    public function users()
    {
     $users = User::paginate(10);
     $title = "Data User";
     Paginator::useBootstrapFour();
          
        return view('admin.users.datauser', compact('users', 'title'));
    }

    public function view_pdf()
    {
        $users = User::all();
        $pdf = PDF::loadview('admin.users.export', ['users' => $users]);
        return $pdf->download('users.pdf');
    }

    public function destroy($id)
    {
        $users = User::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Data Berhasil dihapus');
    }

    public function store(Request $request)
    {   
        // dd($request);
        $request->validate([    
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string'
        ]);
      User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => hash::make($request->password),
            'role' => $request->role,
        ]);
        // dd($user);
        return redirect('user')->with('succes', 'Data user Berhasil Ditambah');
    }

    public function update(Request $request, $id)
    {
       $user = User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);
        if ($request->password)
        {
          $user = User::where('id', $id)->update([
            'password' =>hash::make($request->password)
        ]);
        }
        return redirect('user')->with('success', 'Data Berhasil diupdate');
    }

}