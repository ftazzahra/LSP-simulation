@extends('tplt.page')
@section('content')
    <div class="card-header">
        <h5 style="color: #2C74B3; font-weight:500;" class="mt-1">Tambah Data Siswa</h5>
    </div>
    <form class="mt-4" action="{{route('dudi.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    
	<div class="form-group">
		<label for="nama">Nama PT</label>
		<input type="text" id="nama_pt" style="width: 20rem;" name="nama_pt" class="form-control" placeholder="Enter your name ...">
	</div>
 
	<div class="form-group">
		<label for="nama">Alamat PT</label>
		<textarea type="text" id="alamat" style="width: 20rem;" name="alamat" class="form-control" placeholder="Enter your name ..."></textarea>
	</div>
 
	<button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection