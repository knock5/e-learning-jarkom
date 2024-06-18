@extends('admin.template.appadmin')
@section('title', 'Data Akun')
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
                    <h4 class="card-title">Data Materi dan Kuis</h4>
                    <h3><a href="{{url('akun/tambah')}}" class="btn btn-primary">Tambah <i class="fa fa-plus" aria-hidden="true"></i></a></h3>
                    <div class="table-responsive" style="background-color: #F5F5F5;">
                        
                        <table class="table table-striped table-bordered zero-configuration" >
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama user</th>
                                   <th>sebagai</th>
                                   <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($akun as $ak)
                               <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$ak->name}}</td>
                                <td>{{$ak->level}}</td>
                                <td>  <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                    data-target="#exampleModal1{{$ak->id}}">
                                        <i class="fas fa-trash"></i>
                                    </button> 
                                    <div class="modal fade" id="exampleModal1{{ $ak->id}}" tabindex="-1" -->
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
                                                    Yakin Hapus Data Akun bernama {{ $ak->name }} ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Batal</button>
                                                    <a href="{{ url('akun/hapus/'. $ak->id) }}"><button
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