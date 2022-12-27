@extends('layouts.main')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Detail Users</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>


<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered mb-3">
                      <tr class="text-center">
                        <th colspan="2"><img src="/img/{{ $user['foto'] }}" alt="error" width="200px" class="rounded-circle"></th>
                      </tr>
                      <tr>
                        <th style="width: 50%">Nama lengkap</th>
                        <td style="width: 50%">{{ $user['name'] }}</td>
                      </tr>
                      <tr>
                        <th>Email</th>
                        <td>{{ $user['email'] }}</td>
                      </tr>
                      @if ($user['detail_data'] == null)
                          <tr>
                            <td colspan="2">Details have not been added.</td>
                          </tr>
                      @else
                          <tr>
                            <th>Agama</th>
                            <td>{{ $user['agama']['nama_agama'] }}</td>
                          </tr>
                          <tr>
                            <th>Alamat</th>
                            <td>{{ $user['detail_data']['alamat'] }}</td>
                          </tr>
                          <tr>
                            <th>Tempat lahir</th>
                            <td>{{ $user['detail_data']['tempat_lahir'] }}</td>
                          </tr>
                          <tr>
                            <th>Tanggal lahir</th>
                            <td>{{ $user['detail_data']['tanggal_lahir'] }}</td>
                          </tr>
                          <tr>
                            <th>Umur</th>
                            <td>{{ $user['detail_data']['umur'] }}</td>
                          </tr>
                          <tr>
                            <th>Foto ktp</th>
                            <td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#ktp">Lihat foto</a></td>
                          </tr>
                      @endif
                    </thead>
                </table>
                <form action="/user37/{{ $user['id'] }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </div>
                </div>
            </div>
        </div>

    </div>
  </section>

  @if ($user['detail_data']!=null)
  <div class="modal fade" id="ktp">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Foto ktp</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body text-center">
                  <img src="/img/{{ $user['detail_data']['foto_ktp'] }}" alt="error" style="width: 300px">
              </div>
                  <div class="modal-footer justify-content-end">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
  @endif
@endsection
