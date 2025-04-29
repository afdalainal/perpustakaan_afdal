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
            <h6 class='card-title'>Table Buku</h6>
            <div class="card-right d-flex align-items-center">
                <div class="buttons">
                    <a href="{{ route('buku.create') }}" class="btn icon btn-primary"><i data-feather="plus"></i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class='table table-striped' id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($buku as $bukus)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $bukus->judul }}</td>
                        <td>{{ $bukus->penulis }}</td>
                        <td>{{ $bukus->penerbit }}</td>
                        <td>{{ $bukus->tahun_terbit }}</td>
                        <td>{{ $bukus->stok }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('buku.edit', $bukus->id) }}" class="btn btn-outline-primary">
                                    <i data-feather="edit"></i>
                                </a>

                                <form onclick="return confirm('Are you sure?')"
                                    action="{{ route('buku.destroy', $bukus->id) }}" method="POST">
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