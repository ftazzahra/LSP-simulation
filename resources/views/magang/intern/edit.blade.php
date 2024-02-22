@extends('tplt.page')
@section('content')
<div class="card-header">
    <h5 style="color: #2C74B3; font-weight:500;" class="mt-1">Edit Data Siswa</h5>
</div>
<form action="{{ route('intern.update', $intern->id) }}" class="mt-4" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group" class="mt-4">
        <label for="nama">Nama</label>
        <input type="text" id="nama" style="width: 20rem;" name="nama" class="form-control" placeholder="Masukkan nama ..." value="{{ $intern->nama }}">
    </div>

    <div class="form-group">
        <label for="kelas">Kelas</label>
        <select id="kelas" class="form-control" style="width: 20rem;" name="kelas">
            <option value="">- Pilih kelas</option>
            <option value="X" {{ $intern->kelas == 'X' ? 'selected' : '' }}>X</option>
            <option value="XI" {{ $intern->kelas == 'XI' ? 'selected' : '' }}>XI</option>
            <option value="XII" {{ $intern->kelas == 'XII' ? 'selected' : '' }}>XII</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
