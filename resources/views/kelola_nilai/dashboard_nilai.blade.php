@extends('layouts/header')
@section('nav')
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-file-alt"></i>
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
        <a class="nav-link" href="{{ url('/lihat_akun') }}">
          <i class="fas fa-user"></i>
          <span>Lihat Akun</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/kelola_nilai', auth()->user()->kd_guru) }}">
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
    <div class="col-lg-12 mb-4">
      <div class="card bg-success text-white shadow" id="card-welcome">
        <div class="card-body text-center">
          <h3>Kelola Nilai Siswa</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    @foreach($daftar_kelas as $kelas)
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2 text-center">
              <a href="{{ url('/detail_nilai', $kelas->kd_rombel) }}">
                {{ $kelas->rombel }}
              </a>
            </div>
            <div class="col-auto">
              <!-- <i class="fas fa-users fa-2x text-gray-300"></i> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
</div>
@endsection