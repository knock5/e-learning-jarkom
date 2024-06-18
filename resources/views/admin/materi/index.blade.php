@extends('admin.template.appadmin')
@section('title', 'Data Materi dan Kuis')
@section('content')

<div class="content-body">

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
        </ol>
    </div>
</div>
<!-- row -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Akun</h4>
                    <h3><a href="{{url('materi/tambah')}}" class="btn btn-primary">Tambah <i class="fa fa-plus" aria-hidden="true"></i></a></h3>
                    <div class="table-responsive" style="background-color: #F5F5F5;">
                        
                        <table class="table table-striped table-bordered zero-configuration" >
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Materi</th>
                                   <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($materi as $mt)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$mt->NAMA_MATERI}}</td>
                                    <td>  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicModal{{$mt->ID_MATERI}}">
                                <i class="fas fa-eye"></i></button>
                                    <a href="{{url('materi/lihat/'.$mt->ID_MATERI)}}"><button
                                            class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button></a>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#exampleModal1{{$mt->ID_MATERI}}">
                                        <i class="fas fa-trash"></i>
                                    </button> 
                                    <div class="modal fade" id="basicModal{{$mt->ID_MATERI}}">
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
                                <h4 class="card-title text-center">{{$mt->NAMA_MATERI}}</h4>
                                <ul class="nav nav-pills mb-3 d-flex justify-content-center ">
                                    <li class="nav-item"><a href="#navpills{{$mt->ID_MATERI}}" class="nav-link active" data-toggle="tab" aria-expanded="false">Isi Materi</a>
                                    </li>
                                    <li class="nav-item"><a href="#navpill{{$mt->ID_MATERI}}" class="nav-link" data-toggle="tab" aria-expanded="false">Kuis</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="navpills{{$mt->ID_MATERI}}" class="tab-pane active">
                                        <div class="row align-items-center">
                                            
                                            <div class="col-12 ">
                                            <iframe src="{{ asset('/laraview/#../storage/' .$mt->ISI_MATERI ) }}" width="700px" height="500px"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="navpill{{$mt->ID_MATERI}}" class="tab-pane">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table  table-bordered">
                                                        <thead>
                                                            <th>No.</th>
                                                            <th>pertanyaan</th>
                                                            <th>Jawaban A</th>
                                                            <th>Jawaban B</th>
                                                            <th>Jawaban C</th>
                                                            <th>Jawaban Benar</th>
                                                        </thead>
                                                        <tbody>
                                                            
                                                        @foreach($kuis->where('ID_MATERI', $mt->ID_MATERI) as $k)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$k->PERTANYAAN}}</td>
                                                <td>{{$k->JAWABANA}}</td> 
                                                <td>{{$k->JAWABANB}}</td> 
                                                <td>{{$k->JAWABANC}}</td> 
                                                <td>{{$k->JAWABAN_BENAR}}</td> 
                                            </tr>
                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                                <div class="modal-footer">
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="exampleModal1{{$mt->ID_MATERI}}" tabindex="-1" -->
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data?</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Yakin Hapus data materi dan kuis yang berkaitan dengan {{$mt->NAMA_MATERI}} ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Batal</button>
                                                    <a href="{{ url('materi/hapus/'. $mt->ID_MATERI) }}"><button
                                                            type="button" class="btn btn-danger">Hapus</button></a>

                                                </div>
                                            </div>
                                        </div>
                                    </div></td>
                                </tr>
                               
                                @endforeach
                            </tbody>
                           
                          
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
</div>


@endsection