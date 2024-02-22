@extends('tplt.page')
@section('content')
<div class="card-header">
    <h5 style="color: #2C74B3; font-weight:500;" class="mt-1">Edit Data Siswa</h5>
</div>
<form action="{{route('pembayaran.update', $pay->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

        <div class="form-group row">
            <label for="id_siswi" class="col-lg-12 col-lg-offset-1 control-label mt-2">Nama</label>
            <div class="col-lg-12">
                <select id="id_siswi" name="id_siswi" class="form-control custom-select">
                    <option selected disabled>Pilih</option>
                    @forelse($siswa as $cate)
                        <option value="{{ $cate->id }}" {{ $cate->id == $pay->id_siswi ? 'selected' : '' }}>
                            {{ $cate->nama }}
                        </option>
                    @empty
                    @endforelse
                </select>
            </div>
        </div>
		<div class="form-group">
			<label for="jumlah">jumlah bayar</label>
			<input type="text" id="jumlah" style="width: 20rem;" name="jumlah" class="form-control" placeholder="Enter your name ..." value="{{$pay->jumlah_bayar}}">
		</div>
		<div class="form-group">
			<label for="tanggal">tanggal bayar</label>
			<input type="date" id="tanggal" style="width: 20rem;" name="tanggal" class="form-control" placeholder="Enter your name ..." value="{{$pay->tanggal_bayar}}">
		</div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>



@endsection
@push('scripts')

@endpush
