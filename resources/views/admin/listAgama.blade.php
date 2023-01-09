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
                  <thead>
                  <tr>
                    <th width="3%">No.</th>
                    <th>Nama Agama</th>
                    <th width="15%">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($agama as $key=>$value)
                  <tr>
                  	<td>{{ $key+1 }}</td>
                  	<td>{{ $value->nama_agama}}</td>
                    <td>
                      <div class="row">
                        <a href="/detailAgama83/{{Crypt::encryptString($value->id)}}"><button class="btn btn-success" title="Detail Agama"><i class='fas fa-eye'></i></button></a>
                        <a href="/editAgama83/{{Crypt::encryptString($value->id)}}"><button class="btn btn-warning" title="Edit"><i class='fas fa-pen'></i></button></a>
                        <form action="/hapusAgama83/{{Crypt::encryptString($value->id)}}" method="post">
                          @csrf
                          <button class="btn btn-danger" type="submit" title="Hapus"><i class='fas fa-trash'></i></button>
                        </form>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Nama Agama</th>
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