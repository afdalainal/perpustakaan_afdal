@extends('layouts._index')

@section('content')
<section id="input-style">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Pengembalian</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('pengembalian.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="id_peminjaman">Peminjaman</label>
                                    <select name="id_peminjaman" id="id_peminjaman" class="form-control" required>
                                        @foreach ($peminjaman as $pinjam)
                                        <option value="{{ $pinjam->id }}">{{ $pinjam->buku->judul }} -
                                            {{ $pinjam->pengguna->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
                                    <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian"
                                        class="form-control" required>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="denda">Denda</label>
                                    <input type="number" name="denda" id="denda" class="form-control" step="0.01"
                                        min="0" placeholder="Opsional">
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