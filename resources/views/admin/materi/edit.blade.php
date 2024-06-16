@extends('admin.template.appadmin')

@section('content')
<style>
    #container {
        max-width: 600px;
        margin: auto;
    }

    .step-container {
        position: relative;
        text-align: center;
        transform: translateY(-43%);
    }

    .step-circle {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background-color: #fff;
        border: 2px solid #007bff;
        line-height: 30px;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 10px;
        cursor: pointer;
    }

    .step-line {
        position: absolute;
        top: 16px;
        left: 50px;
        width: calc(100% - 100px);
        height: 2px;
        background-color: #007bff;
        z-index: -1;
    }

    #multi-step-form {
        overflow-x: hidden;
    }
</style>

<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <h3 class="ml-3">Edit Materi</h3>
        <div class="py-1 ml-3">
            <a href="{{ url('materi') }}" class="btn btn-primary px-3"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
        </div>
        <div id="container" class="container mt-5">
            <div class="progress px-1" style="height: 3px;">
                <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="step-container d-flex justify-content-between">
                <div class="step-circle" onclick="displayStep(1)">1</div>
                <div class="step-circle" onclick="displayStep(2)">2</div>
            </div>

            <form action="{{ url('materi/update/' . $materi->ID_MATERI) }}" id="multi-step-form" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="step step-1">
                    <h3>Materi</h3>
                    <div class="mb-3">
                        <label for="field1">Judul Materi</label>
                        <input type="text" class="form-control" id="field1" name="field1" value="{{ $materi->NAMA_MATERI }}" placeholder="Masukkan judul materi">
                    </div>
                    <div class="input-group mb-3">
                        <button type="button" data-toggle="modal" data-target="#basicModal{{ $materi->ID_MATERI }}"><span class="input-group-text" id="basic-addon1">Detail materi</span></button>
                        <input type="file" class="form-control" name="GAMBAR_PRODUK" aria-label="Gambar Produk" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Gambar Materi</span>
                        <input type="file" class="form-control" name="foto_materi" value="{{ $materi->foto }}" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <button type="button" class="btn btn-primary next-step">Selanjutnya</button>
                    <div class="modal fade" id="basicModal{{$materi->ID_MATERI}}">
                                        <div class="modal-dialog modal-lg " role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Detail Materi</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    
                        <div class="card">
                            <div class="card-body">
                               
                            <div class="row align-items-center">
                                            
                                            <div class="col-12 ">
                                            <iframe src="{{ asset('/laraview/#../storage/' .$materi->ISI_MATERI ) }}" width="700px" height="500px"></iframe>
                                            </div>
                                        </div>
                                                    
                                                <div class="modal-footer">
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                            </div>
                                        </div>
                </div>
                </div>

                <div class="step step-2">
                    <h3>Kuis</h3>
                    @foreach ($kuis as $index => $quiz)
                    <div class="quiz-section">
                        <h5>Kuis {{ $index + 1 }}</h5>
                        <div class="mb-3">
                            <label for="question{{ $index + 1 }}">Pertanyaan</label>
                            <input type="text" class="form-control" id="question{{ $index + 1 }}" name="question{{ $index + 1 }}" value="{{ $quiz->PERTANYAAN }}" placeholder="Masukkan pertanyaan kuis">
                        </div>
                        <div class="mb-3">
                            <label for="optionA{{ $index + 1 }}">Jawaban A</label>
                            <input type="text" class="form-control" id="optionA{{ $index + 1 }}" name="optionA{{ $index + 1 }}" value="{{ $quiz->JAWABANA }}" placeholder="Pilihan A">
                        </div>
                        <div class="mb-3">
                            <label for="optionB{{ $index + 1 }}">Jawaban B</label>
                            <input type="text" class="form-control" id="optionB{{ $index + 1 }}" name="optionB{{ $index + 1 }}" value="{{ $quiz->JAWABANB }}" placeholder="Pilihan B">
                        </div>
                        <div class="mb-3">
                            <label for="optionC{{ $index + 1 }}">Jawaban C</label>
                            <input type="text" class="form-control" id="optionC{{ $index + 1 }}" name="optionC{{ $index + 1 }}" value="{{ $quiz->JAWABANC }}" placeholder="Pilihan C">
                        </div>
                        <div class="mb-3">
                            <label for="correctAnswer{{ $index + 1 }}">Jawaban Benar</label>
                            <input type="text" class="form-control" id="correctAnswer{{ $index + 1 }}" name="correctAnswer{{ $index + 1 }}" value="{{ $quiz->JAWABAN_BENAR }}" placeholder="Jawaban Benar">
                        </div>
                    </div>
                    <hr>
                    @endforeach

                    <button type="button" class="btn btn-primary prev-step">Sebelumnya</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    var currentStep = 1;

    function displayStep(stepNumber) {
        if (stepNumber >= 1 && stepNumber <= 2) {
            $(".step").hide();
            $(".step-" + stepNumber).show();
            currentStep = stepNumber;
            updateProgressBar();
        }
    }

    $(document).ready(function() {
        $('#multi-step-form .step').hide();
        $('#multi-step-form .step-1').show();

        $(".next-step").click(function() {
            if (currentStep < 2) {
                $(".step-" + currentStep).addClass("animate__animated animate__fadeOutLeft");
                currentStep++;
                setTimeout(function() {
                    $(".step").removeClass("animate__animated animate__fadeOutLeft").hide();
                    $(".step-" + currentStep).show().addClass("animate__animated animate__fadeInRight");
                    updateProgressBar();
                }, 500);
            }
        });

        $(".prev-step").click(function() {
            if (currentStep > 1) {
                $(".step-" + currentStep).addClass("animate__animated animate__fadeOutRight");
                currentStep--;
                setTimeout(function() {
                    $(".step").removeClass("animate__animated animate__fadeOutRight").hide();
                    $(".step-" + currentStep).show().addClass("animate__animated animate__fadeInLeft");
                    updateProgressBar();
                }, 500);
            }
        });

        function updateProgressBar() {
            var progressPercentage = ((currentStep - 1) / 1) * 100;
            $(".progress-bar").css("width", progressPercentage + "%");
        }
    });
</script>
@endsection
