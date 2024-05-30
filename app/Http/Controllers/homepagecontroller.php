<?php

namespace App\Http\Controllers;
use App\Models\materi;
use Illuminate\Http\Request;

class homepagecontroller extends Controller
{
    //
    public function index()
    {
        $materi = materi::all();  
        return view('user.kursus', compact('materi'));
    }
    public function pdf()
    {
        $pdf = 'file/materi1.pdf';
        return view('user.pdf', compact('pdf'));
    }
}
