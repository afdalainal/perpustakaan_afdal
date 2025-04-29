@extends('layouts._index')

@section('content')
<section id="input-style">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Data Buku</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('buku.update', $buku->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="judul">Judul Buku</label>
                                    <input type="text" id="judul" name="judul" class="form-control square"
                                        value="{{ old('judul', $buku->judul) }}" required>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="penulis">Penulis</label>
                                    <input type="text" id="penulis" name="penulis" class="form-control square"
                                        value="{{ old('penulis', $buku->penulis) }}">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="penerbit">Penerbit</label>
                                    <input type="text" id="penerbit" name="penerbit" class="form-control square"
                                        value="{{ old('penerbit', $buku->penerbit) }}">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="tahun_terbit">Tahun Terbit</label>
                                    <input type="number" id="tahun_terbit" name="tahun_terbit"
                                        class="form-control square"
                                        value="{{ old('tahun_terbit', $buku->tahun_terbit) }}" required>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="stok">Stok</label>
                                    <input type="number" id="stok" name="stok" class="form-control square"
                                        value="{{ old('stok', $buku->stok) }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 center">
                            <div class="d-grid gap-2 col-2 mx-auto">
                                <button class="btn btn-success" type="submit" style="color: black;">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection