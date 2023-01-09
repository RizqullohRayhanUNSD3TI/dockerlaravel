@extends('template.user')

@section('name_page')
<?php $page = 'profile' ?>
@endsection

@section('konten')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('storage/'.$user->foto)}}"
                       alt="User profile picture"
                       style="width:'88px'; height;'88px';">
                </div>

                <h3 class="profile-username text-center">{{$user->name}}</h3>

                <p class="text-muted text-center">{{$user->email}}</p>

                <a href="/updateFotoProfil83" class="btn btn-primary btn-block"><b>Update Foto Profil</b></a>
                @if($user->foto != 'profil/defaultpropic.jpeg')
                <form action="/deleteFotoProfile83" method="POST">
                  @csrf
                  <input type="hidden" name="oldFoto" value="{{$user->foto}}">
                  <button type="submit" class="btn btn-danger btn-block mt-2"><b>Hapus Foto Profil</b></button>
                </form>
                @endif
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"  >Detail Data Anda</h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                @if($user->detail_data == null)
                <a href="/settingProfile83"><button class="btn btn-primary align-center">Setting Profil</button></a>
                @else
              <div class="card-header">
                <a href="/editProfile83"><button class="btn btn-primary align-center">Edit Profil</button></a>
              </div>
                <table id="example2" class="table table-bordered table-hover">
                  <tr>
                    <td>Role</td>
                    <td>{{$user->role}}</td>
                  </tr>
                  <tr>
                    <td>Status Akun</td>
                    <td>
                        @if($user->is_aktif == '1')
                        aktif
                        @else
                        Tidak Aktif
                        @endif
                    </td>
                  </tr>
                  <tr>
                    <td>alamat</td>
                    <td>{{$user->detail_data->alamat}}</td>
                  </tr>
                  <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td>{{$user->detail_data->tempat_lahir}}, {{$user->detail_data->tanggal_lahir}}</td>
                  </tr>
                  <tr>
                    <td>Agama</td>
                    <td>{{$user->detail_data->agama->nama_agama}}</td>
                  </tr>
                  <tr>
                    <td>KTP</td>
                    <td><img src="{{asset('storage/'.$user->detail_data->foto_ktp)}}" alt="KTP" width="500px"></td>
                  </tr>
                  <tr>
                    <td>Umur</td>
                    <td>{{$user->detail_data->umur}}</td>
                  </tr>
                </table>
                @endif
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection