          <td style="width: 80px;">{{ number_format($pays->jumlah_bayar, 0, ',', '.') }}</td>
          <td style="width: 80px;">{{ number_format(str_replace(',', '', $pays->jumlah_bayar), 0, ',', '.') }}</td>



        $pay->id_siswi = $siswa->id;

        // Menghapus koma dari input jika ada
        $jumlah_bayar = str_replace(',', '', $request->jumlah);

        // Menghapus titik dari input jika ada
        $jumlah_bayar = str_replace('.', '', $jumlah_bayar);

        // Mengonversi string ke bentuk numerik
        $jumlah_bayar = (float) $jumlah_bayar;

        $pay->jumlah_bayar = $jumlah_bayar;
        $pay->tanggal_bayar = $request->tanggal;
        $pay->save();



        $pay = new Pay();
        $pay->id_siswi = $siswa->id;
        $jumlah_bayar = str_replace(',', '', $request->jumlah); // Menghapus koma dari input jika ada
        $pay->jumlah_bayar = number_format($jumlah_bayar, 0, ',', '.'); // Format rupiah tanpa desimal
        $pay->tanggal_bayar = $request->tanggal;
        $pay->save();


        ================================

        <div class="form-group row">
			<label for="id_siswi" class="col-lg-12 col-lg-offset-1 control-label mt-2">Nama</label>
			<div class="col-lg-12">
				<select id="id_siswi" name="id_siswi" class="form-control custom-select">
					<option selected disabled>Pilih</option>
					@forelse($siswa as $cate)
						<option value="{{$cate->id}}" {{$cate->nama ? 'selected' : ''}}>
							{{$cate->nama}}
						</option>
					@empty
					@endforelse
				</select>
			</div>
		</div>

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



// $siswa = Siswa::find($request->id_siswi);

        // if (!$siswa) {
        //     return redirect()->route('pembayaran.create')->with('error', 'Siswa tidak valid.');
        // }

        // $pay = new Pay();
        // $pay->id_siswi = $siswa->id;

        // // Menghapus koma dari input jika ada
        // $jumlah_bayar = str_replace(',', '', $request->jumlah);

        // // Menghapus titik dari input jika ada
        // $jumlah_bayar = str_replace('.', '', $jumlah_bayar);

        // // Mengonversi string ke bentuk numerik
        // $jumlah_bayar = (float) $jumlah_bayar;

        // $pay->jumlah_bayar = $jumlah_bayar;
        // $pay->tanggal_bayar = $request->tanggal;
        // $pay->save();


        // return redirect()->route('pembayaran.index')->with('success', 'Data pembayaran berhasil ditambahkan.');


        <a href="{{route('pembayaran.edit', $pays->id)}}" class="btn btn-outline-info shadow rounded btn-sm ms-3">
              <i data-feather="edit"></i>edit
            </a>
            <a href="" onclick="return confirm('yakin?')" class="btn btn-info btn-sm" style="margin-inline-start: 5px;">
                  <i data-feather="trash-2"></i>hapus
              </a>
            <a href="{{route('pembayaran.show', $pays->id)}}" class="btn btn-info btn-sm" style="margin-inline-start: 5px;">
                  Bayar
              </a>