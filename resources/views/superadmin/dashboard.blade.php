@extends('layouts._index')

@section('content')
<div class="page-title">
    <h5>Dashboard</h5>
</div>
<section class="section">
    <div class="row mb-2">

        <div class="col-12 col-md-12">
            <div class="card card-statistic">
                <div class="card-body p-0">
                    <div class="d-flex flex-column">
                        <div class='px-3 py-3 d-flex justify-content-between'>
                            <h6 class='card-title'>Informasi Perpustakaan Jobhun</h6>
                            <div class="card-right d-flex align-items-center">
                                <p>.</p>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h6>Buku Tersedia</h6>
                                    </div>
                                    <div class="card-body">
                                        <p>Total Buku: {{ $totalBuku ?? 0 }}</p>
                                        <p>Buku Favorit: {{ optional($bukuFavorit)->judul ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h6>Status Peminjaman</h6>
                                    </div>
                                    <div class="card-body">
                                        <p>Total Peminjaman: {{ $totalDipinjam + $totalPenggunaAktif }}
                                        </p>
                                        <p>Masih Dipinjam: {{ $totalDipinjam }}</p>
                                        <p>Sudah Dikembalikan: {{ $totalPenggunaAktif }}</p>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h6>Pengunjung</h6>
                                    </div>
                                    <div class="card-body">
                                        <p>Siswa: {{ $totalSiswa ?? 0 }}</p>
                                        <p>Dosen: {{ $totalDosen ?? 0 }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row mb-4">

    </div>
</section>
@endsection