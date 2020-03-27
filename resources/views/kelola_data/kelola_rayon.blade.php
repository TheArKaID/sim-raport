@extends('layouts/header')
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
  <li class="nav-item active">
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
		<div class="col-lg-12 col-sm-12" id="title-menu">
	      <div class="media">
	        <img src="{{ asset('icon/network.png') }}" class="mr-3 rounded" alt="..." style="background-color: #fff; padding: 10px; width: 65px; box-shadow: 3px 3px rgba(0,0,0,.2);">
	        <div class="media-body">
	          <h5 class="mt-1" style="color: #3e3d3e; font-weight: bold;">Kelola Rayon</h5>
	          Kelola data rayon sekolah
	        </div>
	      </div>
	    </div>
	</div>
	<div class="row mt-4">
		<div class="col-lg-4">
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">CIAWI (CIA)</h6>
				</div>
				<div class="card-body">
					<div class="row mb-3">
						<div class="col-md-12">
							<ul class="list-group">
							@foreach($cias as $cia)
							  <li class="list-group-item d-flex justify-content-between align-items-center">
							    <b>{{ $cia->jml_rayon }} | </b>{{ $cia->name }}
							    <a href="{{ url('/hapus_rayon/'. $cia->id) }}">
							    	<span class="badge badge-primary badge-pill">X</span>
							    </a>
							  </li>
							@endforeach
							</ul>
						</div>
					</div>
					@if(\App\Rayon::select('rayons.*')->where('daerah', 'Ciawi')->count() < 7)
					<form action="{{ url('/tambah_rayon/Cia/Ciawi') }}" method="POST">
						@csrf
						<div class="row">
							<div class="col-md-10">
								<select class="form-control" name="kd_guru" required="">
							      <option value="">-- Pilih Pembimbing --</option>
							      @foreach($users as $user)
							      @if($user->role != 'Kurikulum')
							      <option value="{{ $user->kd_guru }}">{{ $user->name }}</option>
							      @endif
							      @endforeach
							    </select>
							</div>
							<div class="col-md-2">
								<button type="submit" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">+</button>
							</div>
						</div>
					</form>
					@endif
				</div>
			</div>
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">CISARUA (CIS)</h6>
				</div>
				<div class="card-body">
					<div class="row mb-3">
						<div class="col-md-12">
							<ul class="list-group">
							@foreach($ciss as $cis)
							  <li class="list-group-item d-flex justify-content-between align-items-center">
							    <b>{{ $cis->jml_rayon }} | </b>{{ $cis->name }}
							    <a href="{{ url('/hapus_rayon/'. $cis->id) }}">
							    	<span class="badge badge-primary badge-pill">X</span>
							    </a>
							  </li>
							@endforeach
							</ul>
						</div>
					</div>
					@if(\App\Rayon::select('rayons.*')->where('daerah', 'Cisarua')->count() < 7)
					<form action="{{ url('/tambah_rayon/Cis/Cisarua') }}" method="POST">
						@csrf
						<div class="row">
							<div class="col-md-10">
								<select class="form-control" name="kd_guru" required="">
							      <option value="">-- Pilih Pembimbing --</option>
							      @foreach($users as $user)
							      @if($user->role != 'Kurikulum')
							      <option value="{{ $user->kd_guru }}">{{ $user->name }}</option>
							      @endif
							      @endforeach
							    </select>
							</div>
							<div class="col-md-2">
								<button type="submit" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">+</button>
							</div>
						</div>
					</form>
					@endif
				</div>
			</div>
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">CICURUG (CIC)</h6>
				</div>
				<div class="card-body">
					<div class="row mb-3">
						<div class="col-md-12">
							<ul class="list-group">
							@foreach($cics as $cic)
							  <li class="list-group-item d-flex justify-content-between align-items-center">
							    <b>{{ $cic->jml_rayon }} | </b>{{ $cic->name }}
							    <a href="{{ url('/hapus_rayon/'. $cic->id) }}">
							    	<span class="badge badge-primary badge-pill">X</span>
							    </a>
							  </li>
							@endforeach
							</ul>
						</div>
					</div>
					@if(\App\Rayon::select('rayons.*')->where('daerah', 'Cicurug')->count() < 7)
					<form action="{{ url('/tambah_rayon/Cic/Cicurug') }}" method="POST">
						@csrf
						<div class="row">
							<div class="col-md-10">
								<select class="form-control" name="kd_guru" required="">
							      <option value="">-- Pilih Pembimbing --</option>
							      @foreach($users as $user)
							      @if($user->role != 'Kurikulum')
							      <option value="{{ $user->kd_guru }}">{{ $user->name }}</option>
							      @endif
							      @endforeach
							    </select>
							</div>
							<div class="col-md-2">
								<button type="submit" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">+</button>
							</div>
						</div>
					</form>
					@endif
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">CIBEDUG (CIB)</h6>
				</div>
				<div class="card-body">
					<div class="row mb-3">
						<div class="col-md-12">
							<ul class="list-group">
							@foreach($cibs as $cib)
							  <li class="list-group-item d-flex justify-content-between align-items-center">
							    <b>{{ $cib->jml_rayon }} | </b>{{ $cib->name }}
							    <a href="{{ url('/hapus_rayon/'. $cib->id) }}">
							    	<span class="badge badge-primary badge-pill">X</span>
							    </a>
							  </li>
							@endforeach
							</ul>
						</div>
					</div>
					@if(\App\Rayon::select('rayons.*')->where('daerah', 'Cibedug')->count() < 7)
					<form action="{{ url('/tambah_rayon/Cib/Cibedug') }}" method="POST">
						@csrf
						<div class="row">
							<div class="col-md-10">
								<select class="form-control" name="kd_guru" required="">
							      <option value="">-- Pilih Pembimbing --</option>
							      @foreach($users as $user)
							      @if($user->role != 'Kurikulum')
							      <option value="{{ $user->kd_guru }}">{{ $user->name }}</option>
							      @endif
							      @endforeach
							    </select>
							</div>
							<div class="col-md-2">
								<button type="submit" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">+</button>
							</div>
						</div>
					</form>
					@endif
				</div>
			</div>
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">TAJUR (TAJ)</h6>
				</div>
				<div class="card-body">
					<div class="row mb-3">
						<div class="col-md-12">
							<ul class="list-group">
							@foreach($tajs as $taj)
							  <li class="list-group-item d-flex justify-content-between align-items-center">
							    <b>{{ $taj->jml_rayon }} | </b>{{ $taj->name }}
							    <a href="{{ url('/hapus_rayon/'. $taj->id) }}">
							    	<span class="badge badge-primary badge-pill">X</span>
							    </a>
							  </li>
							@endforeach
							</ul>
						</div>
					</div>
					@if(\App\Rayon::select('rayons.*')->where('daerah', 'Tajur')->count() < 7)
					<form action="{{ url('/tambah_rayon/Taj/Tajur') }}" method="POST">
						@csrf
						<div class="row">
							<div class="col-md-10">
								<select class="form-control" name="kd_guru" required="">
							      <option value="">-- Pilih Pembimbing --</option>
							      @foreach($users as $user)
							      @if($user->role != 'Kurikulum')
							      <option value="{{ $user->kd_guru }}">{{ $user->name }}</option>
							      @endif
							      @endforeach
							    </select>
							</div>
							<div class="col-md-2">
								<button type="submit" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">+</button>
							</div>
						</div>
					</form>
					@endif
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">SUKASARI (SUK)</h6>
				</div>
				<div class="card-body">
					<div class="row mb-3">
						<div class="col-md-12">
							<ul class="list-group">
							@foreach($suks as $suk)
							  <li class="list-group-item d-flex justify-content-between align-items-center">
							    <b>{{ $suk->jml_rayon }} | </b>{{ $suk->name }}
							    <a href="{{ url('/hapus_rayon/'. $suk->id) }}">
							    	<span class="badge badge-primary badge-pill">X</span>
							    </a>
							  </li>
							@endforeach
							</ul>
						</div>
					</div>
					@if(\App\Rayon::select('rayons.*')->where('daerah', 'Sukasari')->count() < 7)
					<form action="{{ url('/tambah_rayon/Suk/Sukasari') }}" method="POST">
						@csrf
						<div class="row">
							<div class="col-md-10">
								<select class="form-control" name="kd_guru" required="">
							      <option value="">-- Pilih Pembimbing --</option>
							      @foreach($users as $user)
							      @if($user->role != 'Kurikulum')
							      <option value="{{ $user->kd_guru }}">{{ $user->name }}</option>
							      @endif
							      @endforeach
							    </select>
							</div>
							<div class="col-md-2">
								<button type="submit" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">+</button>
							</div>
						</div>
					</form>
					@endif
				</div>
			</div>
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">WIKRAMA (WIK)</h6>
				</div>
				<div class="card-body">
					<div class="row mb-3">
						<div class="col-md-12">
							<ul class="list-group">
							@foreach($wiks as $wik)
							  <li class="list-group-item d-flex justify-content-between align-items-center">
							    <b>{{ $wik->jml_rayon }} | </b>{{ $wik->name }}
							    <a href="{{ url('/hapus_rayon/'. $wik->id) }}">
							    	<span class="badge badge-primary badge-pill">X</span>
							    </a>
							  </li>
							@endforeach
							</ul>
						</div>
					</div>
					@if(\App\Rayon::select('rayons.*')->where('daerah', 'Wikrama')->count() < 7)
					<form action="{{ url('/tambah_rayon/Wik/Wikrama') }}" method="POST">
						@csrf
						<div class="row">
							<div class="col-md-10">
								<select class="form-control" name="kd_guru" required="">
							      <option value="">-- Pilih Pembimbing --</option>
							      @foreach($users as $user)
							      @if($user->role != 'Kurikulum')
							      <option value="{{ $user->kd_guru }}">{{ $user->name }}</option>
							      @endif
							      @endforeach
							    </select>
							</div>
							<div class="col-md-2">
								<button type="submit" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">+</button>
							</div>
						</div>
					</form>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
@if ($message = Session::get('save'))
Swal.fire({
  icon: 'success',
  text: '{{ $message }}',
  showConfirmButton: false,
  timer: 1500
})
@endif

@if ($message = Session::get('delete'))
Swal.fire({
  icon: 'success',
  text: '{{ $message }}',
  showConfirmButton: false,
  timer: 1500
})
@endif
</script>
@endsection