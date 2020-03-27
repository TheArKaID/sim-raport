@extends('layouts/header')
@section('css')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
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
  <li class="nav-item">
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
  <li class="nav-item active">
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
			<div class="alert" style="border: 1px solid #8000e1; color: #8000e1;" role="alert"><b>! Perhatian : </b>Data siswa dan nilai akan di eksport. data kelas ajar, siswa, dan nilai akan direset ulang</div>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12" id="title-menu">
			<div class="jumbotron text-center" style="background-image: url('{{ asset('images/navbg.jpg')  }}'); color: #fff;">
			  <h1 class="mt-5" id="judul"></h1>
			  <p class="mb-5">~ Mengeksport data-data nilai siswa dan memulai tahun ajar baru ~</p>
			  <p><a class="btn btn-lg btn-eksport" style="background-color: #b854f5; color: #fff;" href="{{ url('/eksport_data') }}" role="button">Mulai Tahun Ajar Baru</a></p>
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
<script type="text/javascript">
	$(document).ready(function() {
		var year = "{{ date('Y') }}";
	    var year_1 = parseInt(year, 10) + 1;
	    var tahun_ajar = "TAHUN AJAR " + year + " - " + year_1;
	    $('#judul').html(tahun_ajar);
	});

	$('.btn-eksport').click(function() {
		Swal.fire({
		  icon: 'success',
		  text: 'Tahun Ajaran Telah Berganti Data Siswa Direset Ulang',
		  showConfirmButton: true,
		})
	})
</script>
@endsection