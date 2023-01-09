@extends('template.admin')

@section('name_page')
<?php $page="addAgama"; ?>
@endsection

@section('konten')
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tambah Agama</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="/prosesTambahAgama83" method="POST">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Agama</label>
                  <input type="text" name="agama" class="form-control" placeholder="Nama Agama" required>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
              </div>
            </form>
          </div>
            <!-- /.card -->
        </div>
      </div><!--/. container-fluid -->
    </section>
@endsection