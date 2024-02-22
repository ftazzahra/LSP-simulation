@extends('tplt.page')
@section('content')
    <a href="{{route('data-siswa.create')}}" class="btn btn-outline-info shadow rounded mb-3">TAMBAH POST</a>
    <table class="table table-bordered table-hover rounded">
      <thead style="color: #2C74B3; ">
        <tr class="text-center">
          <th scope="col" style="width: 20px;">No</th>
          <th scope="col">Name</th>
          <th scope="col">Class</th>
          <th scope="col">Option</th>
        </tr>
      </thead>
      <tbody>
        @foreach($sis as $key => $sis)
        <tr class="text-center">
          <td style="width: 20px;">{{$key+1}}</td>
          <td>{{$sis->nama}}</td>
          <td style="width: 80px;">{{$sis->kelas}}</td>
          <td>
            <a href="{{route('data-siswa.edit', $sis->id)}}" class="btn btn-outline-info shadow rounded btn-sm ms-3">
              <i data-feather="edit"></i>
            </a>
            <!-- <a href="{{route('data-siswa.destroy', $sis->id)}}" onclick="return confirm('yakin?')" class="btn btn-info btn-sm" style="margin-inline-start: 5px;">
                  <i data-feather="trash-2"></i>
              </a> -->
            <form action="{{ route('data-siswa.destroy', $sis->id) }}" method="POST">
              @csrf
              @method('DELETE')

              <button type="submit" class="btn btn-info btn-sm mt-3" style="margin-inline-start: 5px;">
                  <i data-feather="trash-2"></i>
              </button>
          </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
@endsection