@extends('admin.template.appadmin')
@section('title', 'Tambah Data Akun')
@section('content')
  <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Akun</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <h2>Tambah Akun</h2>
                        <div class="mb-1">
                        <a href="{{ url('akun') }}" class="btn btn-primary px-3"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" method="POST" action="{{ url('akun/insert') }}" enctype="multipart/form-data">
                                    @csrf
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Username <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="val-username"  name="name" value="{{ old('name') }}"  placeholder="Masukkan Nama Lengkap">
                                            </div>
                                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control  @error('email') is-invalid @enderror" id="val-email" name="email" value="{{ old('email') }}" placeholder="Masukkan alamat email">
                                            </div>
                                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-password">Password <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="val-password" name="password" placeholder="Masukkan Password anda">
                                            </div>
                                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-confirm-password">Confirm Password <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" id="val-confirm-password"  name="password_confirmation" placeholder="Konfirmasi Password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">level akun <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="level">
                                                    <option value="0">Silahkan Pilih</option>
                                                    <option value="dosen">Dosen</option>
                                                    <option value="user">Mahasiswa</option>
                                                    
                                                </select>
                                            </div>
</div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>

@endsection