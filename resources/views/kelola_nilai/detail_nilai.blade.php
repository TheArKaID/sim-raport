@extends('layouts/header')
@section('nav')
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-file-alt"></i>
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
    <div class="col-lg-12 mb-4">
      <div class="card bg-success text-white shadow" id="card-welcome">
        <div class="card-body text-center">
          <h3>Kelola Nilai Siswa</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ url('/simpan_akun') }}">
              @csrf
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Nama</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="name">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-block">Edit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
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
            <td class="text-center"><a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Kelola Nilai</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
@section('script')
<script type="text/javascript">
$(document).on('click','.open_modal',function(){
  var url = "domain.com/yoururl";
  var tour_id= $(this).val();
  $.get(url + '/' + tour_id, function (data) {
      //success data
      console.log(data);
      $('#tour_id').val(data.id);
      $('#name').val(data.name);
      $('#details').val(data.details);
      $('#btn-save').val("update");
      $('#myModal').modal('show');
  }) 
});
</script>
@endsection