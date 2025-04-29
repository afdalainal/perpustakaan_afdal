@extends('layouts._index')

@section('content')
<section class="section">
    @if (session('success'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card">
        <div class='px-3 py-3 d-flex justify-content-between'>
            <h6 class='card-title'>Data Pengembalian</h6>
            <div class="card-right d-flex align-items-center">
                <div class="buttons">
                    <a href="{{ route('pengembalian.create') }}" class="btn icon btn-primary"><i
                            data-feather="plus"></i> </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class='table table-striped' id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Buku</th>
                        <th>Pengguna</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Denda</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengembalian as $kembali)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kembali->peminjaman->buku->judul }}</td>
                        <td>{{ $kembali->peminjaman->pengguna->nama }}</td>
                        <td>{{ $kembali->tanggal_pengembalian }}</td>
                        <td>{{ $kembali->denda ?? '-' }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('pengembalian.edit', $kembali->id) }}"
                                    class="btn btn-outline-primary">
                                    <i data-feather="edit"></i>
                                </a>

                                <form action="{{ route('pengembalian.destroy', $kembali->id) }}" method="POST"
                                    onclick="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger" type="submit">
                                        <i data-feather="delete"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection