@extends('user.template.appuser')

@section('title', 'Halaman Kuis')
@section('content')
<style>
    .form-check-input[type="radio"] {
        display: none;
    }

    .form-check-label {
        display: flex;
        align-items: center;
        cursor: pointer;
        padding: 10px;
        border: 2px solid #ccc;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .form-check-input[type="radio"]:checked + .form-check-label {
        border-color: #007bff;
        background-color: #e7f1ff;
    }

    .form-check-label .option-box {
        width: 40px;
        height: 40px;
        border: 2px solid #007bff;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 10px;
        font-weight: bold;
        color: #007bff;
    }

    .form-check-input[type="radio"]:checked + .form-check-label .option-box {
        background-color: #007bff;
        color: white;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <h2><a href="{{ url('/pdf/'.$kuis->first()->ID_MATERI) }}" class="btn btn-primary px-3"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a></h2>
        <div class="col-12">
            <form action="{{url('submit/'.$kuis->first()->ID_MATERI)}}" method="POST">
                @csrf
                @foreach($kuis as $index => $k)
                <div class="card">
              
                    <div class="card-body">
                        <h4 class="card-title">{{ $index + 1 }}. {{ $k->PERTANYAAN }}</h4>

                        @php
                            // Ambil jawaban yang benar dari database
                            $correctAnswer = $k->JAWABAN_BENAR;

                            // Buat array semua jawaban
                            $answers = [
                                'A' => $k->JAWABANA,
                                'B' => $k->JAWABANB,
                                'C' => $k->JAWABANC,
                                'D' => $correctAnswer,
                            ];

                            // Acak urutan jawaban
                            $shuffledAnswers = collect($answers)->shuffle()->toArray();
                            // Buat array untuk urutan huruf (A, B, C, D)
                            $optionLetters = array_keys($answers);
                        @endphp

                        @foreach($shuffledAnswers as $option => $answer)
                        <h1></h1>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answers[{{ $k->ID_QUIZ }}]" id="option{{ $optionLetters[$loop->index] }}{{ $k->ID_QUIZ }}" value="{{ $answer }}">
                            <label class="form-check-label" for="option{{ $optionLetters[$loop->index] }}{{ $k->ID_QUIZ }}">
                                <div class="option-box">{{ $optionLetters[$loop->index] }}</div>
                                {{ $answer }}
                            </label>
                        </div>
                        @endforeach
                        
                    </div>
                </div> 
                @endforeach
                <button type="submit" class="btn btn-primary mt-3">Kirim Jawaban</button>
            </form>
        </div>
    </div>
</div>

@endsection
