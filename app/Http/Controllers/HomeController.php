<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      
        if (auth()->user()->level == 'admin') {
            return redirect('/akun');
        } elseif (auth()->user()->level == 'dosen') {
            // Logika untuk user
            return redirect('/materi');
        
        }elseif (auth()->user()->level == 'user') {
            // Logika untuk user
            return redirect('/');
        
        } else {
            return redirect('/login');
        }
        
    }
}
