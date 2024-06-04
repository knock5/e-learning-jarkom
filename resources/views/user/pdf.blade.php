@extends('user.template.appuser')

@section('title', 'Detail Materi')
@section('content')
<style>
    .p{
        display: flex;
        justify-content: center;
    }
    td{
        text-align: center;
    }
</style>
   <div class="container-fluid">
    <div class="py-3">
        <a href="{{url('/')}}" class="btn btn-primary  px-3"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
    </div>
    <div class="row">
        <div class="col-12 ">
            <div class="p">
                
            <iframe src="{{ asset('/laraview/#../storage/' .$pdf->ISI_MATERI ) }}" width="1000px" height="600px"></iframe>
            
            
</div>        
        </div>
        <div class="col-12 mx-auto">
            <p class="text-center fs-5 mt-3 fw-bold">Sudah siap untuk menguji diri Anda? Silakan isi kuis berikut setelah mempelajari materi di atas, Klik tombol di bawah untuk memulai</p>
            <div class=" text-center   ">
            <a href="{{url('kuis/'.$pdf->ID_MATERI)}}" class="btn btn-primary px-3 mt-2">Halaman Kuis</a>
            </div>
        </div>
        <div class="col-12 mt-3">
            <h2 class="text-center">Riwayat Kuis Anda</h2>
        </div>
        <div class="col-12 col-md-4 mt-3 mx-auto">
        <div class="table table-responsive">
                <table class="table table-hover">
                    <thead>
                        <th>No.</th>
                        <th>Waktu</th>
                        <th>jumlah nilai</th>
                        <th>Jumlah soal</th>
                    </thead>
                    <tbody>
                        @foreach($skor as $sk)
                        <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$sk->waktu}}</td>
                        <td>{{$sk->SKOR}}</td>
                        <td>{{$sk->soal}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div> 
        </div>
    </div>

   </div>
   @endsection
  
