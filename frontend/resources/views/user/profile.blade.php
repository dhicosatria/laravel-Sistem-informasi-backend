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
                        <th colspan="2"><img src="/img/{{ Auth::user()->foto }}" alt="error" width="200px" class="rounded-circle"></th>
                      </tr>
                      <tr>
                        <th style="width: 50%">Nama lengkap</th>
                        <td style="width: 50%">{{ Auth::user()->name }}</td>
                      </tr>
                      <tr>
                        <th>Email</th>
                        <td>{{ Auth::user()->email }}</td>
                      </tr>
                      @if (Auth::user()->detail_data == null)
                          <tr>
                            <td colspan="2">Details have not been added.</td>
                          </tr>
                      @else
                          <tr>
                            <th>Agama</th>
                            <td>{{ Auth::user()->detail_data->agama->nama_agama }}</td>
                          </tr>
                          <tr>
                            <th>Alamat</th>
                            <td>{{ Auth::user()->detail_data->alamat }}</td>
                          </tr>
                          <tr>
                            <th>Tempat lahir</th>
                            <td>{{ Auth::user()->detail_data->tempat_lahir }}</td>
                          </tr>
                          <tr>
                            <th>Tanggal lahir</th>
                            <td>{{ Auth::user()->detail_data->tanggal_lahir }}</td>
                          </tr>
                          <tr>
                            <th>Umur</th>
                            <td>{{ Auth::user()->detail_data->umur }}</td>
                          </tr>
                          <tr>
                            <th>Foto ktp</th>
                            <td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#ktp">Lihat foto</a></td>
                          </tr>
                      @endif
                    </thead>
                </table>
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#password">Change
                    passwrod</a>
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#image">Change
                    image</a>
                @if (Auth::user()->detail_data == null)
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#detail">Add
                        detail</a>
                @else
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#updatedetail">Update
                        detail</a>
                @endif
                </div>
                </div>
            </div>
        </div>

    </div>
  </section>

  @if (Auth::user()->detail_data!=null)
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
                  <img src="/img/{{ Auth::user()->detail_data->foto_ktp }}" alt="error" style="width: 300px">
              </div>
                  <div class="modal-footer justify-content-end">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
  @endif

    <div class="modal fade" id="image">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit image</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/profile37/edit/image/{{ Auth::user()->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="foto" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-end">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="password">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit agama</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/profile37/edit/password/{{ Auth::user()->id }}" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">New password</label>
                            <input type="text" class="form-control" name="password" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-end">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="detail">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add detail</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/detaildata37" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Agama</label>
                            <select class="form-control" name="id_agama">
                                <option selected disabled>Open this select menu</option>
                                @foreach ($agamas as $agama)
                                    <option value="{{ $agama['id'] }}">{{ $agama['nama_agama'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tempat lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" required
                                value="{{ old('tempat_lahir') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" required
                                value="{{ old('tanggal_lahir') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Umur</label>
                            <input type="number" class="form-control" name="umur" required
                                value="{{ old('umur') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto ktp</label>
                            <input type="file" name="foto_ktp" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-end">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if (Auth::user()->detail_data != null)
        <div class="modal fade" id="updatedetail">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update detail</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/detaildata37/{{ Auth::user()->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" required
                                    value="{{ Auth::user()->detail_data->alamat }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Agama</label>
                                <select class="form-control" name="id_agama">
                                    <option selected value="{{ Auth::user()->detail_data->agama->id }}">
                                        {{ Auth::user()->detail_data->agama->nama_agama }}</option>
                                    @foreach ($agamas as $agama)
                                        <option value="{{ $agama['id'] }}">{{ $agama['nama_agama'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tempat lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" required
                                    value="{{ Auth::user()->detail_data->tempat_lahir }}"
                                    value="{{ old('tempat_lahir') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" required
                                    value="{{ Auth::user()->detail_data->tanggal_lahir }}"
                                    value="{{ old('tanggal_lahir') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Umur</label>
                                <input type="number" class="form-control" name="umur" required
                                    value="{{ Auth::user()->detail_data->umur }}" value="{{ old('umur') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Foto ktp</label>
                                <input type="file" name="foto_ktp" required
                                    value="{{ Auth::user()->detail_data->foto_ktp }}">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-end">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection
