<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\users;
use App\Models\User;
use App\Models\skor;
use Illuminate\Support\Facades\Hash;
class akunkontroller extends Controller
{
    //
    public function index()
    {
        $akun = User::whereIn('level', ['dosen', 'user'])->get();
        return view('admin.akun.index', compact('akun'));
    }
    public function show()
    {
        return view ('admin.akun.insert');
    }
    public function tambah(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'level' => ['required', 'not_in:0'],
        ]);
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
        skor::where('ID_USER', $id)->delete();
        User::find($id)->delete();
        
    return redirect('/akun')->with('success', 'Data Berhasil Dihapus');  
    }
   

}
