@extends('layouts/header')
@section('css')
<style type="text/css">
	#background-image-card{
		background-color: #aaa;
	}
</style>
@endsection
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
      @if(auth()->user()->role == 'Kurikulum')
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
      @endif
      <hr class="sidebar-divider d-none d-md-block">
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
@endsection
@section('isi')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 text-left">
      <a href="{{ url('/kelola_akun') }}" class="btn btn-primary">Kembali</a>
    </div>
  </div>
</div>
<div class="row">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ url('/update_akun/'.$user->id) }}" enctype="multipart/form-data">
              @csrf
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Kode Guru</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="kd_guru" value="{{ $user->kd_guru }}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Nama</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Role</label>
                <div class="col-sm-8">
                    <select id="inputState" class="form-control" name="role">
                      @if($user->role == 'Guru')
                      <option value="Kurikulum">Kurikulum</option>
                      <option value="Guru" selected="">Guru</option>
                      @endif
                      @if($user->role == 'Kurikulum')
                      <option value="Kurikulum" selected="">Kurikulum</option>
                      <option value="Guru">Guru</option>
                      @endif
                    </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Username</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="username" value="{{ $user->email }}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Foto</label>
                <div class="col-sm-8">
                  <input type="file" name="avatar">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-block">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
	<div class="col-lg-8 ml-4 mt-4 mr-4 mb-4">
		<div class="card-group">
		  <div class="card" id="background-image-card">
		    <img src="{{ $user->getAvatar() }}" class="card-img-top w-50 align-self-center pt-4 pb-2">
		  </div>
		  <div class="card">
		    <div class="card-body">
				  <ul class="list-group list-group-flush">
				    <li class="list-group-item">Kode Guru &nbsp;: {{ $user->kd_guru }}</li>
				    <li class="list-group-item">Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $user->name }}</li>
				    <li class="list-group-item">Role &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $user->role }}</li>
				  </ul><br>
          <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center list-group-item-primary" style="font-weight: bold;">
              Kelas Ajar
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              RPL X-3
              <a href=""><span class="badge badge-danger badge-pill">X</span></a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              RPL X-4
              <a href=""><span class="badge badge-danger badge-pill">X</span></a>
            </li>
          </ul><br>
          <a href=""><i class="fa fa-plus"></i>Tambah Kelas</a>
		    </div>
		    <div class="card-footer">
		      <a href="" class="btn btn-primary pl-4 pr-4" data-toggle="modal" data-target="#exampleModal">Edit</a>
		    </div>
		  </div>
		</div>
	</div>
</div>
@endsection