@extends('layouts/header')
@section('css')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<style type="text/css">
  .font-btn:hover{
  	color: #7a00e2;
  }
  .btn-cetak:hover{
  	text-decoration: none;
  }
  .backkelola{
    color: grey;
    text-decoration: none;
  }
  .backkelola:hover{
    color: #7a00e2;
    text-decoration: none;
  }
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"></link>
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
	          <li class="breadcrumb-item"><a href="{{ url('/kelola_raport/data_siswa/'. $rayons->kd_rayon) }}" class="backkelola">{{ $rayons->rayon }}</a></li>
	          <li class="breadcrumb-item active" aria-current="page">{{ $siswas->nama }}</li>
	        </ol>
	      </nav>
	    </div>
	</div>
	<div class="row mb-4">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="media">
		        <img src="{{ asset('icon/student1.png') }}" class="mr-3 rounded" alt="..." style="background-color: #fff; padding: 10px; width: 60px; box-shadow: 3px 3px rgba(0,0,0,.2);">
		        <div class="media-body">
		          <h5 class="mt-1" style="color: #3e3d3e; font-weight: bold;">{{ $siswas->nama }}</h5>
		          {{ $siswas->rombel }}
		        </div>
		      </div>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-3 col-md-6 mb-4">
          <a href="{{ url('/kelola_raport/cetak_raport/UTS1/'. $rayons->kd_rayon . '/' . $siswas->nis) }}" class="btn-cetak">
          	<div class="card border-left-primary shadow h-100 py-2">
	            <div class="card-body">
	              <div class="row no-gutters align-items-center">
	                <div class="col mr-2 text-center">
	                  <div class="h6 mb-0 font-weight-bold text-gray-800">CETAK UTS GANJIL</div>
	                </div>
	              </div>
	            </div>
	          </div>
          </a>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
          <a href="{{ url('/kelola_raport/cetak_raport/UAS/'. $rayons->kd_rayon . '/' . $siswas->nis) }}" class="btn-cetak">
          	<div class="card border-left-primary shadow h-100 py-2">
	            <div class="card-body">
	              <div class="row no-gutters align-items-center">
	                <div class="col mr-2 text-center">
	                  <div class="h6 mb-0 font-weight-bold text-gray-800">CETAK UAS GANJIL</div>
	                </div>
	              </div>
	            </div>
	          </div>
          </a>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
          <a href="{{ url('/kelola_raport/cetak_raport/UTS2/'. $rayons->kd_rayon . '/' . $siswas->nis) }}" class="btn-cetak">
          	<div class="card border-left-primary shadow h-100 py-2">
	            <div class="card-body">
	              <div class="row no-gutters align-items-center">
	                <div class="col mr-2 text-center">
	                  <div class="h6 mb-0 font-weight-bold text-gray-800">CETAK UTS GENAP</div>
	                </div>
	              </div>
	            </div>
	          </div>
          </a>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
          <a href="{{ url('/kelola_raport/cetak_raport/UKK/'. $rayons->kd_rayon . '/' . $siswas->nis) }}" class="btn-cetak">
          	<div class="card border-left-primary shadow h-100 py-2">
	            <div class="card-body">
	              <div class="row no-gutters align-items-center">
	                <div class="col mr-2 text-center">
	                  <div class="h6 mb-0 font-weight-bold text-gray-800">CETAK UKK GENAP</div>
	                </div>
	              </div>
	            </div>
	          </div>
          </a>
        </div>
	</div>
	<div class="row mb-4">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="accordion" id="accordionExample">
			  <div class="card">
			    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" id="headingOne">
			      <h2 class="mb-0">
			        <button class="btn btn-link font-btn" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="font-size: 20px;">
			          Semester 1
			        </button>
			      </h2>
			      <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" id="p-btn-semes-1" href="#">Pengetahuan</a>
                      <a class="dropdown-item" id="k-btn-semes-1"  href="#">Keterampilan</a>
                    </div>
                  </div>
			    </div>

			    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
			      <div class="card-body">
			        <div class="row">
			        	@foreach($semes1s as $semes1)
							<div class="col-lg-4 col-md-4 col-sm-4">
								<div class="card shadow mb-4 semes1-pengetahuan">
						            <div class="card-header py-3">
						              <h6 class="m-0 font-weight-bold text-primary">{{ $semes1->mapel }} - Pengetahuan</h6>
						            </div>
						            <div class="card-body">
						              <table class="table table-sm text-center">
										  <thead>
										    <tr>
										      <th scope="col">Ulangan</th>
										      <th scope="col">Nilai</th>
										      <th scope="col">Keterangan</th>
										    </tr>
										  </thead>
										  <tbody>
										    <tr>
										      <td>UH 1</td>
										      <td>{{ $nilais = \App\Semester1::select('uh_1p')->where('kd_mapel', $semes1->kd_mapel)->sum('uh_1p') }}</td>
										      <td>
										      	@if(\App\Semester1::select('uh_1p')->where('kd_mapel', $semes1->kd_mapel)->sum('uh_1p') > \App\Nilai_kkm::select('nilai_kkms.kkm')->where('kd_mapel', $semes1->kd_mapel)->where('kd_rombel', $rombels->kd_rombel)->sum('kkm'))
										      	K
										      	@else
										      	BK
										      	@endif
										      </td>
										    </tr>
										    <tr>
										      <td>UH 2</td>
										      <td>{{ $nilais = \App\Semester1::select('uh_2p')->where('kd_mapel', $semes1->kd_mapel)->sum('uh_2p') }}</td>
										      <td>
										      	@if(\App\Semester1::select('uh_2p')->where('kd_mapel', $semes1->kd_mapel)->sum('uh_2p') > \App\Nilai_kkm::select('nilai_kkms.kkm')->where('kd_mapel', $semes1->kd_mapel)->where('kd_rombel', $rombels->kd_rombel)->sum('kkm'))
										      	K
										      	@else
										      	BK
										      	@endif
										      </td>
										    </tr>
										    <tr>
										      <td>UTS</td>
										      <td>{{ $nilais = \App\Semester1::select('uts_1p')->where('kd_mapel', $semes1->kd_mapel)->sum('uts_1p') }}</td>
										      <td>
										      	@if(\App\Semester1::select('uts_1p')->where('kd_mapel', $semes1->kd_mapel)->sum('uts_1p') > \App\Nilai_kkm::select('nilai_kkms.kkm')->where('kd_mapel', $semes1->kd_mapel)->where('kd_rombel', $rombels->kd_rombel)->sum('kkm'))
										      	K
										      	@else
										      	BK
										      	@endif
										      </td>
										    </tr>
										    <tr>
										      <td>UH 3</td>
										      <td>{{ $nilais = \App\Semester1::select('uh_3p')->where('kd_mapel', $semes1->kd_mapel)->sum('uh_3p') }}</td>
										      <td>
										      	@if(\App\Semester1::select('uh_3p')->where('kd_mapel', $semes1->kd_mapel)->sum('uh_3p') > \App\Nilai_kkm::select('nilai_kkms.kkm')->where('kd_mapel', $semes1->kd_mapel)->where('kd_rombel', $rombels->kd_rombel)->sum('kkm'))
										      	K
										      	@else
										      	BK
										      	@endif
										      </td>
										    </tr>
										    <tr>
										      <td>UH 4</td>
										      <td>{{ $nilais = \App\Semester1::select('uh_4p')->where('kd_mapel', $semes1->kd_mapel)->sum('uh_4p') }}</td>
										      <td>
										      	@if(\App\Semester1::select('uh_4p')->where('kd_mapel', $semes1->kd_mapel)->sum('uh_4p') > \App\Nilai_kkm::select('nilai_kkms.kkm')->where('kd_mapel', $semes1->kd_mapel)->where('kd_rombel', $rombels->kd_rombel)->sum('kkm'))
										      	K
										      	@else
										      	BK
										      	@endif
										      </td>
										    </tr>
										    <tr>
										      <td>UAS</td>
										      <td>{{ $nilais = \App\Semester1::select('uas_p')->where('kd_mapel', $semes1->kd_mapel)->sum('uas_p') }}</td>
										      <td>
										      	@if(\App\Semester1::select('uas_p')->where('kd_mapel', $semes1->kd_mapel)->sum('uas_p') > \App\Nilai_kkm::select('nilai_kkms.kkm')->where('kd_mapel', $semes1->kd_mapel)->where('kd_rombel', $rombels->kd_rombel)->sum('kkm'))
										      	K
										      	@else
										      	BK
										      	@endif
										      </td>
										    </tr>
										  </tbody>
										</table>
						            </div>
						        </div>
						        <div class="card shadow mb-4 semes1-keterampilan" hidden="">
						            <div class="card-header py-3">
						              <h6 class="m-0 font-weight-bold text-primary">{{ $semes1->mapel }} - Keterampilan</h6>
						            </div>
						            <div class="card-body">
						              <table class="table table-sm text-center">
										  <thead>
										    <tr>
										      <th scope="col">Ulangan</th>
										      <th scope="col">Nilai</th>
										      <th scope="col">Keterangan</th>
										    </tr>
										  </thead>
										  <tbody>
										    <tr>
										      <td>UH 1</td>
										      <td>{{ $nilais = \App\Semester1::select('uh_1k')->where('kd_mapel', $semes1->kd_mapel)->sum('uh_1k') }}</td>
										      <td>
										      	@if(\App\Semester1::select('uh_1k')->where('kd_mapel', $semes1->kd_mapel)->sum('uh_1k') > \App\Nilai_kkm::select('nilai_kkms.kkm')->where('kd_mapel', $semes1->kd_mapel)->where('kd_rombel', $rombels->kd_rombel)->sum('kkm'))
										      	K
										      	@else
										      	BK
										      	@endif
										      </td>
										    </tr>
										    <tr>
										      <td>UH 2</td>
										      <td>{{ $nilais = \App\Semester1::select('uh_2k')->where('kd_mapel', $semes1->kd_mapel)->sum('uh_2k') }}</td>
										      <td>
										      	@if(\App\Semester1::select('uh_2k')->where('kd_mapel', $semes1->kd_mapel)->sum('uh_2k') > \App\Nilai_kkm::select('nilai_kkms.kkm')->where('kd_mapel', $semes1->kd_mapel)->where('kd_rombel', $rombels->kd_rombel)->sum('kkm'))
										      	K
										      	@else
										      	BK
										      	@endif
										      </td>
										    </tr>
										    <tr>
										      <td>UTS</td>
										      <td>{{ $nilais = \App\Semester1::select('uts_1k')->where('kd_mapel', $semes1->kd_mapel)->sum('uts_1k') }}</td>
										      <td>
										      	@if(\App\Semester1::select('uts_1k')->where('kd_mapel', $semes1->kd_mapel)->sum('uts_1k') > \App\Nilai_kkm::select('nilai_kkms.kkm')->where('kd_mapel', $semes1->kd_mapel)->where('kd_rombel', $rombels->kd_rombel)->sum('kkm'))
										      	K
										      	@else
										      	BK
										      	@endif
										      </td>
										    </tr>
										    <tr>
										      <td>UH 3</td>
										      <td>{{ $nilais = \App\Semester1::select('uh_3k')->where('kd_mapel', $semes1->kd_mapel)->sum('uh_3k') }}</td>
										      <td>
										      	@if(\App\Semester1::select('uh_3k')->where('kd_mapel', $semes1->kd_mapel)->sum('uh_3k') > \App\Nilai_kkm::select('nilai_kkms.kkm')->where('kd_mapel', $semes1->kd_mapel)->where('kd_rombel', $rombels->kd_rombel)->sum('kkm'))
										      	K
										      	@else
										      	BK
										      	@endif
										      </td>
										    </tr>
										    <tr>
										      <td>UH 4</td>
										      <td>{{ $nilais = \App\Semester1::select('uh_4k')->where('kd_mapel', $semes1->kd_mapel)->sum('uh_4k') }}</td>
										      <td>
										      	@if(\App\Semester1::select('uh_4k')->where('kd_mapel', $semes1->kd_mapel)->sum('uh_4k') > \App\Nilai_kkm::select('nilai_kkms.kkm')->where('kd_mapel', $semes1->kd_mapel)->where('kd_rombel', $rombels->kd_rombel)->sum('kkm'))
										      	K
										      	@else
										      	BK
										      	@endif
										      </td>
										    </tr>
										    <tr>
										      <td>UAS</td>
										      <td>{{ $nilais = \App\Semester1::select('uas_k')->where('kd_mapel', $semes1->kd_mapel)->sum('uas_k') }}</td>
										      <td>
										      	@if(\App\Semester1::select('uas_k')->where('kd_mapel', $semes1->kd_mapel)->sum('uas_k') > \App\Nilai_kkm::select('nilai_kkms.kkm')->where('kd_mapel', $semes1->kd_mapel)->where('kd_rombel', $rombels->kd_rombel)->sum('kkm'))
										      	K
										      	@else
										      	BK
										      	@endif
										      </td>
										    </tr>
										  </tbody>
										</table>
						            </div>
						        </div>
							</div>
							@endforeach
			        </div>
			      </div>
			    </div>
			  </div>
			  <div class="card">
			    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" id="headingTwo">
			      <h2 class="mb-0">
			        <button class="btn btn-link collapsed font-btn" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="font-size: 20px;">
			          Semester 2
			        </button>
			      </h2>
			      <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" id="p-btn-semes-2" href="#">Pengetahuan</a>
                      <a class="dropdown-item" id="k-btn-semes-2"  href="#">Keterampilan</a>
                    </div>
                  </div>
			    </div>
			    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
			      <div class="card-body">
			        <div class="row">
			        	@foreach($semes2s as $semes2)
							<div class="col-lg-4 col-md-4 col-sm-4">
								<div class="card shadow mb-4 semes2-pengetahuan">
						            <div class="card-header py-3">
						              <h6 class="m-0 font-weight-bold text-primary">{{ $semes2->mapel }} - Pengetahuan</h6>
						            </div>
						            <div class="card-body">
						              <table class="table table-sm text-center">
										  <thead>
										    <tr>
										      <th scope="col">Ulangan</th>
										      <th scope="col">Nilai</th>
										      <th scope="col">Keterangan</th>
										    </tr>
										  </thead>
										  <tbody>
										    <tr>
										      <td>UH 5</td>
										      <td>{{ $nilais = \App\Semester2::select('uh_5p')->where('kd_mapel', $semes2->kd_mapel)->sum('uh_5p') }}</td>
										      <td>
										      	@if(\App\Semester2::select('uh_5p')->where('kd_mapel', $semes2->kd_mapel)->sum('uh_5p') > \App\Nilai_kkm::select('nilai_kkms.kkm')->where('kd_mapel', $semes2->kd_mapel)->where('kd_rombel', $rombels->kd_rombel)->sum('kkm'))
										      	K
										      	@else
										      	BK
										      	@endif
										      </td>
										    </tr>
										    <tr>
										      <td>UH 6</td>
										      <td>{{ $nilais = \App\Semester2::select('uh_6p')->where('kd_mapel', $semes2->kd_mapel)->sum('uh_6p') }}</td>
										      <td>
										      	@if(\App\Semester2::select('uh_6p')->where('kd_mapel', $semes2->kd_mapel)->sum('uh_6p') > \App\Nilai_kkm::select('nilai_kkms.kkm')->where('kd_mapel', $semes2->kd_mapel)->where('kd_rombel', $rombels->kd_rombel)->sum('kkm'))
										      	K
										      	@else
										      	BK
										      	@endif
										      </td>
										    </tr>
										    <tr>
										      <td>UTS</td>
										      <td>{{ $nilais = \App\Semester2::select('uts_2p')->where('kd_mapel', $semes2->kd_mapel)->sum('uts_2p') }}</td>
										      <td>
										      	@if(\App\Semester2::select('uts_2p')->where('kd_mapel', $semes2->kd_mapel)->sum('uts_2p') > \App\Nilai_kkm::select('nilai_kkms.kkm')->where('kd_mapel', $semes2->kd_mapel)->where('kd_rombel', $rombels->kd_rombel)->sum('kkm'))
										      	K
										      	@else
										      	BK
										      	@endif
										      </td>
										    </tr>
										    <tr>
										      <td>UH 7</td>
										      <td>{{ $nilais = \App\Semester2::select('uh_7p')->where('kd_mapel', $semes2->kd_mapel)->sum('uh_7p') }}</td>
										      <td>
										      	@if(\App\Semester2::select('uh_7p')->where('kd_mapel', $semes2->kd_mapel)->sum('uh_7p') > \App\Nilai_kkm::select('nilai_kkms.kkm')->where('kd_mapel', $semes2->kd_mapel)->where('kd_rombel', $rombels->kd_rombel)->sum('kkm'))
										      	K
										      	@else
										      	BK
										      	@endif
										      </td>
										    </tr>
										    <tr>
										      <td>UH 8</td>
										      <td>{{ $nilais = \App\Semester2::select('uh_8p')->where('kd_mapel', $semes2->kd_mapel)->sum('uh_8p') }}</td>
										      <td>
										      	@if(\App\Semester2::select('uh_8p')->where('kd_mapel', $semes2->kd_mapel)->sum('uh_8p') > \App\Nilai_kkm::select('nilai_kkms.kkm')->where('kd_mapel', $semes2->kd_mapel)->where('kd_rombel', $rombels->kd_rombel)->sum('kkm'))
										      	K
										      	@else
										      	BK
										      	@endif
										      </td>
										    </tr>
										    <tr>
										      <td>UKK</td>
										      <td>{{ $nilais = \App\Semester2::select('ukk_p')->where('kd_mapel', $semes2->kd_mapel)->sum('ukk_p') }}</td>
										      <td>
										      	@if(\App\Semester2::select('ukk_p')->where('kd_mapel', $semes2->kd_mapel)->sum('ukk_p') > \App\Nilai_kkm::select('nilai_kkms.kkm')->where('kd_mapel', $semes2->kd_mapel)->where('kd_rombel', $rombels->kd_rombel)->sum('kkm'))
										      	K
										      	@else
										      	BK
										      	@endif
										      </td>
										    </tr>
										  </tbody>
										</table>
						            </div>
						        </div>
						        <div class="card shadow mb-4 semes2-keterampilan" hidden="">
						            <div class="card-header py-3">
						              <h6 class="m-0 font-weight-bold text-primary">{{ $semes2->mapel }} - Keterampilan</h6>
						            </div>
						            <div class="card-body">
						              <table class="table table-sm text-center">
										  <thead>
										    <tr>
										      <th scope="col">Ulangan</th>
										      <th scope="col">Nilai</th>
										      <th scope="col">Keterangan</th>
										    </tr>
										  </thead>
										  <tbody>
										    <tr>
										      <td>UH 5</td>
										      <td>{{ $nilais = \App\Semester2::select('uh_5k')->where('kd_mapel', $semes2->kd_mapel)->sum('uh_5k') }}</td>
										      <td>
										      	@if(\App\Semester2::select('uh_5k')->where('kd_mapel', $semes2->kd_mapel)->sum('uh_5k') > \App\Nilai_kkm::select('nilai_kkms.kkm')->where('kd_mapel', $semes2->kd_mapel)->where('kd_rombel', $rombels->kd_rombel)->sum('kkm'))
										      	K
										      	@else
										      	BK
										      	@endif
										      </td>
										    </tr>
										    <tr>
										      <td>UH 6</td>
										      <td>{{ $nilais = \App\Semester2::select('uh_6k')->where('kd_mapel', $semes2->kd_mapel)->sum('uh_6k') }}</td>
										      <td>
										      	@if(\App\Semester2::select('uh_6k')->where('kd_mapel', $semes2->kd_mapel)->sum('uh_6k') > \App\Nilai_kkm::select('nilai_kkms.kkm')->where('kd_mapel', $semes2->kd_mapel)->where('kd_rombel', $rombels->kd_rombel)->sum('kkm'))
										      	K
										      	@else
										      	BK
										      	@endif
										      </td>
										    </tr>
										    <tr>
										      <td>UTS</td>
										      <td>{{ $nilais = \App\Semester2::select('uts_2k')->where('kd_mapel', $semes2->kd_mapel)->sum('uts_2k') }}</td>
										      <td>
										      	@if(\App\Semester2::select('uts_2k')->where('kd_mapel', $semes2->kd_mapel)->sum('uts_2k') > \App\Nilai_kkm::select('nilai_kkms.kkm')->where('kd_mapel', $semes2->kd_mapel)->where('kd_rombel', $rombels->kd_rombel)->sum('kkm'))
										      	K
										      	@else
										      	BK
										      	@endif
										      </td>
										    </tr>
										    <tr>
										      <td>UH 7</td>
										      <td>{{ $nilais = \App\Semester2::select('uh_7k')->where('kd_mapel', $semes2->kd_mapel)->sum('uh_7k') }}</td>
										      <td>
										      	@if(\App\Semester2::select('uh_7k')->where('kd_mapel', $semes2->kd_mapel)->sum('uh_7k') > \App\Nilai_kkm::select('nilai_kkms.kkm')->where('kd_mapel', $semes2->kd_mapel)->where('kd_rombel', $rombels->kd_rombel)->sum('kkm'))
										      	K
										      	@else
										      	BK
										      	@endif
										      </td>
										    </tr>
										    <tr>
										      <td>UH 8</td>
										      <td>{{ $nilais = \App\Semester2::select('uh_8k')->where('kd_mapel', $semes2->kd_mapel)->sum('uh_8k') }}</td>
										      <td>
										      	@if(\App\Semester2::select('uh_8k')->where('kd_mapel', $semes2->kd_mapel)->sum('uh_8k') > \App\Nilai_kkm::select('nilai_kkms.kkm')->where('kd_mapel', $semes2->kd_mapel)->where('kd_rombel', $rombels->kd_rombel)->sum('kkm'))
										      	K
										      	@else
										      	BK
										      	@endif
										      </td>
										    </tr>
										    <tr>
										      <td>UKK</td>
										      <td>{{ $nilais = \App\Semester2::select('ukk_k')->where('kd_mapel', $semes2->kd_mapel)->sum('ukk_k') }}</td>
										      <td>
										      	@if(\App\Semester2::select('ukk_k')->where('kd_mapel', $semes2->kd_mapel)->sum('ukk_k') > \App\Nilai_kkm::select('nilai_kkms.kkm')->where('kd_mapel', $semes2->kd_mapel)->where('kd_rombel', $rombels->kd_rombel)->sum('kkm'))
										      	K
										      	@else
										      	BK
										      	@endif
										      </td>
										    </tr>
										  </tbody>
										</table>
						            </div>
						        </div>
							</div>
							@endforeach
			        </div>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
	</div>
	<div class="row">
		
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
<script type="text/javascript">
	$(document).on('click', '#p-btn-semes-1', function(e) {
		e.preventDefault();
		$('.semes1-pengetahuan').prop('hidden', false);
		$('.semes1-keterampilan').prop('hidden', true);
	});

	$(document).on('click', '#k-btn-semes-1', function(e) {
		e.preventDefault();
		$('.semes1-pengetahuan').prop('hidden', true);
		$('.semes1-keterampilan').prop('hidden', false);
	});
	$(document).on('click', '#p-btn-semes-2', function(e) {
		e.preventDefault();
		$('.semes2-pengetahuan').prop('hidden', false);
		$('.semes2-keterampilan').prop('hidden', true);
	});

	$(document).on('click', '#k-btn-semes-2', function(e) {
		e.preventDefault();
		$('.semes2-pengetahuan').prop('hidden', true);
		$('.semes2-keterampilan').prop('hidden', false);
	});
</script>
@endsection