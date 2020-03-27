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
	        <img src="{{ asset('icon/school.png') }}" class="mr-3 rounded" alt="..." style="background-color: #fff; padding: 10px; width: 65px; box-shadow: 3px 3px rgba(0,0,0,.2);">
	        <div class="media-body">
	          <h5 class="mt-1" style="color: #3e3d3e; font-weight: bold;">Kelola Rombel</h5>
	          Kelola data rombel sekolah
	        </div>
	      </div>
	    </div>
	</div>
	<div class="row mt-4">
		<div class="col-lg-4">
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Rekayasa Perangkat Lunak (RPL)</h6>
				</div>
				<div class="card-body">
					<p>Kelas X</p>
					@foreach($rpls as $rpl)
					@if($rpl->tingkat == 1)
					<a href="{{ url('/hapus_rombel/'.$rpl->id) }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">{{ $rpl->jml_rombel }}</a>
					@endif
					@endforeach
					@if(\App\Rombel::select('rombels.*')->where('singkatan_jurusan', 'RPL')->where('tingkat', 1)->count() < 4)
					<a href="{{ url('/tambah_rombel/RPL/1/X') }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">+</a>
					@endif
					<hr>
					<p>Kelas XI</p>
					@foreach($rpls as $rpl)
					@if($rpl->tingkat == 2)
					<a href="{{ url('/hapus_rombel/'.$rpl->id) }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">{{ $rpl->jml_rombel }}</a>
					@endif
					@endforeach
					@if(\App\Rombel::select('rombels.*')->where('singkatan_jurusan', 'RPL')->where('tingkat', 2)->count() < 4)
					<a href="{{ url('/tambah_rombel/RPL/2/XI') }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">+</a>
					@endif
					<hr>
					<p>Kelas XII</p>
					@foreach($rpls as $rpl)
					@if($rpl->tingkat == 3)
					<a href="{{ url('/hapus_rombel/'.$rpl->id) }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">{{ $rpl->jml_rombel }}</a>
					@endif
					@endforeach
					@if(\App\Rombel::select('rombels.*')->where('singkatan_jurusan', 'RPL')->where('tingkat', 3)->count() < 4)
					<a href="{{ url('/tambah_rombel/RPL/3/XII') }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">+</a>
					@endif
				</div>
			</div>
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Tataboga (TBG)</h6>
				</div>
				<div class="card-body">
					<p>Kelas X</p>
					@foreach($tbgs as $tbg)
					@if($tbg->tingkat == 1)
					<a href="{{ url('/hapus_rombel/'.$tbg->id) }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">{{ $tbg->jml_rombel }}</a>
					@endif
					@endforeach
					@if(\App\Rombel::select('rombels.*')->where('singkatan_jurusan', 'TBG')->where('tingkat', 1)->count() < 4)
					<a href="{{ url('/tambah_rombel/TBG/1/X') }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">+</a>
					@endif
					<hr>
					<p>Kelas XI</p>
					@foreach($tbgs as $tbg)
					@if($tbg->tingkat == 2)
					<a href="{{ url('/hapus_rombel/'.$tbg->id) }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">{{ $tbg->jml_rombel }}</a>
					@endif
					@endforeach
					@if(\App\Rombel::select('rombels.*')->where('singkatan_jurusan', 'TBG')->where('tingkat', 2)->count() < 4)
					<a href="{{ url('/tambah_rombel/TBG/2/XI') }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">+</a>
					@endif
					<hr>
					<p>Kelas XII</p>
					@foreach($tbgs as $tbg)
					@if($tbg->tingkat == 3)
					<a href="{{ url('/hapus_rombel/'.$tbg->id) }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">{{ $tbg->jml_rombel }}</a>
					@endif
					@endforeach
					@if(\App\Rombel::select('rombels.*')->where('singkatan_jurusan', 'TBG')->where('tingkat', 3)->count() < 4)
					<a href="{{ url('/tambah_rombel/TBG/3/XII') }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">+</a>
					@endif
				</div>
			</div>
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Otomatisasi dan Tata Kelola Perkantoran (OTKP)</h6>
				</div>
				<div class="card-body">
					<p>Kelas X</p>
					@foreach($otkps as $otkp)
					@if($otkp->tingkat == 1)
					<a href="{{ url('/hapus_rombel/'.$otkp->id) }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">{{ $otkp->jml_rombel }}</a>
					@endif
					@endforeach
					@if(\App\Rombel::select('rombels.*')->where('singkatan_jurusan', 'OTKP')->where('tingkat', 1)->count() < 4)
					<a href="{{ url('/tambah_rombel/OTKP/1/X') }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">+</a>
					@endif
					<hr>
					<p>Kelas XI</p>
					@foreach($otkps as $otkp)
					@if($otkp->tingkat == 2)
					<a href="{{ url('/hapus_rombel/'.$otkp->id) }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">{{ $otkp->jml_rombel }}</a>
					@endif
					@endforeach
					@if(\App\Rombel::select('rombels.*')->where('singkatan_jurusan', 'OTKP')->where('tingkat', 2)->count() < 4)
					<a href="{{ url('/tambah_rombel/OTKP/2/XI') }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">+</a>
					@endif
					<hr>
					<p>Kelas XII</p>
					@foreach($otkps as $otkp)
					@if($otkp->tingkat == 3)
					<a href="{{ url('/hapus_rombel/'.$otkp->id) }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">{{ $otkp->jml_rombel }}</a>
					@endif
					@endforeach
					@if(\App\Rombel::select('rombels.*')->where('singkatan_jurusan', 'OTKP')->where('tingkat', 3)->count() < 4)
					<a href="{{ url('/tambah_rombel/OTKP/3/XII') }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">+</a>
					@endif
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Bisnis Daring Pemasaran (BDP)</h6>
				</div>
				<div class="card-body">
					<p>Kelas X</p>
					@foreach($bdps as $bdp)
					@if($bdp->tingkat == 1)
					<a href="{{ url('/hapus_rombel/'.$bdp->id) }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">{{ $bdp->jml_rombel }}</a>
					@endif
					@endforeach
					@if(\App\Rombel::select('rombels.*')->where('singkatan_jurusan', 'BDP')->where('tingkat', 1)->count() < 4)
					<a href="{{ url('/tambah_rombel/BDP/1/X') }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">+</a>
					@endif
					<hr>
					<p>Kelas XI</p>
					@foreach($bdps as $bdp)
					@if($bdp->tingkat == 2)
					<a href="{{ url('/hapus_rombel/'.$bdp->id) }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">{{ $bdp->jml_rombel }}</a>
					@endif
					@endforeach
					@if(\App\Rombel::select('rombels.*')->where('singkatan_jurusan', 'BDP')->where('tingkat', 2)->count() < 4)
					<a href="{{ url('/tambah_rombel/BDP/2/XI') }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">+</a>
					@endif
					<hr>
					<p>Kelas XII</p>
					@foreach($bdps as $bdp)
					@if($bdp->tingkat == 3)
					<a href="{{ url('/hapus_rombel/'.$bdp->id) }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">{{ $bdp->jml_rombel }}</a>
					@endif
					@endforeach
					@if(\App\Rombel::select('rombels.*')->where('singkatan_jurusan', 'BDP')->where('tingkat', 3)->count() < 4)
					<a href="{{ url('/tambah_rombel/BDP/3/XII') }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">+</a>
					@endif
				</div>
			</div>
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Teknik Komputer dan Jaringan (TKJ)</h6>
				</div>
				<div class="card-body">
					<p>Kelas X</p>
					@foreach($tkjs as $tkj)
					@if($tkj->tingkat == 1)
					<a href="{{ url('/hapus_rombel/'.$tkj->id) }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">{{ $tbg->jml_rombel }}</a>
					@endif
					@endforeach
					@if(\App\Rombel::select('rombels.*')->where('singkatan_jurusan', 'TKJ')->where('tingkat', 1)->count() < 4)
					<a href="{{ url('/tambah_rombel/TKJ/1/X') }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">+</a>
					@endif
					<hr>
					<p>Kelas XI</p>
					@foreach($tkjs as $tkj)
					@if($tkj->tingkat == 2)
					<a href="{{ url('/hapus_rombel/'.$tkj->id) }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">{{ $tkj->jml_rombel }}</a>
					@endif
					@endforeach
					@if(\App\Rombel::select('rombels.*')->where('singkatan_jurusan', 'TKJ')->where('tingkat', 2)->count() < 4)
					<a href="{{ url('/tambah_rombel/TKJ/2/XI') }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">+</a>
					@endif
					<hr>
					<p>Kelas XII</p>
					@foreach($tkjs as $tkj)
					@if($tkj->tingkat == 3)
					<a href="{{ url('/hapus_rombel/'.$tkj->id) }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">{{ $tkj->jml_rombel }}</a>
					@endif
					@endforeach
					@if(\App\Rombel::select('rombels.*')->where('singkatan_jurusan', 'TKJ')->where('tingkat', 3)->count() < 4)
					<a href="{{ url('/tambah_rombel/TKJ/3/XII') }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">+</a>
					@endif
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Multimedia (MMD)</h6>
				</div>
				<div class="card-body">
					<p>Kelas X</p>
					@foreach($mmds as $mmd)
					@if($mmd->tingkat == 1)
					<a href="{{ url('/hapus_rombel/'.$mmd->id) }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">{{ $mmd->jml_rombel }}</a>
					@endif
					@endforeach
					@if(\App\Rombel::select('rombels.*')->where('singkatan_jurusan', 'MMD')->where('tingkat', 1)->count() < 4)
					<a href="{{ url('/tambah_rombel/MMD/1/X') }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">+</a>
					@endif
					<hr>
					<p>Kelas XI</p>
					@foreach($mmds as $mmd)
					@if($mmd->tingkat == 2)
					<a href="{{ url('/hapus_rombel/'.$mmd->id) }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">{{ $mmd->jml_rombel }}</a>
					@endif
					@endforeach
					@if(\App\Rombel::select('rombels.*')->where('singkatan_jurusan', 'MMD')->where('tingkat', 2)->count() < 4)
					<a href="{{ url('/tambah_rombel/MMD/2/XI') }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">+</a>
					@endif
					<hr>
					<p>Kelas XII</p>
					@foreach($mmds as $mmd)
					@if($mmd->tingkat == 3)
					<a href="{{ url('/hapus_rombel/'.$mmd->id) }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">{{ $mmd->jml_rombel }}</a>
					@endif
					@endforeach
					@if(\App\Rombel::select('rombels.*')->where('singkatan_jurusan', 'MMD')->where('tingkat', 3)->count() < 4)
					<a href="{{ url('/tambah_rombel/MMD/3/XII') }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">+</a>
					@endif
				</div>
			</div>
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Perhotelan (HTL)</h6>
				</div>
				<div class="card-body">
					<p>Kelas X</p>
					@foreach($htls as $htl)
					@if($htl->tingkat == 1)
					<a href="{{ url('/hapus_rombel/'.$htl->id) }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">{{ $htl->jml_rombel }}</a>
					@endif
					@endforeach
					@if(\App\Rombel::select('rombels.*')->where('singkatan_jurusan', 'HTL')->where('tingkat', 1)->count() < 4)
					<a href="{{ url('/tambah_rombel/HTL/1/X') }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">+</a>
					@endif
					<hr>
					<p>Kelas XI</p>
					@foreach($htls as $htl)
					@if($htl->tingkat == 2)
					<a href="{{ url('/hapus_rombel/'.$htl->id) }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">{{ $htl->jml_rombel }}</a>
					@endif
					@endforeach
					@if(\App\Rombel::select('rombels.*')->where('singkatan_jurusan', 'HTL')->where('tingkat', 2)->count() < 4)
					<a href="{{ url('/tambah_rombel/HTL/2/XI') }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">+</a>
					@endif
					<hr>
					<p>Kelas XII</p>
					@foreach($htls as $htl)
					@if($htl->tingkat == 3)
					<a href="{{ url('/hapus_rombel/'.$htl->id) }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">{{ $htl->jml_rombel }}</a>
					@endif
					@endforeach
					@if(\App\Rombel::select('rombels.*')->where('singkatan_jurusan', 'HTL')->where('tingkat', 3)->count() < 4)
					<a href="{{ url('/tambah_rombel/HTL/3/XII') }}" class="btn btn-circle mb-1 font-weight-bold" style="background-color: #b854f5; color: #fff;">+</a>
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