@extends('template.admin')

@section('name_page')
<?php $page="user"; ?>
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
                  <thead>
                  <tr>
                    <th>No.</th>
                    <!-- <th>Foto</th> -->
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Alamat</th>
                    <th>Tempat/Tanggal Lahir</th>
                    <!-- <th>agama</th> -->
                    <!-- <th>KTP</th> -->
                    <th>Umur</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($dataUser as $key=>$value)
                  <tr>
                  	<td>{{ $key+1 }}</td>
                  	<td>{{ $value->user->name}}</td>
                  	<td>{{ $value->user->email}}</td>
                  	<td>{{ $value->user->role}}</td>
                  	<td>{{ $value->alamat}}</td>
                  	<td>{{ $value->tempat_lahir}}, {{ $value->tanggal_lahir}}</td>
                  	<td>{{ $value->umur}}</td>
                    <td>
                      <a href="/detailUser83/{{Crypt::encryptString($value->id)}}"><button class="btn btn-warning" title="Detail User"><i class='fas fa-eye'></i></button></a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No.</th>
                    <!-- <th>Foto</th> -->
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Alamat</th>
                    <th>Tempat/Tanggal Lahir</th>
                    <!-- <th>agama</th> -->
                    <!-- <th>KTP</th> -->
                    <th>Umur</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
      </div><!--/. container-fluid -->
    </section>
@endsection