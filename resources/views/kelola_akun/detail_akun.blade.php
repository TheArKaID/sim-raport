@extends('layouts/header')
@section('css')
<style type="text/css">
	#background-image-card{
    margin: 10px 10px 10px 10px;
    border-radius: 5px;
		background-image: url('{{ asset('images/bg-4.jpg') }}');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    padding-top: 100px;
    padding-bottom: 100px;
	}
  #card-identity{
    padding-top: 15px;
    margin: 10px 10px 10px -25px;
    background-color: #ff00;
    z-index: 1;
    border-radius: 5px;
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
      <hr class="sidebar-divider d-none d-md-block">
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
@endsection
@section('isi')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 text-left">
      <a href="{{ url('/kelola_akun') }}" class="btn btn-primary">Kembali</a>
    </div>
  </div>
</div>
<div class="row">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ url('/update_akun/'.$user->id) }}" enctype="multipart/form-data">
              @csrf
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Kode Guru</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="kd_guru" value="{{ $user->kd_guru }}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Nama</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Role</label>
                <div class="col-sm-8" id="edit-type-wrapper">
                    <select id="inputState" class="form-control" name="role">
                      @if($user->role == 'Guru')
                      <option value="Kurikulum">Kurikulum</option>
                      <option value="Guru" selected="">Guru</option>
                      @endif
                      @if($user->role == 'Kurikulum')
                      <option value="Kurikulum" selected="">Kurikulum</option>
                      <option value="Guru">Guru</option>
                      @endif
                    </select>
                </div>
              </div>
              <div class="form-group row mapel_select">
                <label class="col-sm-4 col-form-label">Mapel</label>
                <div class="col-sm-8">
                    <select id="inputState" class="form-control" name="mapel">
                      <option value="{{ $user->mapel }}" selected="">{{ $user->mapel }}</option>
                      @foreach($mapel as $m)
                        @if($user->mapel != $m->mapel)
                          <option value="{{ $m->mapel }}">{{ $m->mapel }}</option>
                        @endif
                      @endforeach
                    </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Username</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="username" value="{{ $user->email }}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Foto</label>
                <div class="col-sm-8">
                  <input type="file" name="avatar" value="{{ $user->avatar }}">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-block">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div><br>
<div class="row">
    <div class="modal fade" id="TambahKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ url('/detail_akun/tambah_kelas') }}" enctype="multipart/form-data">
              @csrf
              <div class="form-group row">
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="kd_guru" hidden="" value="{{ $user->kd_guru }}">
                  <input type="text" class="form-control" name="id" hidden="" value="{{ $user->id }}">
                  <input type="text" class="form-control" name="mapel" hidden="" value="{{ $user->mapel }}">
                </div>
              </div>
              <!-- DAFTAR KELAS -->
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Rombel</label>
                <div class="col-sm-8">
                  <select id="inputState" class="form-control" name="kd_rombel">
                  @foreach($kelas as $k)
                    <option value="{{ $k->kd_rombel }}">{{ $k->rombel }}</option>
                  @endforeach
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-block">Tambah</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div><br>
<div class="jumbotron jumbotron-fluid" id="background-image-card">
  <div class="container text-center">
    <img src="{{ $user->getAvatar() }}" class="rounded-circle" width="200" height="200">
  </div>
</div>
<div class="row" id="card-identity">
  <div class="col-lg-6">
    <ul>
      <li class="list-group-item">Kode Guru &nbsp;: {{ $user->kd_guru }}</li>
      <li class="list-group-item">Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $user->name }}</li>
      <li class="list-group-item">Role &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $user->role }}</li>
      @if($user->role == 'Guru')
      <li class="list-group-item">Mapel &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $user->mapel }}</li>
      @endif
      <br>
      <div class="text-right"><a href="" data-toggle="modal" data-target="#exampleModal" class=" btn btn-primary pl-5 pr-5">Edit</a></div>
    </ul>
  </div>
  @if($user->role == 'Guru')
  <div class="col-lg-5 ml-4">
    <div class="card">
      <div class="card-header bg-primary" style="color: #fff;">
        Kelas Ajar
      </div>
    </div>
    <div class="accordion" id="accordionExample">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h2 class="mb-0">
          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Kelas X
          </button>
        </h2>
      </div>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <table cellpadding="10">
          @foreach($tingkat1 as $ajar)
          <tr>
            <td>{{ $ajar->rombel }}</td>
            <td><a href="{{ url('/detail_akun/hapus_kelas', $ajar->id)}}" class="btn btn-danger">x</a></td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
    <div class="card">
      <div class="card-header" id="headingTwo">
        <h2 class="mb-0">
          <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Kelas XI
          </button>
        </h2>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body">
          <table cellpadding="10">
            @foreach($tingkat2 as $ajar)
            <tr>
              <td>{{ $ajar->rombel }}</td>
              <td><a href="{{ url('/detail_akun/hapus_kelas', $ajar->id) }}" class="btn btn-danger">x</a></td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingThree">
        <h2 class="mb-0">
          <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Kelas XII
          </button>
        </h2>
      </div>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
        <div class="card-body">
          <table cellpadding="10">
            @foreach($tingkat3 as $ajar)
            <tr>
              <td>{{ $ajar->rombel }}</td>
              <td><a href="{{ url('/detail_akun/hapus_kelas', $ajar->id) }}" class="btn btn-danger">x</a></td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div><br>
    <a href="#" class="ml-2 mb-5" data-toggle="modal" data-target="#TambahKelas"><i class="fa fa-plus"></i> Tambah Kelas</a><br><br>
  </div>
  </div>
  @endif
</div>
@endsection
@section('script')
<script type="text/javascript">
$(document).ready( function() {
  $('#edit-type-wrapper select').change(function() {
     if($(this).val() == "Kurikulum"){
       $('.mapel_select').hide();
     } else {
       $('.mapel_select').show();
     }
  });
});
</script>
@endsection