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
        <a class="nav-link" href="{{ url('/kelola_akun') }}">
          <i class="fas fa-users"></i>
          <span>Kelola Akun</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/') }}">
          <i class="far fa-file-alt"></i>
          <span>Kelola Raport</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/') }}">
          <i class="far fa-address-card"></i>
          <span>Kelola Kelas</span></a>
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
    <div class="col-lg-12 mb-4">
      <div class="card bg-success text-white shadow" id="card-welcome">
        <div class="card-body text-center">
          <h3>Kelola Akun dan Hak Akses</h3>
        </div>
      </div>
    </div>
    <div class="col-lg-12 mb-4">
      <a href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Data</a>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ url('/simpan_akun') }}">
              @csrf
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Kode Guru</label>
                <div class="col-sm-8">
                  
                  <input type="text" class="form-control" name="kd_guru" readonly="" value="{{ $max4 }}">
                  
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Nama</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="name">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Role</label>
                <div class="col-sm-8" id="edit-type-wrapper">
                    <select id="inputState" class="form-control" name="role">
                      <option value="Guru">Guru</option>
                      <option value="Kurikulum">Kurikulum</option>
                    </select>
                </div>
              </div>
              <div class="form-group row mapel_select">
                <label class="col-sm-4 col-form-label">Mapel</label>
                <div class="col-sm-8">
                    <select id="inputState" class="form-control" name="mapel">
                      @foreach($mapel as $m)
                      <option value="{{ $m->mapel }}">{{ $m->mapel }}</option>
                      @endforeach
                    </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Username</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="username">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Password</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" name="password">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-block">Save</button>
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
            <th scope="col">Kode Guru</th>
            <th scope="col">Nama</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($user as $u)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $u->kd_guru }}</td>
            <td>{{ $u->name }}</td>
            <td>{{ $u->role }}</td>
            <td class="text-center"><a href="{{ url('/detail_akun', $u->id) }}" class="btn btn-primary">Detail <i class="fa fa-search fa-lg"></i></a>  <a href="{{ url('/hapus_akun', $u->kd_guru) }}" class="btn btn-danger">Hapus <i class="far fa-trash-alt fa-lg"></i></a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
$(document).ready( function() {
  $('#edit-type-wrapper select').change(function() {
     if($(this).val() == "Kurikulum"){
       $('.mapel_select').hide();
     } else {
       $('.mapel_select').show();
     }
  });
});
</script>
@endsection