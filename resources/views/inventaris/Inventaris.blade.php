@extends('tplt.page')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endpush
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">+ Peminjaman </button>
            <div class="card">
                <div class="card-header">
                    <h5 style="color: #2C74B3;">Data Inventaris</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover rounded">
                        <thead style="color: #2C74B3; ">
                            <tr class="text-center">
                            <th scope="col" style="width: 20px;">No</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Tgl. Peminjaman</th>
                            <th scope="col">Batas Pengembalian</th>
                            <th scope="col">Tgl. Pengembalian</th>
                            <th scope="col">Status</th>
                            <th width="110px">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($peminjaman as $key => $i)
                            <tr class="text-center">
                            <td style="width: 20px;">{{$key+1}}</td>
                            <td>{{$i->siswa->nama}}</td>
                            <td>{{$i->barang->nama_barang}}</td>
                            <td>{{ \Carbon\Carbon::parse($i->tgl_pinjam)->isoFormat('D MMMM Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($i->deadline)->isoFormat('D MMMM Y') }}</td>
                            <td>
                                @if(empty($i->tgl_kembali))
                                  <h5>-</h5> 
                                @else
                                    {{ \Carbon\Carbon::parse($i->tgl_kembali)->isoFormat('D MMMM Y') }}
                                @endif
                            </td>                            
                            <td>{{$i->status}}</td>
                            <td>
                            @if(empty($i->tgl_kembali))
                              <form action="{{ route('peminjaman.destroy', $i->id) }}" method="POST">
                                  <button type="button" data-toggle="modal" data-id="{{$i->id}}" data-target="#modalEdit" class="catedit" style="background: none; border: none; padding: 0; margin: 0; color:darkgrey;">
                                    <i data-feather="external-link" aria-hidden="true"></i>
                                  </button>
                                  @csrf
                                  @method('DELETE')

                                  <button type="submit" class="ms-2" style="background: none; border: none; padding: 0; margin: 0; color:darkgrey;">
                                      <i data-feather="trash-2"></i>
                                  </button>
                              </form>
                            @else
                            <form action="{{ route('peminjaman.destroy', $i->id) }}" method="POST">
                              <i data-feather="check" style="color: green;" aria-hidden="true"></i>
                                  @csrf
                                  @method('DELETE')

                                  <button type="submit" class="ms-2" style="background: none; border: none; padding: 0; margin: 0; color:darkgrey;">
                                      <i data-feather="trash-2"></i>
                                  </button>
                              </form>
                            @endif
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
                    <h5 style="color: #2C74B3;">Data Siswa</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover rounded">
                        <thead style="color: #2C74B3; ">
                            <tr class="text-center">
                            <th scope="col" style="width: 20px;">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($siswaInv as $key => $i)
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
                    <h5 style="color: #2C74B3;">Data Barang</h5>
                </div>
                <div class="card-body">
                <table class="table table-bordered table-hover rounded">
                    <thead style="color: #2C74B3; ">
                        <tr class="text-center">
                        <th scope="col" style="width: 20px;">No</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col" style="width: 280px;">Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($barang as $key => $i)
                        <tr class="text-center">
                            <td style="width: 20px;">{{$key+1}}</td>
                            <td>{{$i->nama_barang}}</td>
                            <td class="text-center">
                                <img src="{{ Storage::url('public/barang/').$i->gambar }}" class="rounded" style="width: 100px; height:100px;">
                            </td>                         
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">+ data peminjaman</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('peminjaman.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @METHOD('POST')
      <div class="modal-body">
        <div class="form-group">
            <div class="col-12">
            <label for="nama">nama siswa</label>
            <select id="id_siswa" name="id_siswa" class="form-control custom-select">
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
        <div class="form-group">
          <div class="col-12">
            <label for="nama">nama barang</label>
            <select id="id_barang" name="id_barang" class="form-control custom-select">
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
          <div class="col-12">
            <div class="row">
              <div class="col-6">
                  <label for="nama">Tanggal Peminjaman</label>
                  <input type="date" name="tgl_pinjam" class="form-control">
              </div>
              <div class="col-6">
                  <label for="nama">Deadline Pengembalian</label>
                  <input type="date" name="deadline" class="form-control" oninput="validateForm()">
                  <span id="error-message" style="color: red;"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="save-changes-btn" disabled>Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">+ data peminjaman</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route('peminjaman.update', $i->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- or @method('PATCH') -->
        <div class="modal-body">
          <div class="form-group">
            <div class="col-12">
              <label for="nama">nama siswa</label>
              <input type="text" value="" name="id_siswa" id="siswa" class="form-control" required autofocus readonly>
                <input type="hidden" value="" name="id" id="id" class="form-control" required autofocus readonly>
            </div>
          </div>
          <div class="form-group">
            <div class="col-12">
              <label for="nama">nama barang</label>
              <input type="text" value="" name="id_barang" id="barang" class="form-control" required autofocus readonly>
            </div>
          </div>
          <div class="form-group">
            <div class="col-12">
              <div class="row">
                <div class="col-6">
                  <label for="nama">Tanggal Peminjaman</label>
                  <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control" readonly>
                </div>
                <div class="col-6">
                  <label for="nama">Batas Pengembalian</label>
                  <input type="date" name="deadline" id="deadline" class="form-control" readonly style="color: red;">
                  <!-- <p class="ms-5" style="color: blue;" id="deadline" value="" name="deadline"></p> -->
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">                
                <div class="col-12">
                  <label for="nama">Tanggal Pengembalian</label>
                  <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control">
                  <!-- <p class="ms-5" style="color: blue;" id="deadline" value="" name="deadline"></p> -->
                </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
@push('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    function confirmDelete(url) {
          if (confirm('Are you sure you want to delete this record?')) {
              window.location.href = url;
          }
      }

    $('document').ready(function(){
        $('body').on('click', '.catedit', function(){
            var id = $(this).attr('data-id');
            $.get('test2/' + id).done((res) => {
                // Use properties from the returned data (res)
                $('#siswa').val(res.siswa.nama); 
                $('#barang').val(res.barang.nama_barang); 
                $('#tgl_pinjam').val(res.tgl_pinjam); 
                $('#deadline').val(res.deadline); 
                // $('#deadline').text(res.deadline); // Set text content
                $('#id').val(res.id);
            });
        });
    });

    
    function validateForm() {
        var tglPinjam = new Date(document.getElementsByName("tgl_pinjam")[0].value);
        var deadline = new Date(document.getElementsByName("deadline")[0].value);

        // Validasi deadline
        if (deadline <= tglPinjam) {
            document.getElementById("error-message").innerHTML = "deadline tidak valid";
            // Nonaktifkan tombol jika validasi deadline tidak valid
            document.getElementById("save-changes-btn").disabled = true;
        } else {
            document.getElementById("error-message").innerHTML = "";
        }

        // Validasi semua kolom terisi
        var idSiswa = document.getElementsByName("id_siswa")[0].value;
        var idBarang = document.getElementsByName("id_barang")[0].value;
        var tglPinjamInput = document.getElementsByName("tgl_pinjam")[0].value;
        var deadlineInput = document.getElementsByName("deadline")[0].value;

        if (idSiswa && idBarang && tglPinjamInput && deadlineInput && deadline > tglPinjam) {
            document.getElementById("save-changes-btn").disabled = false;
        } else {
            document.getElementById("save-changes-btn").disabled = true;
        }
    }


    // Panggil fungsi saat input berubah
    document.getElementsByName("id_siswa")[0].addEventListener("input", validateForm);
    document.getElementsByName("id_barang")[0].addEventListener("input", validateForm);
    document.getElementsByName("tgl_pinjam")[0].addEventListener("input", validateForm);
    document.getElementsByName("deadline")[0].addEventListener("input", validateForm);
</script>

@endpush