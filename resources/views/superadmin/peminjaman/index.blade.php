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
            <h6 class='card-title'>Data Peminjaman</h6>
            <div class="card-right d-flex align-items-center">
                <div class="buttons">
                    <a href="{{ route('peminjaman.create') }}" class="btn icon btn-primary"><i data-feather="plus"></i>
                    </a>
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
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peminjaman as $pinjam)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pinjam->buku->judul }}</td>
                        <td>{{ $pinjam->pengguna->nama }}</td>
                        <td>{{ \Carbon\Carbon::parse($pinjam->tanggal_pinjam)->translatedFormat('d F Y') }}</td>
                        <td>
                            {{ $pinjam->tanggal_kembali ? \Carbon\Carbon::parse($pinjam->tanggal_kembali)->translatedFormat('d F Y') : '-' }}
                        </td>
                        <td>
                            @if ($pinjam->status === 'dipinjam')
                            <span class="badge bg-warning text-dark">{{ ucfirst($pinjam->status) }}</span>
                            @elseif ($pinjam->status === 'dikembalikan')
                            <span class="badge bg-danger">{{ ucfirst($pinjam->status) }}</span>
                            @else
                            <span class="badge bg-secondary">{{ ucfirst($pinjam->status) }}</span>
                            @endif
                        </td>

                        <td>
                            <div class="btn-group btn-group-sm">
                                @if ($pinjam->status !== 'dikembalikan')
                                <a href="{{ route('peminjaman.edit', $pinjam->id) }}" class="btn btn-outline-primary">
                                    <i data-feather="edit"></i>
                                </a>
                                @endif

                                <form action="{{ route('peminjaman.destroy', $pinjam->id) }}" method="POST"
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