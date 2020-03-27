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
		<div class="col-lg-12 col-md-12 col-sm-12" id="title-menu">
	      <div class="media">
	        <img src="{{ asset('icon/report_1.png') }}" class="mr-3 rounded" alt="..." style="background-color: #fff; padding: 10px; width: 60px; box-shadow: 3px 3px rgba(0,0,0,.2);">
	        <div class="media-body">
	          <h5 class="mt-1" style="color: #3e3d3e; font-weight: bold;">Kelola Raport</h5>
	          Kelola raport ujian siswa
	        </div>
	      </div>
	    </div>
	</div>
	<div class="row mt-4">
		<div class="col-lg-12 col-md-12 col-sm-12 mb-2">
			<div class="input-group mb-2 mr-sm-2">
			    <div class="input-group-prepend">
			      <div class="input-group-text" style="color: #fff; background-color: #7a00e2;"><i class="fas fa-filter"></i></div>
			    </div>
			    <select class="form-control" id="pilih_daerah">
			    	<option value="">-- Pilih Daerah --</option>
			    	<option value="Cisarua">Cisarua</option>
			    	<option value="Cibedug">Cibedug</option>
			    	<option value="Cicurug">Cicurug</option>
			    	<option value="Ciawi">Ciawi</option>
			    	<option value="Tajur">Tajur</option>
			    	<option value="Sukasari">Sukasari</option>
			    	<option value="Wikrama">Wikrama</option>
			    </select>
			  </div>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="card shadow mb-4">
	            <div class="card-header py-3">
	              <h6 class="m-0 font-weight-bold text-primary">Daftar Rayon</h6>
	            </div>
	            <div class="card-body">
	            	<div class="table-responsive">
		                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
		                  <thead class="text-center">
		                    <tr>
		                      <th>No</th>
		                      <th>Rayon</th>
		                      <th>Daerah</th>
		                      <th>Pembimbing</th>
		                      <th>Jumlah Siswa</th>
		                      <th>Aksi</th>
		                    </tr>
		                  </thead>
		                  <tbody id="daftarRayon">
		                  	
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
<script type="text/javascript">

	function tampilRayon() {
		$.ajax({
			url: "{{ url('/tabel_rayon_raport') }}",
			success:function(data)
			{
				$('#daftarRayon').html(data);
			}
		});
	}

	tampilRayon();

	$(document).ready(function() {
		$('#pilih_daerah').change(function() {
			if($(this).val() == '')
			{
				tampilRayon();
			}else{
				var daerah = $(this).val();
				$.ajax({
					method: "GET",
					url: "{{ url('/sort_rayon_raport') }}/" + daerah,
					success:function(data)
					{
						$('#daftarRayon').html(data);
					}
				})
			}
		});
	});
</script>
@endsection