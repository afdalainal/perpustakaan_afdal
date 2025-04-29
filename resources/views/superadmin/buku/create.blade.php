@extends('layouts._index')

@section('content')
<section id="input-style">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Input Data Buku</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('buku.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="judul">Judul Buku</label>
                                    <input type="text" id="judul" name="judul" class="form-control square"
                                        placeholder="Input Judul Buku" required>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="penulis">Penulis</label>
                                    <input type="text" id="penulis" name="penulis" class="form-control square"
                                        placeholder="Input Penulis Buku">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="penerbit">Penerbit</label>
                                    <input type="text" id="penerbit" name="penerbit" class="form-control square"
                                        placeholder="Input Penerbit Buku">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="tahun_terbit">Tahun Terbit</label>
                                    <input type="number" id="tahun_terbit" name="tahun_terbit"
                                        class="form-control square" placeholder="Input Tahun Terbit" required>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="stok">Stok</label>
                                    <input type="number" id="stok" name="stok" class="form-control square"
                                        placeholder="Input Stok Buku" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 center">
                            <div class="d-grid gap-2 col-2 mx-auto">
                                <button class="btn btn-success" type="submit" style="color: black;">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection