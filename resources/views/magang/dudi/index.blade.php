@extends('tplt.page')
@section('content')
    <a href="{{route('dudi.create')}}" class="btn btn-outline-info shadow rounded mb-3">TAMBAH POST</a>
    <table class="table table-bordered table-hover rounded">
      <thead style="color: #2C74B3; ">
        <tr class="text-center">
          <th scope="col" style="width: 20px;">No</th>
          <th scope="col">Name PT.</th>
          <th scope="col" style="width: 280px;">Alamat PT.</th>
          <th scope="col"  style="width: 170px;">Option</th>
        </tr>
      </thead>
      <tbody>
        @foreach($dudi as $key => $i)
        <tr class="text-center">
          <td style="width: 20px;">{{$key+1}}</td>
          <td>{{$i->nama_pt}}</td>
          <td style="width: 80px;">{{$i->alamat}}</td>
          <td>
            <form action="{{ route('dudi.destroy', $i->id) }}" method="POST">
              <a href="{{route('dudi.edit', $i->id)}}" class="btn btn-outline-info shadow rounded btn-sm">
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
@endsection