@extends('tplt.page')
@section('content')
    <div class="card-header">
        <h5 style="color: #2C74B3; font-weight:500;" class="mt-1">Tambah Data Magang</h5>
    </div>
    <form class="mt-4" action="{{route('peminjaman.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    
	    <div class="form-group row">
			<label for="intern" class="col-lg-12 col-lg-offset-1 control-label mt-2">Nama Siswa</label>
			<div class="col-lg-12">
				<select id="intern" name="intern" class="form-control custom-select">
					<option selected>Pilih</option>
					@forelse($siswaInv as $cate)
						<option value="{{$cate->id}}" {{$cate->nama ? 'selected' : ''}}>
							{{$cate->nama}}
						</option>
					@empty
					@endforelse
				</select>
			</div>
		</div>

	    <div class="form-group row">
			<label for="intern" class="col-lg-12 col-lg-offset-1 control-label mt-2">Nama PT</label>
			<div class="col-lg-12">
				<select id="nama_barang" name="nama_barang" class="form-control custom-select">
					<option selected>Pilih</option>
					@forelse($barang as $barang)
						<option value="{{$barang->id}}" {{$barang->nama_barang ? 'selected' : ''}}>
							{{$barang->nama_barang}}
						</option>
					@empty
					@endforelse
				</select>
			</div>
		</div>

        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <label for="tgl_masuk">tanggal peminjaman</label>
                    <input type="date" id="tgl_masuk" name="tgl_masuk" class="form-control" placeholder="Enter your name ...">
                </div>
                <div class="col-6">
                    <label for="tgl_keluar">tanggal pengembalian</label>
                    <input type="date" id="tgl_keluar" name="tgl_keluar" class="form-control" placeholder="Enter your name ...">
                </div>
            </div>
		</div>
  
	<button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection