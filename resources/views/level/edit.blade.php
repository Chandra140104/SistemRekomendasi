@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Level</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('level.update', $level->id_level) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Kode</label>
            <input type="text" name="kode" class="form-control"
                   value="{{ $level->kode }}" required>
        </div>

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control"
                   value="{{ $level->nama }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('level.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection