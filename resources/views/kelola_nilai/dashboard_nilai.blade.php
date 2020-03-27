@extends('layouts/header')
@section('css')
<style type="text/css">
  .kkm-toggle:hover{
    color: #7a00e2;
  }
  .ubah-kkm-field:hover{
    background-color: #fff;
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
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/kelola_nilai') }}">
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
    <div class="col-sm-12 col-md-12 col-lg-12">
      <div class="media">
        <img src="{{ asset('icon/score-1.png') }}" class="mr-3 rounded" alt="..." style="background-color: #fff; padding: 10px; width: 58px; box-shadow: 3px 3px rgba(0,0,0,.2);">
        <div class="media-body">
          <h5 class="mt-1" style="color: #3e3d3e; font-weight: bold;">Kelola Nilai</h5>
          Kelola nilai siswa
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">

    <div class="col-lg-12">
      <div class="card mb-4 bg-gray-200" style="border: 0;">
        <div class="" style="background-color: #b854f5; width: 100%; height: 50%; position: absolute;">
        </div>
        <div class="card-body" style="margin-top: 10%;">
          <div class="row">
            <div class="col-lg-1 col-md-1"></div>
            <div class="col-lg-5 col-md-5 mb-4">
              <div class="card h-100 py-2" style="border: 0; border-radius: 0px;">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Mata pelajaran
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $mapel->mapel }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-5 col-md-5 mb-4">
              <div class="card h-100 py-2" style="border: 0; border-radius: 0px;">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        JUMLAH KELAS
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kelas_ajar->count() }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-1 col-md-1"></div>
            <div class="col-lg-1 col-md-1"></div>
            <div class="col-lg-10 col-md-12">
              <div class="card h-100 py-2" style="border: 0; border-radius: 0px;">
                <div class="card-body">
                  <canvas id="myChart"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-1 col-md-1"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-12 font-weight-bold text-gray-800 h5">
      Daftar Kelas Ajar
      <hr>
    </div>
    <div class="col-lg-12">
      <div class="row">
        @foreach($daftar_kelas as $kelas)
        <div class="col-lg-3 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 dropright">
                    <a class="dropdown-toggle kkm-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      @if(\App\Nilai_kkm::select('nilai_kkms.*')->where('kd_mapel', auth()->user()->kd_mapel)->where('kd_rombel', $kelas->kd_rombel)->count() > 0)
                      KKM : {{ \App\Nilai_kkm::select('nilai_kkms.kkm')->where('kd_mapel', auth()->user()->kd_mapel)->where('kd_rombel', $kelas->kd_rombel)->sum('kkm') }}
                      @else
                      Tentukan KKM
                      @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      @if(\App\Nilai_kkm::select('nilai_kkms.*')->where('kd_mapel', auth()->user()->kd_mapel)->where('kd_rombel', $kelas->kd_rombel)->count() > 0)
                      <form method="POST" action="{{ url('/edit_kkm/'.$kelas->kd_rombel)}}">
                        @csrf
                        <div class="dropdown-item ubah-kkm-field">
                          <input type="number" max="100" class="form-control" name="nilai_kkm" placeholder="KKM" value="{{ \App\Nilai_kkm::select('nilai_kkms.kkm')->where('kd_mapel', auth()->user()->kd_mapel)->where('kd_rombel', $kelas->kd_rombel)->sum('kkm') }}">
                          <button type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;" tabindex="-1"></button>
                        </div>
                      </form>
                      @else
                      <form method="POST" action="{{ url('/tambah_kkm/'.$kelas->kd_rombel) }}">
                        @csrf
                        <div class="dropdown-item ubah-kkm-field">
                          <input type="number" max="100" class="form-control" name="nilai_kkm" placeholder="KKM">
                          <button type="submit" style="position: absolute; left: -9999px; width: 1px; height: 1px;" tabindex="-1"></button>
                        </div>
                      </form>
                      @endif
                    </div>
                  </div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                    {{ $kelas->rombel }}
                  </div>
                </div>
                <div class="col-auto font-weight-bold h4 text-center pr-1">
                  <div class="dropdown no-arrow">
                    <a href="#" class="detail_nilai_btn" data-kkm="{{ \App\Nilai_kkm::select('kkm')->where('kd_rombel', $kelas->kd_rombel)->where('kd_mapel', auth()->user()->kd_mapel)->count() }}" data-siswa="{{ \App\Siswa::select('siswa.*')->where('rombel', $kelas->rombel)->count() }}" data-href="{{ Crypt::encrypt($kelas->kd_rombel) }}">
                      <i class="fas fa-cog fa-md fa-fw text-gray-400"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>

  </div>
</div>
@endsection
@section('script')
<script src="{{ asset('sampleCHART_BAR/js/Chart.js') }}"></script>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
        @foreach($daftar_kelas as $kelas)
          '{{ $kelas->rombel }}',
        @endforeach
        ],
        datasets: [{
            label: 'Persentase Nilai Rata-Rata Siswa',
            data: [
            @foreach($daftar_kelas as $kelas)
            @if(\App\Semester1::select('uh_1p')->where('kd_rombel', $kelas->kd_rombel)->where('kd_mapel', auth()->user()->kd_mapel)->count() != 0)
            {{ (\App\Semester1::select('uh_1p')->where('kd_rombel', $kelas->kd_rombel)->where('kd_mapel', auth()->user()->kd_mapel)->sum('uh_1p')) / (\App\Semester1::select('uh_1p')->where('kd_rombel', $kelas->kd_rombel)->where('kd_mapel', auth()->user()->kd_mapel)->count()) }},
            @else
            0,
            @endif
            @endforeach
            ],
            backgroundColor: [
                'RGB(184, 84, 245)',
                'RGB(184, 84, 245)',
                'RGB(184, 84, 245)',
                'RGB(184, 84, 245)',
                'RGB(184, 84, 245)',
                'RGB(184, 84, 245)',
                'RGB(184, 84, 245)',
                'RGB(184, 84, 245)'
            ],
            borderColor: [
                'RGB(125, 0, 226)',
                'RGB(125, 0, 226)',
                'RGB(125, 0, 226)',
                'RGB(125, 0, 226)',
                'RGB(125, 0, 226)',
                'RGB(125, 0, 226)',
                'RGB(125, 0, 226)',
                'RGB(125, 0, 226)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
<script type="text/javascript">
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

$(document).on('click', '.detail_nilai_btn', function(e) {
  e.preventDefault();
  var id = $(this).attr('data-href');
  var jml_siswa = $(this).attr('data-siswa');
  var kkm = $(this).attr('data-kkm');
  var link = "{{ url('/detail_nilai') }}/" + id;
  if(kkm == 0)
  {
    Swal.fire({
      icon: 'error',
      text: 'Tentukan KKM terlebih dahulu',
      showConfirmButton: false,
      timer: 1000
    });
  }
  else if(jml_siswa == 0)
  {
    Swal.fire({
      icon: 'error',
      text: 'Maaf data siswa tidak tersedia',
      showConfirmButton: false,
      timer: 1000
    });
  }
  else if(jml_siswa != 0 && kkm != 0)
  {
    window.open(link ,"_self");
  }
});

@if($message = Session::get('kkm_ubah'))
Swal.fire({
  icon: 'success',
  text: '{{ $message }}',
  showConfirmButton: false,
  timer: 1000
});
@endif
</script>
@endsection