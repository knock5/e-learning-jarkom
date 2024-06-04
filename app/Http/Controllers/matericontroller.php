<?php

namespace App\Http\Controllers;
use App\Models\kuis;
use App\Models\materi;
use Illuminate\Http\Request;

class matericontroller extends Controller
{
    //
    public function index()
    {
        $kuis = kuis::all();
        $materi = materi::all();
        return view('admin.materi.index', compact('materi','kuis'));
    }
}
