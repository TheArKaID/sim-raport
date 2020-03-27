@extends('layouts/header')
@section('css')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<style type="text/css">
  .backkelola{
    color: grey;
    text-decoration: none;
  }
  .backkelola:hover{
    color: #7a00e2;
    text-decoration: none;
  }
</style>
@endsection
@section('nav')
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-image: url('{{ asset('images/navbg.jpg')  }}');">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/dashboard')}}">
    <div class="sidebar-brand-icon rotate-n-15">
      <img src="{{ asset('icon/icon-2.png') }}" style="width: 40px;">
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
    <a class="nav-link" href="{{ url('/profile') }}">
      <i class="fas fa-user"></i>
      <span>Profile</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ url('/kelola_akun') }}">
      <i class="fas fa-users"></i>
      <span>Kelola Akun</span></a>
  </li>
  <li class="nav-item active">
    <a class="nav-link" href="{{ url('/kelola_raport') }}">
      <i class="far fa-file-alt"></i>
      <span>Kelola Raport</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
      <i class="far fa-address-card"></i>
      <span>Kelola Data</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Menu:</h6>
        <a class="collapse-item" href="{{ url('/kelola_rombel') }}">Rombel</a>
        <a class="collapse-item" href="{{ url('/kelola_rayon') }}">Rayon</a>
        <a class="collapse-item" href="{{ url('/kelola_siswa') }}">Siswa</a>
      </div>
    </div>
  </li>
  <hr class="sidebar-divider my-0">
  <li class="nav-item">
    <a class="nav-link" href="{{ url('/tahun_ajaran') }}">
      <i class="fas fa-school"></i>
      <span>Tahun Ajaran Baru</span></a>
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
		<div class="col-lg-12 col-md-12 col-sm-12">
		  <nav aria-label="breadcrumb">
	        <ol class="breadcrumb shadow" style="background-color: #fff;">
	          <li class="breadcrumb-item"><a href="{{ url('/kelola_raport') }}" class="backkelola">Kelola Raport</a></li>
	          <li class="breadcrumb-item active" aria-current="page">{{ $rayons->rayon }}</li>
	        </ol>
	      </nav>
	    </div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="card shadow mb-4">
	            <div class="card-header py-3">
	              <h6 class="m-0 font-weight-bold text-primary">Daftar Siswa Rayon {{ $rayons->rayon }}</h6>
	            </div>
	            <div class="card-body">
	            	<div class="table-responsive">
		                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		                  <thead class="text-center">
		                    <tr>
		                      <th>No</th>
		                      <th>NIS</th>
		                      <th>Nama</th>
		                      <th>JK</th>
		                      <th>Rombel</th>
		                      <th>Aksi</th>
		                    </tr>
		                  </thead>
		                  <tbody>
		                  	@foreach($siswas as $siswa)
		                  	<tr>
		                  		<td>{{ $loop->iteration }}</td>
		                  		<td>{{ $siswa->nis }}</td>
		                  		<td>{{ $siswa->nama }}</td>
		                  		<td>{{ $siswa->jk }}</td>
		                  		<td>{{ $siswa->rombel }}</td>
		                  		<td class="text-center">
		                  			<a href="{{ url('/kelola_raport/data_siswa/' . $rayons->kd_rayon . '/' . $siswa->nis) }}" class="btn detailakun btn-icon-split" style="background-color: #b854f5; color: #fff;">
				                      <span class="icon text-white-50">
				                          <i class="fas fa-print"></i>
				                        </span>
				                        <span class="text">Cetak Raport</span>
				                    </a>
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
</div>
@endsection
@section('script')
<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection