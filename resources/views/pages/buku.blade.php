@extends('layout.template')

@section('activeDataPerpus')
    activeku
@endsection
@section('activeDataBuku')
    activeku2
@endsection

@section('title')
    Data Buku
@endsection



@section('namaMenu')
    <i class="fa fa-lg fa-angle-double-right"></i> Data Buku
@endsection



@section('link')
    <li class="breadcrumb-item"><a href="{{ url('/', []) }}">Home</a></li>
    <li class="breadcrumb-item active">Data Buku</li>
@endsection



@section('content')
<div id="tambahbuku" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="my-modal-title">Tambah Buku</h5>
        <button class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="{{ route('buku.store') }}" method="post" >
          @csrf
          <div class="card-body" >

          <div class="form-group row">
              <label for="kd_buku" class="col-sm-2 col-form-label">Kode Buku</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @error('kd_buku')
                    is-invalid
                @enderror" id="kd_buku" style="text-transform: uppercase" name="kd_buku" placeholder="KD00x" value="{{old('kd_buku')}}">
                @error('kd_buku')
                  <span class="pesan_error">{{$message}}</span>
                @enderror
              </div>
          </div>
          <div class="form-group row">
              <label for="judul_buku" class="col-sm-2 col-form-label">Judul Buku</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @error('judul_buku')
                    is-invalid
                @enderror" id="judul_buku" style="text-transform: capitalize" name="judul_buku" placeholder="judul buku" value="{{old('judul_buku')}}">
                @error('judul_buku')
                  <span class="pesan_error">{{$message}}</span>
                @enderror
              </div>
          </div>
          <div class="form-group row">
              <label for="pengarang" class="col-sm-2 col-form-label">Pengarang</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @error('pengarang')
                    is-invalid
                @enderror" id="pengarang" style="text-transform: capitalize" name="pengarang" placeholder="pengarang" value="{{old('pengarang')}}">
                @error('pengarang')
                  <span class="pesan_error">{{$message}}</span>
                @enderror
              </div>
          </div>
          <div class="form-group row">
              <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @error('penerbit')
                    is-invalid
                @enderror" id="penerbit" style="text-transform: capitalize" name="penerbit" placeholder="penerbit" value="{{old('penerbit')}}">
                @error('penerbit')
                  <span class="pesan_error">{{$message}}</span>
                @enderror
              </div>
          </div>
          <div class="form-group row">
              <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
              <div class="col-sm-10">
                <input type="number" class="form-control @error('tahun')
                    is-invalid
                @enderror" id="tahun"  name="tahun" placeholder="tahun" value="{{old('tahun')}}">
                @error('tahun')
                  <span class="pesan_error">{{$message}}</span>
                @enderror
              </div>
          </div>
          <div class="form-group row">
              <label for="jenis_buku" class="col-sm-2 col-form-label">J. Buku</label>
              <div class="col-sm-10">
                <select name="jenis_buku" id="jenis_buku" class="form-control" required>
                  <option value="">-- none --</option>
                  @foreach ($jenis_buku as $jenis_buku)
                      <option value="{{ $jenis_buku->id }}" @if (old('jenis_buku')==$jenis_buku->id)
                          selected
                      @endif>{{ ucwords($jenis_buku->jenis_buku) }}</option>
                  @endforeach
                </select>
                @error('jenis_buku')
                  <span class="pesan_error">{{$message}}</span>
                @enderror
              </div>
          </div>
          <div class="form-group row">
              <label for="lokasi_rak" class="col-sm-2 col-form-label">Lokasi Rak</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @error('lokasi_rak')
                    is-invalid
                @enderror" id="lokasi_rak" style="text-transform: capitalize" name="lokasi_rak" placeholder="lokasi rak" value="{{old('lokasi_rak')}}">
                @error('lokasi_rak')
                  <span class="pesan_error">{{$message}}</span>
                @enderror
              </div>
          </div>
          <div class="form-group row">
              <label for="stok" class="col-sm-2 col-form-label">Stok</label>
              <div class="col-sm-10">
                <input type="number" class="form-control @error('stok')
                    is-invalid
                @enderror" id="stok"  name="stok" placeholder="stok" value="{{old('stok')}}">
                @error('stok')
                  <span class="pesan_error">{{$message}}</span>
                @enderror
              </div>
          </div>



          </div>
          <!-- /.card-body -->
          <div class="card-footer ">
              <a href="{{ url('buku', []) }}" style="font-size: 20px">
                  <i class="fa fa-angle-double-left"></i>
                  &nbsp;Kembali
              </a>
            <button type="submit" class="btn btn-secondary float-right mx-2 ">Tambah</button>
            <button type="reset" class="btn btn-secondary float-right mx-2">Reset</button>
          </div>
          <!-- /.card-footer -->
        </form>
      </div>
      
    </div>
  </div>
</div>


<div class="card card-outline card-secondary">
  <div class="card-header">
      <div class="row">
        <div class="col-md-6 text-left">
          <button class="btn btn-success" type="button" data-toggle="modal" data-target="#tambahbuku">Tambah Data Buku</button>



        </div>
        <div class="col-md-6 text-right">
          <form action="{{ url()->current() }}" class="d-inline">
            <div class="form-group top_search">
              <div class="input-group">
                  <input type="text" class="form-control bgku3" name="keyword" value="{{empty($_GET['keyword'])?'':$_GET['keyword']}}" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-default"  type="button">Search</button>
                  </span>
                </div>
            </div>
          </form>
        </div>



      </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    



    <table id="example2" class="table table-sm table-hover table-bordered table-striped tabelku" style="font-size:11pt">
      <thead>
      <tr align="center">
        <th >Kd Buku</th>
        <th>Judul Buku</th>
        <th>Pengarang</th>
        <th>Penerbit</th>
        <th>Tahun</th>
        <th>Jenis B.</th>
        <th>Lok. Rak</th>
        <th>Stok</th>
        <th>Aksi</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($buku as $tampil)
        <tr style="text-transform: capitalize">
          <td>{{$tampil->kd_buku}}</td>
          <td nowrap>{{$tampil->judul_buku}}</td>
          <td nowrap>{{$tampil->pengarang}}</td>
          <td nowrap>{{$tampil->penerbit}}</td>
          <td nowrap>{{$tampil->tahun}}</td>
          <td nowrap>{{$tampil->jenis_buku}}</td>
          <td align="center" nowrap>{{$tampil->lokasi_rak}}</td>
          <td nowrap>{{$tampil->stok}}</td>

          <td nowrap class="text-center">
            <a href="{{ route('buku.edit', $tampil->id) }}" class="btn btn-info btn-xs px-2">
              <i class="fa fa-pencil"></i> Edit
            </a>

            <form action="{{ route('buku.destroy', $tampil->id) }}" method="post" class="d-inline">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="return confirm('Yakin dihapus?..')" class="btn btn-danger btn-xs px-2">
                <i class="fa fa-trash"></i> Hapus
              </button>
            </form>

          </td>
        </tr>
        @endforeach

      </tbody>
    </table>

    <div class="row align-content-center justify-content-center">
      <div class="col-12">
        <div class="card-body float-right">
          {{ $buku->links('vendor.pagination.bootstrap-4') }}
        </div>
      </div>
    </div>


    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">
              <i class="fa fa-print"></i>
              Cetak</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{ url('/cetak/buku', []) }}" method="post" target="_blank">
            @csrf
          <div class="modal-body">


              <div class="form-group">
                <label>Cetak Berdasarkan</label>
                <select class="form-control" onchange="tampilCetak()" name="pilihCetak" id="cetakPilih">
                  <option value="keseluruhan">Keseluruhan</option>
                  <option value="berdasarkan">Berdasarkan</option>
                </select>
              </div>

              <div id="berdasarkanCari" style="display: none" disabled>
                <div class="form-group">
                <label>Cetak Berdasarkan</label>
                <input type="text" id="cari" name="cariCetak" class="form-control" placeholder="id buku/judul/pengarang/penerbit/tahun/jenis buku">
                </div>
              </div>

          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="cetak" class="btn btn-success">Cetak</button>
          </div>
        </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

      <script>
        function tampilCetak()
        {
          var tampil = document.getElementById("cetakPilih").value;
          if(tampil=="berdasarkan"){
            document.getElementById("berdasarkanCari").style.display="block";
            document.getElementById("berdasarkanCari").disabled=false;
          }else{
            document.getElementById("berdasarkanCari").style.display="none";
            document.getElementById("berdasarkanCari").disabled=true;

          }
        }

      </script>
  </div>
</div>
@endsection












