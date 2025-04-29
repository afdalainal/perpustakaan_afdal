@extends('layouts._index')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4>Edit Opd</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('opd.update', $opd->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="opd">OPD</label>
                    <input type="text" id="opd" name="name" class="form-control square" placeholder="Input Nama OPD"
                        value="{{ old('opd', $opd->name) }}">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</section>
@endsection