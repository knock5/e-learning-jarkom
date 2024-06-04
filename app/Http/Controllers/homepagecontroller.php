<?php

namespace App\Http\Controllers;
use App\Models\materi;
use App\Models\kuis;
use App\Models\skor;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class homepagecontroller extends Controller
{
    //
    public function index()
    {
        $materi = materi::all();  
        return view('user.kursus', compact('materi'));
    }
    public function pdf( $id)
    {
        // $pdf = 'file/materi1.pdf';
        $skor = skor::where('ID_MATERI', $id)->get();
        $pdf = materi::find($id);
        return view('user.pdf', compact('pdf','skor'));
    }
    public function kuis($id)
    {
        $kuis = kuis::where('ID_MATERI', $id)->get();
        return view('user.kuis' , compact('kuis'));
    }
    public function submitKuis(Request $request, string $id)
    {
        $questions = kuis::where('ID_MATERI', $id)->get();
        $answers = $request->answers;
        $score = 0;
        $pointsPerQuestion = 20;
        foreach ($questions as $question) {
            if (isset($answers[$question->ID_QUIZ])) {
                $selectedAnswer = $answers[$question->ID_QUIZ];
                $correctAnswer = $question->JAWABAN_BENAR;
                // Cek apakah jawaban yang dipilih sama dengan jawaban benar
                if (trim($selectedAnswer) == trim($correctAnswer)) {
                    $score += $pointsPerQuestion;
                }
            }
        }
        

        $correctAnswersCount = $score / $pointsPerQuestion;
        $message = "Anda menjawab benar $correctAnswersCount dari " . count($questions) . " pertanyaan. Skor anda adalah $score.";
        $skor = skor::create([
            'ID_AKUN' => 1,
            'ID_MATERI' =>  $id,
            'SKOR' => $score,
            'soal'=>count($questions),
        ]);
        Alert::alert('SKOR', $message,);

        return redirect('pdf/'.$id);
    }

}
