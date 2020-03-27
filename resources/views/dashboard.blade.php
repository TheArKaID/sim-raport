@extends('layouts/header')
@section('css')
<style type="text/css">
  .container_1{
    margin: 0 auto;
  }
  .container_1 .box_1 p{
    font-size: 18px;
  }
  .container_1 .box_1 .chart{
    position: relative;
    width: 150px;
    height: 150px;
    font-size: 30px;
    margin: 0 auto;
    text-align: center;
    line-height: 150px;
  }
  .container_1 .box_1 canvas{
    position: absolute;
    top: 0;
    left: 0;
  }
  #btn-kelola a:hover{
    text-decoration: none;
  }
  #card-welcome{
    background-size: cover;
    background-position: center;
    padding-top: 100px;
    padding-bottom: 100px;
  }

  #card-welcome h2{
    font-size: 40px;
    text-shadow: 1px 1px #2c3539;
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
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/dashboard') }}">
          <i class="fas fa-home"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/profile') }}">
          <i class="fas fa-user"></i>
          <span>Profile</span></a>
      </li>
      @if(auth()->user()->role == 'Kurikulum')
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
      @endif
      @if(auth()->user()->role == 'Guru')
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/kelola_nilai') }}">
          <i class="fas fa-calculator"></i>
          <span>Kelola Nilai</span></a>
      </li>
      @endif
      <hr class="sidebar-divider my-0">
      @if(auth()->user()->role == 'Kurikulum')
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/tahun_ajaran') }}">
          <i class="fas fa-school"></i>
          <span>Tahun Ajaran Baru</span></a>
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
    <div class="col-sm-12 col-md-12 mb-4">
      <div class="media">
        <img src="{{ asset('icon/dashboard-1.png') }}" class="mr-3 rounded" alt="..." style="background-color: #fff; padding: 10px; width: 60px; box-shadow: 3px 3px rgba(0,0,0,.2);">
        <div class="media-body">
          <h5 class="mt-1" style="color: #3e3d3e; font-weight: bold;">Dashboard</h5>
          Dashboard SIM RAPORT
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Mapel</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800 num">{{ $mapel->count() }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Guru</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800 num">{{ $guru->count() }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Rayon</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800 num">{{ $rayon->count() }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-object-group fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Rombel</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800 num">{{ $rombel->count() }}</div>
            </div>
            <div class="col-auto">
              <i class="far fa-object-group fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6 mb-4">
      <div class="row">
        <div class="col-lg-12 mb-4">
          <div class="card bg-primary text-white shadow">
            <div class="card-body">
              <div class="list-inline"><i class="far fa-clock list-inline-item"></i><p class="list-inline-item" style="font-weight: bold;">Waktu Saat Ini</p></div>
              <h2 class="text-center" id="myclock"></h2>
            </div>
          </div>
        </div>
      </div>
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Total Siswa</h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" data-toggle="modal" data-target=".bd-example-modal-xl" role="button" href="#">Selengkapnya</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="container_1">
                <div class="box_1">
                  <div class="chart text-gray-800" id="rata_seluruh" data-percent="{{ $siswa->count() }}">{{ $siswa->count() }}</div>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-sm-12 text-center mt-3">
              <p class="">Jumlah Seluruh Siswa</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4">
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="text-center mb-2">
            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 20rem;" src="{{ asset('icon/undraw_dashboard_nklg.svg') }}" alt="">
          </div>
          <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <!-- <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div> -->
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12 mb-4">
                <button type="button" class="close mr-2" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="col-md-12 mb-4 text-center">
                <h5 class="text-gray-800">Jumlah Siswa Per-Tingkat Kelas</h5><hr style="width: 30%; border-color: #7a00e2;">
              </div>
            </div>
            <div class="container_1">
              <div class="row">
                <div class="col-md-4 mb-3">
                  <div class="box_1 box_2">
                    <div class="chart text-gray-800" id="rata_kelas" data-percent="{{ $kelas_x }}">{{ $kelas_x }}</div>
                    <p class="text-center mt-3">Kelas X</p>
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <div class="box_1 box_2">
                    <div class="chart text-gray-800" id="rata_kelas" data-percent="{{ $kelas_xi }}">{{ $kelas_xi }}</div>
                    <p class="text-center mt-3">Kelas XI</p>
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <div class="box_1 box_2">
                    <div class="chart text-gray-800" id="rata_kelas" data-percent="{{ $kelas_xii }}">{{ $kelas_xii }}</div>
                    <p class="text-center mt-3">Kelas XII</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!--   <div class="row">
    @if(auth()->user()->role == 'Kurikulum')
    <div class="col-xl-4 col-md-6 mb-4" id="btn-kelola">
      <a href="{{ url('kelola_kelas') }}" style="color: #7102cf; font-weight: bold;">
      <div class="card shadow h-100 py-2" style="border-left-color: #7a00e2; border-left-width: 5px; background-image: url('{{ asset('img/btn1.png') }}'); background-position: center; background-size: cover;">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2 text-center">
                Lihat Akun
            </div>
            <div class="col-auto">
            </div>
          </div>
        </div>
      </div>
      </a>
    </div>
    <div class="col-xl-4 col-md-6 mb-4" id="btn-kelola">
      <a href="{{ url('/kelola_akun') }}" style="color: #7102cf; font-weight: bold;">
      <div class="card shadow h-100 py-2" style="border-left-color: #7a00e2; border-left-width: 5px; background-image: url('{{ asset('img/btn2.png') }}'); background-position: center; background-size: cover;">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2 text-center">
                Kelola Akun
            </div>
            <div class="col-auto">
            </div>
          </div>
        </div>
      </div>
      </a>
    </div>
    <div class="col-xl-4 col-md-6 mb-4" id="btn-kelola">
      <a href="{{ url('kelola_raport') }}" style="color: #7102cf; font-weight: bold;">
      <div class="card shadow h-100 py-2" style="border-left-color: #7a00e2; border-left-width: 5px; background-image: url('{{ asset('img/btn3.png') }}'); background-position: center; background-size: cover;">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2 text-center">
                Kelola Raport
            </div>
            <div class="col-auto">
            </div>
          </div>
        </div>
      </div>
      </a>
    </div>
    <div class="col-xl-4 col-md-6 mb-4" id="btn-kelola">
      <div class="">
        <a href="#" style="color: #7102cf; font-weight: bold;">
          <div class="card shadow h-100 py-2" style="border-left-color: #7a00e2; border-left-width: 5px; background-image: url('{{ asset('img/btn4.png') }}'); background-position: center; background-size: cover;">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2 text-center">
                    Kelola Data
                </div>
                <div class="col-auto">
                </div>
              </div>
            </div>
          </div>
          </a>
      </div>
    </div>
    @endif
    @if(auth()->user()->role == 'Guru')
    <div class="col-xl-6 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters authlign-items-center">
            <div class="col mr-2 text-center">
              <a href="{{ url('kelola_nilai') }}">
                Lihat Akun
              </a>
            </div>
            <div class="col-auto">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-6 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2 text-center">
              <a href="{{ url('/kelola_nilai', auth()->user()->kd_guru) }}">
                Kelola Nilai
              </a>
            </div>
            <div class="col-auto">
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
</div> -->
</div>
@endsection
@section('script')
<script src="{{ asset('js/jquery.easypiechart.js') }}"></script>
<script src="{{ asset('js/jquery.counterup.js') }}"></script>
<script src="{{ asset('js/jquery.waypoints.js') }}"></script>
<script type="text/javascript">
$('.num').counterUp({delay:10,time:1000});

$(function() {
  $('.chart').easyPieChart({

  });
});

var clock = 0;
var interval_msec = 1000;
$(function() {
  clock = setTimeout("UpdateClock()", interval_msec);
});
function UpdateClock(){
  clearTimeout(clock);
  var asiaTime = new Date().toLocaleString("en-US", {timeZone: "Asia/Jakarta"});
  var dt_now = new Date(asiaTime);
  var weekday = new Array(7);
  weekday[0] = "Minggu";
  weekday[1] = "Senin";
  weekday[2] = "Selasa";
  weekday[3] = "Rabu";
  weekday[4] = "Kamis";
  weekday[5] = "Jumat";
  weekday[6] = "Sabtu";
  var day = weekday[dt_now.getDay()];
  var hh  = dt_now.getHours();
  var mm  = dt_now.getMinutes();
  var ss  = dt_now.getSeconds();
  if(hh < 10){
    hh = "0" + hh;
  }
  if(mm < 10){
    mm = "0" + mm;
  }
  if(ss < 10){
    ss = "0" + ss;
  }
  $("#myclock").html(day + ", " + hh + ":" + mm + ":" + ss);
  clock = setTimeout("UpdateClock()", interval_msec);
}
</script>
@endsection