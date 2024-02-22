@extends('tplt.page')
@section('content')
    <div class="card">
            <div class="card-header mb-0">
                <h4 style="color: #2C74B3;">Data Siswa</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover rounded">
                    <thead style="color: #2C74B3; ">
                        <tr class="text-center">
                        <th scope="col" style="width: 20px;">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Class</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sis as $key => $sis)
                        <tr class="text-center">
                            <td style="width: 20px;">{{$key+1}}</td>
                            <td>{{$sis->nama}}</td>
                            <td style="width: 80px;">{{$sis->kelas}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>

    <div class="card mt-5">
            <div class="card-header mb-0">
                <h4 style="color: #2C74B3;">Data Pembayaran Kas</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover rounded">
                    <thead style="color: #2C74B3;">
                        <tr class="text-center">
                            <th scope="col" style="width: 20px;">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Total Kas</th>
                            <th scope="col">Tanggal terakhir Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $key => $pays)
                            <tr class="text-center">
                                <td style="width: 20px;">{{ $key + 1 }}</td>
                                <td style="width: 150px;">
                                    @if ($pays->siswa)
                                        {{ $pays->siswa->nama }}
                                    @else
                                        <span style="color: red;">Kosong</span>
                                    @endif
                                </td>
                                <td style="width: 150px;">Rp. {{ number_format($pays->jumlah_bayar, 0, ',', '.') }}</td>
                                <td style="width: 150px;">{{ \Carbon\Carbon::parse($pays->tanggal_bayar)->formatLocalized('%d %B %Y') }}</td>
                                <!-- <td><a href="" class="btn btn-outline-info"><i></i></a></td> -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
@endsection