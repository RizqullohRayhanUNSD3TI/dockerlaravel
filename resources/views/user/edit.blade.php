@extends('template.user')

@section('name_page')
<?php $page = 'profile' ?>
@endsection

@section('konten')
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Profile</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="/prosesEditProfile83" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}">
                                @error('name')
                                    <div class="invalid-feedback">Harap masukkan nama Anda!</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}">
                                @error('email')
                                    <div class="invalid-feedback">Harap masukkan email Anda!</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{$user->detail_data->alamat}}">
                                @error('alamat')
                                    <div class="invalid-feedback">Harap masukkan alamat Anda!</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{$user->detail_data->tempat_lahir}}">
                                @error('tempat_lahir')
                                    <div class="invalid-feedback">Harap masukkan tempat lahir Anda!</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{$user->detail_data->tanggal_lahir}}">
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">Harap masukkan tanggal lahir Anda!</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="id_agama">Agama</label>
                                <select name="id_agama" id="id_agama" class="form-control @error('id_agama') is-invalid @enderror">
                                    @foreach($agama as $value)
                                    <option value="{{$value->id}}" @if($user->detail_data->id_agama == $value->id) selected @endif>{{$value->nama_agama}}</option>
                                    @endforeach
                                </select>
                                @error('id_agama')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir">Foto KTP</label>
                                <input type="hidden" name="oldImage" value="{{$user->detail_data->foto_ktp}}">
                                <input type="file" class="form-control @error('foto_ktp') is-invalid @enderror" id="foto_ktp" name='foto_ktp' onchange="previewImage()">
                                @error('foto_ktp')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                @if($user->detail_data->foto_ktp)
                                <img src="{{asset('storage/'.$user->detail_data->foto_ktp)}}" class="img-preview img-fluid mt-3 col-sm-5">
                                @else
                                <img class="img-preview img-fluid mt-3 col-sm-5">
                                @endif
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div><!--/. container-fluid -->
    </section>

    <script>
        function previewImage(){
            const image = document.querySelector('#foto_ktp');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection