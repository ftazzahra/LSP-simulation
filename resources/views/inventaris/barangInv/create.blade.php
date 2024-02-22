@extends('tplt.page')
@section('content')
    <div class="card-header">
        <h5 style="color: #2C74B3; font-weight:500;" class="mt-1">Tambah Data Siswa</h5>
    </div>
    <form class="mt-4" action="{{route('barang.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    
	<div class="form-group">
		<label for="nama">Nama Barang</label>
		<input type="text" id="nama_barang" style="width: 20rem;" name="nama_barang" class="form-control" placeholder="Enter your name ...">
	</div>
 
	<div class="form-group">
		<label for="nama">Gambar</label>
		<input type="file" id="gambar" style="width: 20rem;" name="gambar" class="form-control" placeholder="Enter your name ...">
	</div>
 
	<button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection