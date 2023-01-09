@extends('template.admin')

@section('name_page')
<?php $page="verUser"; ?>
@endsection

@section('konten')
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabel Data User yang Belum di Verifikasi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th width="5px">No.</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($dataUser as $key=>$value)
                  <tr>
                  	<td>{{ $key+1 }}</td>
                  	<td>{{ $value->name}}</td>
                  	<td>{{ $value->email}}</td>
                  	<td>{{ $value->role}}</td>
                    <td>
                      <form action="{{url("/prosesApprove/{$value->id}")}}" method="POST">
                        @csrf
                        <button class="btn btn-success" type="submit">Approve</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
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