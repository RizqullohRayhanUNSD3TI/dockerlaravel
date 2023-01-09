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
                    <form action="/prosesUpdateFotoProfile83" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="foto">Foto Profile</label>
                                <input type="hidden" name="oldImage" value="{{$user->foto}}">
                                <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name='foto' onchange="previewImage()">
                                @error('foto')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                @if($user->foto)
                                <img src="{{asset('storage/'.$user->foto)}}" class="img-preview img-fluid mt-3 col-sm-5">
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
            const image = document.querySelector('#foto');
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