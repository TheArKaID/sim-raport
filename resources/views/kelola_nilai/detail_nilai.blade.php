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
  .txt-edit{
    display: none;
    table-layout: fixed;
    width: 50px;
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
    <div class="col-sm-12 col-lg-12 col-md-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb shadow" style="background-color: #fff;">
          <li class="breadcrumb-item"><a href="{{ url('/kelola_nilai') }}" class="backkelola">Kelola Nilai</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{ $rombels->rombel }}</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="alert" style="background-color: #d69df9; color: #fff;" role="alert">
        * Double klik field untuk mengubah nilai
      </div>
    </div>
  </div>
  <div class="row mt-1 mb-4">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="card shadow">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Daftar Nilai</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="" width="100%" cellspacing="0">
              <thead class="text-center">
                <tr>
                  <th style="vertical-align: middle;" rowspan="2">No</th>
                  <th rowspan="2" style="vertical-align: middle;">NIS</th>
                  <th rowspan="2" style="vertical-align: middle;">Nama</th>
                  <th rowspan="2" style="vertical-align: middle;">JK</th>
                  <th colspan="2" style="vertical-align: middle;">UH 1</th>
                  <th colspan="2" style="vertical-align: middle;">UH 2</th>
                  <th colspan="2" style="vertical-align: middle;">UTS GANJIL</th>
                  <th colspan="2" style="vertical-align: middle;">UH 3</th>
                  <th colspan="2" style="vertical-align: middle;">UH 4</th>
                  <th colspan="2" style="vertical-align: middle;">UAS GANJIL</th>
                  <th colspan="2" style="vertical-align: middle;">UH 5</th>
                  <th colspan="2" style="vertical-align: middle;">UH 6</th>
                  <th colspan="2" style="vertical-align: middle;">UTS GENAP</th>
                  <th colspan="2" style="vertical-align: middle;">UH 7</th>
                  <th colspan="2" style="vertical-align: middle;">UH 8</th>
                  <th colspan="2" style="vertical-align: middle;">UKK GENAP</th>
                </tr>
                <tr>
                  <th>P</th>
                  <th>K</th>
                  <th>P</th>
                  <th>K</th>
                  <th>P</th>
                  <th>K</th>
                  <th>P</th>
                  <th>K</th>
                  <th>P</th>
                  <th>K</th>
                  <th>P</th>
                  <th>K</th>
                  <th>P</th>
                  <th>K</th>
                  <th>P</th>
                  <th>K</th>
                  <th>P</th>
                  <th>K</th>
                  <th>P</th>
                  <th>K</th>
                  <th>P</th>
                  <th>K</th>
                  <th>P</th>
                  <th>K</th>
                </tr>
              </thead>
              <tbody>
                @foreach($daftar_siswa as $daftar_siswa)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $daftar_siswa->nis }}</td>
                  <td>{{ $daftar_siswa->nama }}</td>
                  <td>{{ $daftar_siswa->jk }}</td>
                  @if(\App\Semester1::select('semester1s.*')->where('nis', $daftar_siswa->nis)->count() < 1)
                  <td>
                    <div class="nilai-field">Isi</div>
                    <input type="number" max="100" data-edit="uh_1p" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_satu" value="" class="txt-edit semes_satu" name="uh_1p">
                  </td>
                  <td>
                    <div class="nilai-field">Isi</div>
                    <input type="number" max="100" data-edit="uh_1k" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_satu" value="" class="txt-edit semes_satu" name="uh_1k">
                  </td>
                  <td>
                    <div class="nilai-field">Isi</div>
                    <input type="number" max="100" data-edit="uh_2p" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_satu" value="" class="txt-edit semes_satu" name="uh_2p">
                  </td>
                  <td>
                    <div class="nilai-field">Isi</div>
                    <input type="number" max="100" data-edit="uh_2k" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_satu" value="" class="txt-edit semes_satu" name="uh_2k">
                  </td>
                  <td>
                    <div class="nilai-field">Isi</div>
                    <input type="number" max="100" data-edit="uts_1p" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_satu" value="" class="txt-edit semes_satu" name="uts_1p">
                  </td>
                  <td>
                    <div class="nilai-field">Isi</div>
                    <input type="number" max="100" data-edit="uts_1k" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_satu" value="" class="txt-edit semes_satu" name="uts_1k">
                  </td>
                  <td>
                    <div class="nilai-field">Isi</div>
                    <input type="number" max="100" data-edit="uh_3p" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_satu" value="" class="txt-edit semes_satu" name="uh_3p">
                  </td>
                  <td>
                    <div class="nilai-field">Isi</div>
                    <input type="number" max="100" data-edit="uh_3k" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_satu" value="" class="txt-edit semes_satu" name="uh_3k">
                  </td>
                  <td>
                    <div class="nilai-field">Isi</div>
                    <input type="number" max="100" data-edit="uh_4p" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_satu" value="" class="txt-edit semes_satu" name="uh_4p">
                  </td>
                  <td>
                    <div class="nilai-field">Isi</div>
                    <input type="number" max="100" data-edit="uh_4k" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_satu" value="" class="txt-edit semes_satu" name="uh_4k">
                  </td>
                  <td>
                    <div class="nilai-field">Isi</div>
                    <input type="number" max="100" data-edit="uas_p" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_satu" value="" class="txt-edit semes_satu" name="uas_p">
                  </td>
                  <td>
                    <div class="nilai-field">Isi</div>
                    <input type="number" max="100" data-edit="uas_k" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_satu" value="" class="txt-edit semes_satu" name="uas_k">
                  </td>
                  @else
                  <td>
                    <div class="nilai-field">{{ $nilais = \App\Semester1::select('semester1s.uh_1p')->where('nis', $daftar_siswa->nis)->where('kd_rombel', $rombels->kd_rombel)->where('kd_mapel', auth()->user()->kd_mapel)->sum('uh_1p') }}</div>
                    <input type="number" max="100" data-edit="uh_1p" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_satu" value="" class="txt-edit semes_satu" name="uh_1p">
                  </td>
                  <td>
                    <div class="nilai-field">{{ $nilais = \App\Semester1::select('semester1s.uh_1k')->where('nis', $daftar_siswa->nis)->where('kd_rombel', $rombels->kd_rombel)->where('kd_mapel', auth()->user()->kd_mapel)->sum('uh_1k') }}</div>
                    <input type="number" max="100" data-edit="uh_1k" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_satu" value="" class="txt-edit semes_satu" name="uh_1k">
                  </td>
                  <td>
                    <div class="nilai-field">{{ $nilais = \App\Semester1::select('semester1s.uh_2p')->where('nis', $daftar_siswa->nis)->where('kd_rombel', $rombels->kd_rombel)->where('kd_mapel', auth()->user()->kd_mapel)->sum('uh_2p') }}</div>
                    <input type="number" max="100" data-edit="uh_2p" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_satu" value="" class="txt-edit semes_satu" name="uh_2p">
                  </td>
                  <td>
                    <div class="nilai-field">{{ $nilais = \App\Semester1::select('semester1s.uh_2k')->where('nis', $daftar_siswa->nis)->where('kd_rombel', $rombels->kd_rombel)->where('kd_mapel', auth()->user()->kd_mapel)->sum('uh_2k') }}</div>
                    <input type="number" max="100" data-edit="uh_2k" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_satu" value="" class="txt-edit semes_satu" name="uh_2k">
                  </td>
                  <td>
                    <div class="nilai-field">{{ $nilais = \App\Semester1::select('semester1s.uts_1p')->where('nis', $daftar_siswa->nis)->where('kd_rombel', $rombels->kd_rombel)->where('kd_mapel', auth()->user()->kd_mapel)->sum('uts_1p') }}</div>
                    <input type="number" max="100" data-edit="uts_1p" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_satu" value="" class="txt-edit semes_satu" name="uts_1p">
                  </td>
                  <td>
                    <div class="nilai-field">{{ $nilais = \App\Semester1::select('semester1s.uts_1k')->where('nis', $daftar_siswa->nis)->where('kd_rombel', $rombels->kd_rombel)->where('kd_mapel', auth()->user()->kd_mapel)->sum('uts_1k') }}</div>
                    <input type="number" max="100" data-edit="uts_1k" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_satu" value="" class="txt-edit semes_satu" name="uts_1k">
                  </td>
                  <td>
                    <div class="nilai-field">{{ $nilais = \App\Semester1::select('semester1s.uh_3p')->where('nis', $daftar_siswa->nis)->where('kd_rombel', $rombels->kd_rombel)->where('kd_mapel', auth()->user()->kd_mapel)->sum('uh_3p') }}</div>
                    <input type="number" max="100" data-edit="uh_3p" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_satu" value="" class="txt-edit semes_satu" name="uh_3p">
                  </td>
                  <td>
                    <div class="nilai-field">{{ $nilais = \App\Semester1::select('semester1s.uh_3k')->where('nis', $daftar_siswa->nis)->where('kd_rombel', $rombels->kd_rombel)->where('kd_mapel', auth()->user()->kd_mapel)->sum('uh_3k') }}</div>
                    <input type="number" max="100" data-edit="uh_3k" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_satu" value="" class="txt-edit semes_satu" name="uh_3k">
                  </td>
                  <td>
                    <div class="nilai-field">{{ $nilais = \App\Semester1::select('semester1s.uh_4p')->where('nis', $daftar_siswa->nis)->where('kd_rombel', $rombels->kd_rombel)->where('kd_mapel', auth()->user()->kd_mapel)->sum('uh_4p') }}</div>
                    <input type="number" max="100" data-edit="uh_4p" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_satu" value="" class="txt-edit semes_satu" name="uh_4p">
                  </td>
                  <td>
                    <div class="nilai-field">{{ $nilais = \App\Semester1::select('semester1s.uh_4k')->where('nis', $daftar_siswa->nis)->where('kd_rombel', $rombels->kd_rombel)->where('kd_mapel', auth()->user()->kd_mapel)->sum('uh_4k') }}</div>
                    <input type="number" max="100" data-edit="uh_4k" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_satu" value="" class="txt-edit semes_satu" name="uh_4k">
                  </td>
                  <td>
                    <div class="nilai-field">{{ $nilais = \App\Semester1::select('semester1s.uas_p')->where('nis', $daftar_siswa->nis)->where('kd_rombel', $rombels->kd_rombel)->where('kd_mapel', auth()->user()->kd_mapel)->sum('uas_p') }}</div>
                    <input type="number" max="100" data-edit="uas_p" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_satu" value="" class="txt-edit semes_satu" name="uas_p">
                  </td>
                  <td>
                    <div class="nilai-field">{{ $nilais = \App\Semester1::select('semester1s.uas_k')->where('nis', $daftar_siswa->nis)->where('kd_rombel', $rombels->kd_rombel)->where('kd_mapel', auth()->user()->kd_mapel)->sum('uas_k') }}</div>
                    <input type="number" max="100" data-edit="uas_k" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_satu" value="" class="txt-edit semes_satu" name="uas_k">
                  </td>
                  @endif
                  @if(\App\Semester2::select('semester2s.*')->where('nis', $daftar_siswa->nis)->count() < 1)
                  <td>
                    <div class="nilai-field">Isi</div>
                    <input type="number" max="100" data-edit="uh_5p" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_dua" value="" class="txt-edit semes_dua" name="uh_5p">
                  </td>
                  <td>
                    <div class="nilai-field">Isi</div>
                    <input type="number" max="100" data-edit="uh_5k" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_dua" value="" class="txt-edit semes_dua" name="uh_5k">
                  </td>
                  <td>
                    <div class="nilai-field">Isi</div>
                    <input type="number" max="100" data-edit="uh_6p" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_dua" value="" class="txt-edit semes_dua" name="uh_6p">
                  </td>
                  <td>
                    <div class="nilai-field">Isi</div>
                    <input type="number" max="100" data-edit="uh_6k" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_dua" value="" class="txt-edit semes_dua" name="uh_6k">
                  </td>
                  <td>
                    <div class="nilai-field">Isi</div>
                    <input type="number" max="100" data-edit="uts_2p" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_dua" value="" class="txt-edit semes_dua" name="uts_2p">
                  </td>
                  <td>
                    <div class="nilai-field">Isi</div>
                    <input type="number" max="100" data-edit="uts_2k" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_dua" value="" class="txt-edit semes_dua" name="uts_2k">
                  </td>
                  <td>
                    <div class="nilai-field">Isi</div>
                    <input type="number" max="100" data-edit="uh_7p" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_dua" value="" class="txt-edit semes_dua" name="uh_7p">
                  </td>
                  <td>
                    <div class="nilai-field">Isi</div>
                    <input type="number" max="100" data-edit="uh_7k" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_dua" value="" class="txt-edit semes_dua" name="uh_7k">
                  </td>
                  <td>
                    <div class="nilai-field">Isi</div>
                    <input type="number" max="100" data-edit="uh_8p" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_dua" value="" class="txt-edit semes_dua" name="uh_8p">
                  </td>
                  <td>
                    <div class="nilai-field">Isi</div>
                    <input type="number" max="100" data-edit="uh_8k" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_dua" value="" class="txt-edit semes_dua" name="uh_8k">
                  </td>
                  <td>
                    <div class="nilai-field">Isi</div>
                    <input type="number" max="100" data-edit="ukk_p" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_dua" value="" class="txt-edit semes_dua" name="ukk_p">
                  </td>
                  <td>
                    <div class="nilai-field">Isi</div>
                    <input type="number" max="100" data-edit="ukk_k" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_dua" value="" class="txt-edit semes_dua" name="ukk_k">
                  </td>
                  @else
                  <td>
                    <div class="nilai-field">{{ $nilais = \App\Semester2::select('semester2s.uh_5p')->where('nis', $daftar_siswa->nis)->where('kd_rombel', $rombels->kd_rombel)->where('kd_mapel', auth()->user()->kd_mapel)->sum('uh_5p') }}</div>
                    <input type="number" max="100" data-edit="uh_5p" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_dua" value="" class="txt-edit semes_dua" name="uh_5p">
                  </td>
                  <td>
                    <div class="nilai-field">{{ $nilais = \App\Semester2::select('semester2s.uh_5k')->where('nis', $daftar_siswa->nis)->where('kd_rombel', $rombels->kd_rombel)->where('kd_mapel', auth()->user()->kd_mapel)->sum('uh_5k') }}</div>
                    <input type="number" max="100" data-edit="uh_5k" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_dua" value="" class="txt-edit semes_dua" name="uh_5k">
                  </td>
                  <td>
                    <div class="nilai-field">{{ $nilais = \App\Semester2::select('semester2s.uh_6p')->where('nis', $daftar_siswa->nis)->where('kd_rombel', $rombels->kd_rombel)->where('kd_mapel', auth()->user()->kd_mapel)->sum('uh_6p') }}</div>
                    <input type="number" max="100" data-edit="uh_6p" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_dua" value="" class="txt-edit semes_dua" name="uh_6p">
                  </td>
                  <td>
                    <div class="nilai-field">{{ $nilais = \App\Semester2::select('semester2s.uh_6k')->where('nis', $daftar_siswa->nis)->where('kd_rombel', $rombels->kd_rombel)->where('kd_mapel', auth()->user()->kd_mapel)->sum('uh_6k') }}</div>
                    <input type="number" max="100" data-edit="uh_6k" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_dua" value="" class="txt-edit semes_dua" name="uh_6k">
                  </td>
                  <td>
                    <div class="nilai-field">{{ $nilais = \App\Semester2::select('semester2s.uts_2p')->where('nis', $daftar_siswa->nis)->where('kd_rombel', $rombels->kd_rombel)->where('kd_mapel', auth()->user()->kd_mapel)->sum('uts_2p') }}</div>
                    <input type="number" max="100" data-edit="uts_2p" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_dua" value="" class="txt-edit semes_dua" name="uts_2p">
                  </td>
                  <td>
                    <div class="nilai-field">{{ $nilais = \App\Semester2::select('semester2s.uts_2k')->where('nis', $daftar_siswa->nis)->where('kd_rombel', $rombels->kd_rombel)->where('kd_mapel', auth()->user()->kd_mapel)->sum('uts_2k') }}</div>
                    <input type="number" max="100" data-edit="uts_2k" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_dua" value="" class="txt-edit semes_dua" name="uts_2k">
                  </td>
                  <td>
                    <div class="nilai-field">{{ $nilais = \App\Semester2::select('semester2s.uh_7p')->where('nis', $daftar_siswa->nis)->where('kd_rombel', $rombels->kd_rombel)->where('kd_mapel', auth()->user()->kd_mapel)->sum('uh_7p') }}</div>
                    <input type="number" max="100" data-edit="uh_7p" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_dua" value="" class="txt-edit semes_dua" name="uh_7p">
                  </td>
                  <td>
                    <div class="nilai-field">{{ $nilais = \App\Semester2::select('semester2s.uh_7k')->where('nis', $daftar_siswa->nis)->where('kd_rombel', $rombels->kd_rombel)->where('kd_mapel', auth()->user()->kd_mapel)->sum('uh_7k') }}</div>
                    <input type="number" max="100" data-edit="uh_7k" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_dua" value="" class="txt-edit semes_dua" name="uh_7k">
                  </td>
                  <td>
                    <div class="nilai-field">{{ $nilais = \App\Semester2::select('semester2s.uh_8p')->where('nis', $daftar_siswa->nis)->where('kd_rombel', $rombels->kd_rombel)->where('kd_mapel', auth()->user()->kd_mapel)->sum('uh_8p') }}</div>
                    <input type="number" max="100" data-edit="uh_8p" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_dua" value="" class="txt-edit semes_dua" name="uh_8p">
                  </td>
                  <td>
                    <div class="nilai-field">{{ $nilais = \App\Semester2::select('semester2s.uh_8k')->where('nis', $daftar_siswa->nis)->where('kd_rombel', $rombels->kd_rombel)->where('kd_mapel', auth()->user()->kd_mapel)->sum('uh_8k') }}</div>
                    <input type="number" max="100" data-edit="uh_8k" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_dua" value="" class="txt-edit semes_dua" name="uh_8k">
                  </td>
                  <td>
                    <div class="nilai-field">{{ $nilais = \App\Semester2::select('semester2s.ukk_p')->where('nis', $daftar_siswa->nis)->where('kd_rombel', $rombels->kd_rombel)->where('kd_mapel', auth()->user()->kd_mapel)->sum('ukk_p') }}</div>
                    <input type="number" max="100" data-edit="ukk_p" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_dua" value="" class="txt-edit semes_dua" name="ukk_p">
                  </td>
                  <td>
                    <div class="nilai-field">{{ $nilais = \App\Semester2::select('semester2s.ukk_k')->where('nis', $daftar_siswa->nis)->where('kd_rombel', $rombels->kd_rombel)->where('kd_mapel', auth()->user()->kd_mapel)->sum('ukk_k') }}</div>
                    <input type="number" max="100" data-edit="ukk_k" data-nis="{{ $daftar_siswa->nis }}" data-rombel="{{ $daftar_siswa->kd_rombel }}" data-semes="semes_dua" value="" class="txt-edit semes_dua" name="ukk_k">
                  </td>
                  @endif
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
<script type="text/javascript">
  function cek_kkm() {
    $('.nilai-field').filter(function(){
      if($(this).text() == 0){
        $(this).text('Isi');
        $(this).css('color', 'grey');
      }else if($(this).text() < {{ $kkms->kkm }}){
        $(this).css('color', 'red');
      }
    });
  }

  cek_kkm();

  $(document).ready(function(){

    $('.nilai-field').click(function(){
      var value = $(this).html();
      $('.txt-edit').hide();
      $(this).next('.txt-edit').show().focus();
      if(value == 'Isi'){
        $(this).next('.txt-edit').val('0');
      }else{
        $(this).next('.txt-edit').val(value);
      }
      $(this).hide();
    });

    $(".txt-edit").on('keyup', function (e) {
      if(e.keyCode === 13) {
        var field = $(this).attr('data-edit');
        var semes = $(this).attr('data-semes');
        var nis = $(this).attr('data-nis');
        var kd_rombel = $(this).attr('data-rombel');
        var kd_mapel = "{{ auth()->user()->kd_mapel }}";
        var value = $(this).val();
        $(this).hide();
        $(this).prev('.nilai-field').show();
        $(this).prev('.nilai-field').text(value);
        $.ajax({
          method: "GET",
          url: "{{ url('/edit_nilai') }}/" + "{{ $daftar_siswa->nis }}" + "/" + semes + "/" + field + "/" + kd_mapel + "/" + nis + "/" + value + "/" + kd_rombel,
          success:function(response)
          {
            cek_kkm();
            Swal.fire({
              icon: 'success',
              text: 'Nilai berhasil diubah',
              showConfirmButton: false,
              timer: 1000
            })
          }
        });
       }
    });

    $(".txt-edit").focusout(function(){
      var field = $(this).attr('data-edit');
      var semes = $(this).attr('data-semes');
      var nis = $(this).attr('data-nis');
      var kd_rombel = $(this).attr('data-rombel');
      var kd_mapel = "{{ auth()->user()->kd_mapel }}";
      var value = $(this).val();
      $(this).hide();
      $(this).prev('.nilai-field').show();
      $(this).prev('.nilai-field').text(value);
      $.ajax({
        method: "GET",
        url: "{{ url('/edit_nilai') }}/" + semes + "/" + field + "/" + kd_mapel + "/" + nis + "/" + value + "/" + kd_rombel,
        success:function(response)
        {
          cek_kkm();
          Swal.fire({
            icon: 'success',
            text: 'Nilai berhasil diubah',
            showConfirmButton: false,
            timer: 1000
          })
        }
      });
    });
  });
</script>
@endsection