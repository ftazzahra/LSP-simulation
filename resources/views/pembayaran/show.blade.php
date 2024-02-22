@extends('tplt.page')
@section('content')
<div class="card-header">
    <h5 style="color: #2C74B3; font-weight:500;" class="mt-1">Edit Data Siswa</h5>
</div>
<form action="{{route('bayarK', $pay->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

        <div class="form-group row">
            <label for="id_siswi" class="col-lg-12 col-lg-offset-1 control-label mt-2">Nama</label>
            <div class="col-lg-12">
                <select id="id_siswi" name="id_siswi" class="form-control custom-select" disabled>
                    <option selected>Pilih</option>
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
			<label for="jumlah">Total Kas</label>
			<input type="text" id="" style="width: 20rem;" name="" class="form-control" placeholder="Enter your name ..." value="{{$pay->jumlah_bayar}}" disabled>
			<label for="jumlah" class="mt-3">Bayar Kas</label>
			<input type="text" id="jumlah" style="width: 20rem;" name="jumlah" class="form-control" placeholder="Enter your npminal ..." >
		</div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Dapatkan nilai awal "Total Kas"
        var initialJumlah = parseFloat($('#jumlah').val().replace(',', ''));

        $('#jumlah').on('input', function () {
            var newJumlah = parseFloat($(this).val().replace(',', ''));
            $('#bayar').val(newJumlah.toFixed(2)); // Sesuaikan jumlah desimal sesuai kebutuhan
            console.log('New value in bayar:', newJumlah.toFixed(2));
        });
   
    });
</script>

@endpush
