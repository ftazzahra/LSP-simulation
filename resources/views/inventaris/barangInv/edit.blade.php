@extends('tplt.page')
@section('content')
    <div class="card-header">
        <h5 style="color: #2C74B3; font-weight:500;" class="mt-1">Tambah Data Siswa</h5>
    </div>
    <form class="mt-4" action="{{route('barang.update', $barangInv->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
	<div class="form-group">
		<label for="nama">Nama PT</label>
		<input type="text" id="nama_barang" style="width: 20rem;" name="nama_barang" class="form-control" placeholder="Enter your name ..." value="{{$barangInv->nama_barang}}">
	</div>
 
	<div class="form-group">
		<label for="nama">Alamat PT</label>
		<input type="file" id="gambar" style="width: 20rem;" name="gambar" class="form-control" placeholder="Enter your name ...">
		<img src="{{ Storage::url('public/barang/').$barangInv->gambar }}" class="rounded" style="width: 150px">
	</div>
 
	<button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection