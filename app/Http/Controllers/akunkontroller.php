<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\users;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class akunkontroller extends Controller
{
    //
    public function index()
    {
        $akun = users::all();
        return view('admin.akun.index', compact('akun'));
    }
    public function show()
    {
        return view ('admin.akun.insert');
    }
    public function tambah(Request $request)
    {
        // $akun = users::all();
        // return view('admin.akun.pp', compact('akun'));
        $akun  = new users;
        $akun->name = $request->name;
        $akun->email = $request->email;
        $akun->password = Hash::make($request->password);
        $akun->level = $request->level;
        $akun->save();
        return redirect('/akun')->with('success', 'Data Berhasil');
    }
    public function hapus($id)
    {
        $akun = User::find($id);

        if ($akun) {
            // Hapus semua skor terkait jika ada
            $akun->skors()->delete();

            // Hapus akun
            $akun->delete();

            return redirect('/akun')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect('/akun')->with('error', 'Data Tidak Ditemukan');
        }
    }
   

}
