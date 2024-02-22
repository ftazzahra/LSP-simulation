@extends('tplt.page')
@section('content')
    <div class="card-header">
        <h5 style="color: #2C74B3; font-weight:500;" class="mt-1">Tambah Data Siswa</h5>
    </div>
    <form class="mt-4" action="{{route('siswaInven.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    
	<div class="form-group">
		<label for="nama">Name</label>
		<input type="text" id="nama" style="width: 20rem;" name="nama" class="form-control" placeholder="Enter your name ...">
	</div>
 
	<div class="form-group">
		<label for="kelas">Class</label>
		<select id="kelas" class="form-control" style="width: 20rem;" name="kelas">
			<option value="">- Select your class</option>
			<option value="X">X</option>
			<option value="XI">XI</option>
			<option value="XII">XIII</option>
		</select>
	</div>
 
	<button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection