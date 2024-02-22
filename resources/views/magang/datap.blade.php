@extends('tplt.page')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="{{route('data-pkl.create')}}" class="btn btn-outline-primary btn-sm mb-3">+ data magang</a>
            <div class="card">
                <div class="card-header">
                    <h5 style="color: #2C74B3;">Data Magang</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover rounded">
                        <thead style="color: #2C74B3; ">
                            <tr class="text-center">
                            <th scope="col" style="width: 20px;">No</th>
                            <th scope="col">Nama Intern</th>
                            <th scope="col">Nama PT.</th>
                            <th scope="col">Alamat PT.</th>
                            <th scope="col">Periode</th>
                            <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pkl as $key => $i)
                            <tr class="text-center">
                                <td style="width: 20px;">{{$key+1}}</td>
                                <td>{{$i->intern->nama}}</td>
                                <td>{{$i->dudi->nama_pt}}</td>
                                <td>{{$i->dudi->alamat}}</td>
                                <td>{{ \Carbon\Carbon::parse($i->tgl_masuk)->formatLocalized('%d') }} - {{ \Carbon\Carbon::parse($i->tgl_keluar)->formatLocalized('%d %B %Y') }}</td>
                                <td>
                                    <form action="{{ route('data-pkl.destroy', $i->id) }}" method="POST">
                                    <a href="{{route('data-pkl.edit', $i->id)}}" class="btn btn-outline-info shadow rounded btn-sm ms-3">
                                    <i data-feather="edit"></i>
                                    </a>
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-info btn-sm" style="margin-inline-start: 5px;">
                                        <i data-feather="trash-2"></i>
                                    </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>   
        <div class="col-6 mt-4">
            <div class="card">
                <div class="card-header mb-0">
                    <h5 style="color: #2C74B3;">Data Intern</h5>
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
                            @foreach($intern as $key => $i)
                            <tr class="text-center">
                                <td style="width: 20px;">{{$key+1}}</td>
                                <td>{{$i->nama}}</td>
                                <td style="width: 80px;">{{$i->kelas}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-6 mt-4">
            <div class="card">
                <div class="card-header">
                    <h5 style="color: #2C74B3;">Data Dudi</h5>
                </div>
                <div class="card-body">
                <table class="table table-bordered table-hover rounded">
                    <thead style="color: #2C74B3; ">
                        <tr class="text-center">
                        <th scope="col" style="width: 20px;">No</th>
                        <th scope="col">Name PT.</th>
                        <th scope="col" style="width: 280px;">Alamat PT.</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dudi as $key => $i)
                        <tr class="text-center">
                            <td style="width: 20px;">{{$key+1}}</td>
                            <td>{{$i->nama_pt}}</td>
                            <td style="width: 80px;">{{$i->alamat}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection