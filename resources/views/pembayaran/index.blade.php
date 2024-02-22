@extends('tplt.page')
@section('content')
    <a href="{{ route('pembayaran.create') }}" class="btn btn-outline-info shadow rounded mb-3">Bayar Kas</a>
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
            @foreach($pay as $key => $pays)
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
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
