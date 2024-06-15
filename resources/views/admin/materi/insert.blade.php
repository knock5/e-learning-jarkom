@extends('admin.template.appadmin')

@section('content')
<style>
    #container {
        max-width: 600px;  
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
        <h3 class="ml-3 ">Tambah Materi</h3>
        <div class="py-1 ml-3">
        <a href="{{url('materi')}}" class="btn btn-primary  px-3"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
        </div>
        <div id="container" class="container mt-5">
            <div class="progress px-1" style="height: 3px;">
                <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="step-container d-flex justify-content-between">
                <div class="step-circle" onclick="displayStep(1)">1</div>
                <div class="step-circle" onclick="displayStep(2)">2</div>
            </div>

            <form action="{{url('materi/insert')}}" id="multi-step-form" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="step step-1">
                    <h3>Materi</h3>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="field1" name="field1" placeholder="Masukkan judul materi">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">File Materi .pdf</span>
                        <input type="file" class="form-control" name="GAMBAR_PRODUK" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Gambar Materi</span>
                        <input type="file" class="form-control" name="foto_materi" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <button type="button" class="btn btn-primary next-step">Selanjutnya</button>
                </div>

                <div class="step step-2">
                    <h3>Kuis</h3>
                    <!-- Quiz 1 -->
                    <div class="quiz-section">
                        <h5>Kuis 1</h5>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="question1" name="question1" placeholder="Masukkan pertanyaan kuis">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="optionA1" name="optionA1" placeholder="Pilihan A">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="optionB1" name="optionB1" placeholder="Pilihan B">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="optionC1" name="optionC1" placeholder="Pilihan C">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="correctAnswer1" name="correctAnswer1" placeholder="Jawaban Benar">
                        </div>
                    </div>
                    <hr>

                    <!-- Quiz 2 -->
                    <div class="quiz-section">
                        <h5>Kuis 2</h5>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="question2" name="question2" placeholder="Masukkan pertanyaan kuis">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="optionA2" name="optionA2" placeholder="Pilihan A">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="optionB2" name="optionB2" placeholder="Pilihan B">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="optionC2" name="optionC2" placeholder="Pilihan C">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="correctAnswer2" name="correctAnswer2" placeholder="Jawaban Benar">
                        </div>
                    </div>
                    <hr>

                    <!-- Quiz 3 -->
                    <div class="quiz-section">
                        <h5>Kuis 3</h5>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="question3" name="question3" placeholder="Masukkan pertanyaan kuis">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="optionA3" name="optionA3" placeholder="Pilihan A">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="optionB3" name="optionB3" placeholder="Pilihan B">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="optionC3" name="optionC3" placeholder="Pilihan C">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="correctAnswer3" name="correctAnswer3" placeholder="Jawaban Benar">
                        </div>
                    </div>
                    <hr>

                    <!-- Quiz 4 -->
                    <div class="quiz-section">
                        <h5>Kuis 4</h5>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="question4" name="question4" placeholder="Masukkan pertanyaan kuis">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="optionA4" name="optionA4" placeholder="Pilihan A">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="optionB4" name="optionB4" placeholder="Pilihan B">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="optionC4" name="optionC4" placeholder="Pilihan C">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="correctAnswer4" name="correctAnswer4" placeholder="Jawaban Benar">
                        </div>
                    </div>
                    <hr>

                    <!-- Quiz 5 -->
                    <div class="quiz-section">
                        <h5>Kuis 5</h5>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="question5" name="question5" placeholder="Masukkan pertanyaan kuis">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="optionA5" name="optionA5" placeholder="Pilihan A">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="optionB5" name="optionB5" placeholder="Pilihan B">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="optionC5" name="optionC5" placeholder="Pilihan C">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="correctAnswer5" name="correctAnswer5" placeholder="Jawaban Benar">
                        </div>
                    </div>

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
    var updateProgressBar;

    function displayStep(stepNumber) {
        console.log("Displaying step:", stepNumber); // Debugging log
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
            console.log("Next step clicked. Current step:", currentStep); // Debugging log
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
            console.log("Previous step clicked. Current step:", currentStep); // Debugging log
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

        updateProgressBar = function() {
            var progressPercentage = ((currentStep - 1) / 1) * 100;
            $(".progress-bar").css("width", progressPercentage + "%");
        };
    });
</script>
@endsection
