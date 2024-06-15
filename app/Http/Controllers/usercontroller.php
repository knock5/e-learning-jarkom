<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\users;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class usercontroller extends Controller
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
    public function tambah()
    {
        $akun = users::all();
        return view('admin.akun.index', compact('akun'));
        // $akun  = new User;
        // $akun->name = $request->name;
        // $akun->email = $request->email;
        // $akun->password = Hash::make($request->password);
        // $akun->level = $request->level;
        // $akun->save();
        // return redirect('/akun')->with('success', 'Data Berhasil');
    }
}
