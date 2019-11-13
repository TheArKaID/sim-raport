@extends('layouts/header')
@section('css')
<style type="text/css">
  #card-welcome{
    background-image: url('{{ asset('images/bg-2.jpg') }}');
    background-size: cover;
    background-attachment: fixed;
    background-repeat: no-repeat;
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
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-file-alt"></i>
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
        <div class="card bg-success text-white shadow" id="card-welcome">
          <div class="card-body text-center">
            <h2>Welcome {{auth()->user()->name}}</h2>
          </div>
        </div>
      </div>
  </div>
  <div class="row">
    @if(auth()->user()->role == 'Kurikulum')
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2 text-center">
              <a href="{{ url('kelola_kelas') }}">
                Lihat Akun
              </a>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2 text-center">
              <a href="{{ url('/kelola_akun') }}">
                Kelola Akun
              </a>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2 text-center">
              <a href="{{ url('kelola_raport') }}">
                Kelola Raport
              </a>
            </div>
            <div class="col-auto">
              <i class="far fa-file-alt fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2 text-center">
              <a href="{{ url('kelola_kelas') }}">
                Kelola Kelas
              </a>
            </div>
            <div class="col-auto">
              <i class="far fa-address-card fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
    @if(auth()->user()->role == 'Guru')
    <div class="col-xl-6 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2 text-center">
              <a href="{{ url('kelola_nilai') }}">
                Lihat Akun
              </a>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
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
              <i class="fas fa-calculator fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
</div>
</div>
@endsection