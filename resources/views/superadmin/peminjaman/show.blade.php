@extends('layouts._index')

@section('content')
<section id="input-style">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Peminjaman</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('peminjaman.update', $peminjaman->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="id_buku">Buku</label>
                                    <select name="id_buku" id="id_buku" class="form-control" required>
                                        @foreach ($bukus as $buku)
                                        <option value="{{ $buku->id }}"
                                            {{ $peminjaman->id_buku == $buku->id ? 'selected' : '' }}>{{ $buku->judul }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="id_pengguna">Pengguna</label>
                                    <select name="id_pengguna" id="id_pengguna" class="form-control" required>
                                        @foreach ($penggunas as $pengguna)
                                        <option value="{{ $pengguna->id }}"
                                            {{ $peminjaman->id_pengguna == $pengguna->id ? 'selected' : '' }}>
                                            {{ $pengguna->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                    <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control"
                                        value="{{ $peminjaman->tanggal_pinjam }}" required>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="dipinjam"
                                            {{ $peminjaman->status == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success" type="submit">Perbarui</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection