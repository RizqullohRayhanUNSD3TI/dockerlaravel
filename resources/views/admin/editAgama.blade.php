@extends('template.admin')

@section('name_page')
<?php $page="Agama"; ?>
@endsection

@section('konten')
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit Data Agama</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/prosesEditAgama83/{{$agama->id}}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Agama</label>
                    <input type="text" name="agama" class="form-control" placeholder="Nama Agama" value="{{$agama->nama_agama}}" required>
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
      </div><!--/. container-fluid -->
    </section>
@endsection