@extends('template.admin')

@section('name_page')
<?php $page="agama"; ?>
@endsection

@section('konten')
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Data user</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <tr>
                    <td width="30%">Nama Agama</td>
                    <td>{{$agama->nama_agama}}</td>
                  </tr>
                  <tr>
                    <td>Jumlah Pemeluk</td>
                    <td>{{$penganut}}</td>
                  </tr>
                </table>
                <br>
                <a href="/agama83"><button class="btn btn-primary me-md-2">Kembali</button></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
      </div><!--/. container-fluid -->
    </section>
@endsection