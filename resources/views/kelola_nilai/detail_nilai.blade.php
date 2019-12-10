@extends('layouts/header')
@section('nav')
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
          <!-- <i class="fas fa-file-alt"></i> -->
        </div>
        <div class="sidebar-brand-text mx-3">SIM RAPORT</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/dashboard') }}">
          <i class="fas fa-home"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/lihat_akun') }}">
          <i class="fas fa-user"></i>
          <span>Lihat Akun</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/kelola_nilai', auth()->user()->kd_guru) }}">
          <i class="fas fa-calculator"></i>
          <span>Kelola Nilai</span></a>
      </li>
      <hr class="sidebar-divider d-none d-md-block">
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
@endsection
@section('isi')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 mb-4"><a href="{{ url('/kelola_nilai', auth()->user()->kd_guru) }}" class="btn btn-success">Kembali</a></div>
  </div>
  <div class="row">
    <div class="col-lg-12 mb-3">
      <div class="card bg-success text-white shadow" id="card-welcome">
        <div class="card-body text-center">
          <h3>Kelola Nilai Siswa</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4 mb-4">
      @if($cek_kkm == 0)
      <form method="POST" action="{{ url('/input_kkm/'.auth()->user()->kd_guru.'/'.$kd_rombel.'/'.auth()->user()->mapel) }}">
        @csrf
        <div class="form-group row">
          <label class="col-sm-2 col-form-label" style="font-weight: bold;">KKM</label>
          <div class="col-sm-4">
            <input type="number" id="nilaiKkm" class="form-control" name="kkm">
          </div>
          <div class="col-sm-4">
            <button class="btn btn-success" type="submit">Simpan</button>
          </div>
          <div class="col-sm-2"></div>
        </div>
      </form>
      @elseif($cek_kkm > 0)
      <form method="POST" action="{{ url('/update_kkm/'.auth()->user()->kd_guru.'/'.$kd_rombel.'/'.auth()->user()->mapel) }}">
        @csrf
        <div class="form-group row">
          <label class="col-sm-2 col-form-label" style="font-weight: bold;">KKM</label>
          <div class="col-sm-4">
            @foreach($tampil_kkm as $kkm)
            <input type="number" id="nilaiKkm" class="form-control" name="kkm" value="{{ $kkm->kkm }}" readonly="">
            @endforeach
          </div>
          <div class="col-sm-4">
            <button class="btn btn-success" id="editKkm" type="button">Edit</button>
            <button class="btn btn-success" id="simpanKkm" type="submit" hidden="">Simpan</button>
          </div>
          <div class="col-sm-2"></div>
        </div>
      </form>
      @endif
    </div>
    <div class="col-sm-4"></div>
  </div>
<!--   <div class="row">
    <div class="modal fade" id="editContent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" id="editClose" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ url('/simpan_akun') }}">
              @csrf
              <div class="form-group row">
                <div class="col-sm-8">
                  <input type="text" hidden="" class="form-control" name="" id="nama">
                  <input type="text" hidden="" class="form-control" name="" id="nis">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 offset-sm-1 col-form-label">UH 1</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" disabled="" id="nilai1" name="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 offset-sm-1 col-form-label">UH 2</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" disabled="" id="nilai2" name="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 offset-sm-1 col-form-label">UTS GANJIL</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" disabled="" id="nilai3" name="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 offset-sm-1 col-form-label">UH 3</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" disabled="" id="nilai4" name="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 offset-sm-1 col-form-label">UH 4</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" disabled="" id="nilai5" name="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 offset-sm-1 col-form-label">UAS GANJIL</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" disabled="" id="nilai6" name="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 offset-sm-1 col-form-label">UH 5</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" disabled="" id="nilai7" name="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 offset-sm-1 col-form-label">UH 6</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" disabled="" id="nilai8" name="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 offset-sm-1 col-form-label">UTS GENAP</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" disabled="" id="nilai9" name="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 offset-sm-1 col-form-label">UH 7</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" disabled="" id="nilai10" name="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 offset-sm-1 col-form-label">UH 8</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" disabled="" id="nilai11" name="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 offset-sm-1 col-form-label">UKK GENAP</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" disabled="" id="nilai12" name="">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success btn-block" id="editBtn">Edit</button>
                <button type="submit" class="btn btn-primary btn-block" id="updateBtn">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <div class="row">
    <div class="col-lg-12 mb-4">
      <table class="table table-bordered" id="dataTable">
        <thead class="text-center">
          <tr>
            <th scope="col" class="bg-success" style="color: #fff;">#</th>
            <th scope="col">NIS</th>
            <th scope="col">Nama</th>
            <th scope="col">Rayon</th>
            <th scope="col">Rombel</th>
            <th scope="col">Opsi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($daftar_siswa as $siswa)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $siswa->nis }}</td>
            <td>{{ $siswa->nama }}</td>
            <td>{{ $siswa->rayon }}</td>
            <td>{{ $siswa->rombel }}</td>
            <td class="text-center">
              @foreach($tampil_kkm as $kkm)
              <a href="{{ url('/kelola_nilai_siswa/'. $siswa->nis . '/' . $kd_rombel . '/' . auth()->user()->mapel.'/'.$kkm->kkm) }}" class="btn btn-primary">Kelola Nilai</a>
              @endforeach
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
@section('script')
<script type="text/javascript">
  $('#editKkm').click(function() {
    $('#nilaiKkm').prop("readonly", false);
    $('#simpanKkm').prop("hidden", false);
    $('#editKkm').hide();
  });
</script>
<!-- <script type="text/javascript">
  $('#editContent').on('show.bs.modal', function(e){
      $(this).find('#nama').val($(e.relatedTarget).data('nama'));
      $(this).find('#nis').val($(e.relatedTarget).data('nis'));
      $('#exampleModalLabel').text($(this).find('#nis').val() +" - "+ $(this).find('#nama').val());
      $("#updateBtn").hide();
  });

  $("#editBtn").click(function(){
      $("#nilai1").prop("disabled", false);
      $("#nilai2").prop("disabled", false);
      $("#nilai3").prop("disabled", false);
      $("#nilai4").prop("disabled", false);
      $("#nilai5").prop("disabled", false);
      $("#nilai6").prop("disabled", false);
      $("#nilai7").prop("disabled", false);
      $("#nilai8").prop("disabled", false);
      $("#nilai9").prop("disabled", false);
      $("#nilai10").prop("disabled", false);
      $("#nilai11").prop("disabled", false);
      $("#nilai12").prop("disabled", false);
      $("#editBtn").hide();
      $("#updateBtn").show();
  });

  $("#editClose").click(function(){
      $("#nilai1").prop("disabled", true);
      $("#nilai2").prop("disabled", true);
      $("#nilai3").prop("disabled", true);
      $("#nilai4").prop("disabled", true);
      $("#nilai5").prop("disabled", true);
      $("#nilai6").prop("disabled", true);
      $("#nilai7").prop("disabled", true);
      $("#nilai8").prop("disabled", true);
      $("#nilai9").prop("disabled", true);
      $("#nilai10").prop("disabled", true);
      $("#nilai11").prop("disabled", true);
      $("#nilai12").prop("disabled", true);
      $("#updateBtn").hide();
      $("#editBtn").show();
  });
</script> -->
@endsection