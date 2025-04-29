@extends('layouts._index')

@section('content')
<section id="input-style">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Pengguna</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('pengguna.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="nama">Nama Pengguna</label>
                                    <input type="text" id="nama" name="nama" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="jenis_pengguna">Jenis Pengguna</label>
                                    <select id="jenis_pengguna" name="jenis_pengguna" class="form-control" required>
                                        <option value="siswa">Siswa</option>
                                        <option value="dosen">Dosen</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" id="alamat" name="alamat" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="no_telepon">No Telepon</label>
                                    <input type="text" id="no_telepon" name="no_telepon" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection