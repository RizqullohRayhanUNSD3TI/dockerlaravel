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
                  <tr>
                    <td colspan="2" align="center"><img src="{{asset('storage/'.$user->user->foto)}}" style="height: 300px;"></td>
                  </tr>
                  <tr>
                    <td>Nama Lengkap</td>
                    <td>{{$user->user->name}}</td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>{{$user->user->email}}</td>
                  </tr>
                  <tr>
                    <td>Role</td>
                    <td>{{$user->user->role}}</td>
                  </tr>
                  <tr>
                    <td>Status Akun</td>
                    <td>
                        @if($user->user->is_aktif == '1')
                        aktif
                        @else
                        Tidak Aktif
                        @endif
                    </td>
                  </tr>
                  <tr>
                    <td>alamat</td>
                    <td>{{$user->alamat}}</td>
                  </tr>
                  <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td>{{$user->tempat_lahir}}, {{$user->tanggal_lahir}}</td>
                  </tr>
                  <tr>
                    <td>Agama</td>
                    <td>{{$user->agama->nama_agama}}</td>
                  </tr>
                  <tr>
                    <td>KTP</td>
                    <td><img src="{{asset('storage/'.$user->foto_ktp)}}" style="height: 200px;"></td>
                  </tr>
                  <tr>
                    <td>Umur</td>
                    <td>{{$user->umur}}</td>
                  </tr>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
      </div><!--/. container-fluid -->
    </section>
@endsection