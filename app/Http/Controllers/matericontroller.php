<?php

namespace App\Http\Controllers;
use App\Models\kuis;
use App\Models\materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class matericontroller extends Controller
{
    //
    public function index()
    {
        $kuis = kuis::all();
        $materi = materi::all();
        return view('admin.materi.index', compact('materi','kuis'));
    }
    public function show()
    {
        return view('admin.materi.insert');
    }
    public function insert(Request $request)
    {
        $request->validate([
            'field1' => 'required|string|max:255',
            'GAMBAR_PRODUK' => 'required|file|mimes:pdf|max:2048',
            'question1' => 'required|string|max:255',
            'optionA1' => 'required|string|max:255',
            'optionB1' => 'required|string|max:255',
            'optionC1' => 'required|string|max:255',
            'correctAnswer1' => 'required|string|max:255',
            'question2' => 'required|string|max:255',
            'optionA2' => 'required|string|max:255',
            'optionB2' => 'required|string|max:255',
            'optionC2' => 'required|string|max:255',
            'correctAnswer2' => 'required|string|max:255',
            'question3' => 'required|string|max:255',
            'optionA3' => 'required|string|max:255',
            'optionB3' => 'required|string|max:255',
            'optionC3' => 'required|string|max:255',
            'correctAnswer3' => 'required|string|max:255',
            'question4' => 'required|string|max:255',
            'optionA4' => 'required|string|max:255',
            'optionB4' => 'required|string|max:255',
            'optionC4' => 'required|string|max:255',
            'correctAnswer4' => 'required|string|max:255',
            'question5' => 'required|string|max:255',
            'optionA5' => 'required|string|max:255',
            'optionB5' => 'required|string|max:255',
            'optionC5' => 'required|string|max:255',
            'correctAnswer5' => 'required|string|max:255',
        ]);
    
        // Simpan data materi
        $materi = new Materi(); // Sesuaikan dengan model yang Anda gunakan
        $materi->NAMA_MATERI = $request->input('field1');
    
        if ($request->hasFile('GAMBAR_PRODUK')) {
            $photo = $request->file('GAMBAR_PRODUK');
            $extension = $photo->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $photo->move(storage_path('app/public/'), $fileName);
    
            // Simpan data materi ke database
            $materi->ISI_MATERI = $fileName;
        }
    
        $materi->save();
    
        // Simpan data kuis
        $this->saveQuizzes($materi->ID_MATERI, $request);
    
        return redirect('/materi')->with('success', 'Data berhasil diunggah.');
    }
    
    private function saveQuizzes($materiId, Request $request)
    {
        for ($i = 1; $i <= 5; $i++) {
            $quiz = new Kuis(); // Sesuaikan dengan model yang Anda gunakan
            $quiz->ID_MATERI = $materiId;
            $quiz->PERTANYAAN = $request->input("question$i");
            $quiz->JAWABANA = $request->input("optionA$i");
            $quiz->JAWABANB = $request->input("optionB$i");
            $quiz->JAWABANC = $request->input("optionC$i");
            $quiz->JAWABAN_BENAR = $request->input("correctAnswer$i");
            $quiz->save();
        }
    }
    
    
}
