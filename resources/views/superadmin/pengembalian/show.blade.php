@extends('layouts._index')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Pengembalian Buku</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('pengembalian.update', $pengembalian->id) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_peminjaman">Peminjaman</label>
                            <input type="text" class="form-control" id="id_peminjaman" name="id_peminjaman"
                                value="{{ $pengembalian->peminjaman->pengguna->nama }}" disabled>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
                            <input type="date" class="form-control" id="tanggal_pengembalian"
                                name="tanggal_pengembalian"
                                value="{{ old('tanggal_pengembalian', $pengembalian->tanggal_pengembalian) }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="denda">Denda</label>
                            <input type="number" step="0.01" class="form-control" id="denda" name="denda"
                                value="{{ old('denda', $pengembalian->denda) }}">
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 center">
                    <div class="d-grid gap-2 col-2 mx-auto">
                        <button class="btn btn-success" type="submit">Update Pengembalian</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection