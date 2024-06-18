<?php

namespace App\Http\Controllers;
use App\Models\kuis;
use App\Models\materi;
use App\Models\skor;
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
            'field1' => 'required|max:255',
            'GAMBAR_PRODUK' => 'required|file|mimes:pdf|max:2048',
            'foto_materi' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'question1' => 'required|max:255',
            'optionA1' => 'required|max:255',
            'optionB1' => 'required|max:255',
            'optionC1' => 'required|max:255',
            'correctAnswer1' => 'required|max:255',
            'question2' => 'required|max:255',
            'optionA2' => 'required|max:255',
            'optionB2' => 'required|max:255',
            'optionC2' => 'required|max:255',
            'correctAnswer2' => 'required|max:255',
            'question3' => 'required|max:255',
            'optionA3' => 'required|max:255',
            'optionB3' => 'required|max:255',
            'optionC3' => 'required|max:255',
            'correctAnswer3' => 'required|max:255',
            'question4' => 'required|max:255',
            'optionA4' => 'required|max:255',
            'optionB4' => 'required|max:255',
            'optionC4' => 'required|max:255',
            'correctAnswer4' => 'required|max:255',
            'question5' => 'required|max:255',
            'optionA5' => 'required|max:255',
            'optionB5' => 'required|max:255',
            'optionC5' => 'required|max:255',
            'correctAnswer5' => 'required|max:255',
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
        if ($request->hasFile('foto_materi')) {
            $fotoMateriName = time() . '_foto.' . $request->foto_materi->extension();
            $request->foto_materi->move(public_path('images'), $fotoMateriName);
            $materi->foto = $fotoMateriName; // Pastikan kolom ini ada di tabel materi
        }
    
        $materi->save();
    
        // Simpan data kuis
        $this->saveQuizzes($materi->ID_MATERI, $request);
    
        return redirect('/materi')->with('success', 'Data materi dan kuis berhasil ditambah.');
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
    
    public function lihat($id)
    {
        $kuis = Kuis::where('ID_MATERI', $id)->get();
        $materi = Materi::where('ID_MATERI',$id)->first();
        return view('admin.materi.edit',compact('materi','kuis'));
    }
    public function update(Request $request, $id)
    {
        // Validasi input form
        $request->validate([
            'field1' => 'required|string|max:255',
            'GAMBAR_PRODUK' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'question*' => 'required|string|max:255',
            'optionA*' => 'required|string|max:255',
            'optionB*' => 'required|string|max:255',
            'optionC*' => 'required|string|max:255',
            'correctAnswer*' => 'required|string|max:255',
        ]);

        // Update data materi
        $materi = Materi::find($id);
        $materi->NAMA_MATERI = $request->field1;

        if ($request->hasFile('GAMBAR_PRODUK')) {
            $imageName = time().'.'.$request->GAMBAR_PRODUK->extension();  
            $request->GAMBAR_PRODUK->move(public_path('images'), $imageName);
            $materi->GAMBAR_PRODUK = $imageName;
        }
        if ($request->hasFile('foto_materi')) {
            $fotoMateriName = time() . '_foto.' . $request->foto_materi->extension();
            $request->foto_materi->move(public_path('images'), $fotoMateriName);
            $materi->foto = $fotoMateriName; // Pastikan kolom ini ada di tabel materi
        }

        $materi->save();

        // Update data kuis
        $kuis = Kuis::where('ID_MATERI', $id)->get();
        foreach ($kuis as $index => $quiz) {
            $quiz->PERTANYAAN = $request->input("question" . ($index + 1));
            $quiz->JAWABANA = $request->input("optionA" . ($index + 1));
            $quiz->JAWABANB = $request->input("optionB" . ($index + 1));
            $quiz->JAWABANC = $request->input("optionC" . ($index + 1));
            $quiz->JAWABAN_BENAR = $request->input("correctAnswer" . ($index + 1));
            $quiz->save();
        }

        return redirect('materi')->with('success', 'Materi dan Kuis berhasil diperbarui');
    }
    public function hapus($id)
    {
        skor::where('ID_MATERI', $id)->delete();
        kuis::where('ID_MATERI',$id)->delete();
        materi::where('ID_MATERI',$id)->delete();
        
        return redirect('/materi')->with('Berhasil!', 'Data Materi dan kuis berhasil dihapus');
    }
}
