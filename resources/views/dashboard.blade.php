@extends('layouts/header')
@section('css')
<style type="text/css">
  #btn-kelola .card{
    
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
          <!-- <i class="fas fa-file-alt"></i> -->
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
        <a class="nav-link" href="{{ url('/lihat_akun') }}">
          <i class="fas fa-user"></i>
          <span>Lihat Akun</span></a>
      </li>
      @if(auth()->user()->role == 'Kurikulum')
      <li class="nav-item">
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
      @if(auth()->user()->role == 'Guru')
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/kelola_nilai', auth()->user()->kd_guru) }}">
          <i class="fas fa-calculator"></i>
          <span>Kelola Nilai</span></a>
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
    <div class="col-lg-12 mb-4">
    @if(auth()->user()->mapel == 'Matematika')
        <div class="card bg-success text-white shadow" id="card-welcome" style="
    background-image: url('{{ asset('images/math3.jpg') }}');">
    @elseif(auth()->user()->mapel == 'Indonesia')
        <div class="card bg-success text-white shadow" id="card-welcome" style="
    background-image: url('{{ asset('images/indo1.jpg') }}');">
    @elseif(auth()->user()->mapel == 'Sejarah')
        <div class="card bg-success text-white shadow" id="card-welcome" style="
        background-image: url('{{ asset('images/history1.jpg') }}');">
    @elseif(auth()->user()->mapel == 'Produktif')
        <div class="card bg-success text-white shadow" id="card-welcome" style="
        background-image: url('{{ asset('images/prod1.jpg') }}');">
    @else
        <div class="card text-white shadow" id="card-welcome" style="background-image: url('{{ asset('images/dashboardbg.jpg') }}');">
    @endif
          <div class="card-body text-left ml-4" style="margin-top: -30px; margin-bottom: -30px;">
            <!-- <h2>Welcome {{auth()->user()->name}}</h2> -->
            <p style="font-size: 20px;">Welcome</p><br>
            <p style="font-size: 30px; font-weight: bold; margin-top: -40px;">{{auth()->user()->name}}</p><hr style="border-color: #fff;">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
        </div>
      </div>
  </div>
  <div class="row">
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
      <a href="{{ url('kelola_kelas') }}" style="color: #7102cf; font-weight: bold;">
      <div class="card shadow h-100 py-2" style="border-left-color: #7a00e2; border-left-width: 5px; background-image: url('{{ asset('img/btn4.png') }}'); background-position: center; background-size: cover;">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2 text-center">
                Kelola Kelas
            </div>
            <div class="col-auto">
            </div>
          </div>
        </div>
      </div>
      </a>
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
</div>
</div>
@endsection