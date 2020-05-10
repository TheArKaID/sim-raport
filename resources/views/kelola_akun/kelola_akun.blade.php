@extends('layouts/header')
@section('css')
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<style type="text/css">
  @media only screen and (max-width: 575px) {
    .tambah-mapel-btn{
      margin-top: 15px;
    }
  }
  .table-mapel{
    overflow-x: scroll;
  }
  .table-mapel table{
    white-space: nowrap;
  }
  .backkelola{
    color: grey;
    text-decoration: none;
  }
  .backkelola:hover{
    color: #7a00e2;
    text-decoration: none;
  }
  #fotouser{
    object-fit: cover;
    width: 10rem;
    height: 10rem;
  }
  .tabContainer{
    width: 100%;
    height: 350px;
  }
  .tabContainer .buttonContainer{
    height: 15%;
  }
  .tabContainer .buttonContainer button{
    width: 33.33333%;
    height: 100%;
    color: #858796;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 10px;
    font-size: 15px;
    background-color: #eee;
  }
  .tabContainer .buttonContainer button:hover{
    color: #7a00e2;
    font-weight: bold;
  }
  .tabContainer .tabPanel{
    margin-top: -2px;
    border-bottom-right-radius: 5px;
    border-bottom-left-radius: 5px;
    background-color: gray;
    color: white;
    text-align: center;
    padding-top: 30px;
    padding-bottom: 30px;
    box-sizing: border-box;
    display: none;
    font-size: 20px;
  }
  #panel1Btn{
    border-top-left-radius: 5px;
  }
  #panel2Btn{
    border-top-right-radius: 5px;
  }
  #kelasfield{
    color: #858796;
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
<div class="container-fluid" id="kelola_akun_1">
  <div class="row">
    <div class="col-lg-10 col-md-10 col-sm-10" id="title-menu">
      <div class="media">
        <img src="{{ asset('icon/id-card2.png') }}" class="mr-3 rounded" alt="..." style="background-color: #fff; padding: 10px; width: 70px; box-shadow: 3px 3px rgba(0,0,0,.2);">
        <div class="media-body">
          <h5 class="mt-1" style="color: #3e3d3e; font-weight: bold;">Kelola Akun</h5>
          Kelola akun dan hak akses
        </div>
      </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-2 mt-3 text-right">
      <a href="#" role="button" class="btn btn-sm shadow-sm" style="color: #fff; background-color: #b854f5;" data-toggle="modal" data-target="#saveModal"><i class="fas fa fa-plus fa-sm text-white-50"></i> Tambah Data</a>
    </div>
    <div class="modal fade" id="tambahMapelModal" tabindex="-1" role="dialog" aria-labelledby="tambahMapelModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="tambahMapelModalLabel">Tambah Mapel</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <form id="tambahMapel" method="POST">
                  @csrf
                  <div class="form-group row">
                    <label for="kodeMapel" class="col-sm-3 col-form-label">Kode Mapel</label>
                    <div class="col-sm-9 autoKodeMapel">
                      
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="namaMapel" class="col-sm-3 col-form-label">Mapel</label>
                    <div class="col-sm-9">
                      <input name="mapel" type="text" class="form-control" id="namaMapel" autocomplete="off" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-block" style="color: #fff; background-color: #b854f5;">Tambah Mapel</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12">
                <hr>
                <div class="table-mapel">
                  <table class="table table-bordered text-center" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Kode Mapel</th>
                        <th>Mapel</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="daftarMapel">

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="saveModal" tabindex="-1" role="dialog" aria-labelledby="saveModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12 col-sm-12 mb-3">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModalTambah">
                  <span aria-hidden="true" style="color: #aaa;">&times;</span>
                </button>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-sm-12 mb-2" align="center">
                <img src="{{ asset('icon/undraw_add_user_ipe3.svg') }}" class="img-fluid w-50">
                <h5 class="mt-3 mb-1" style="color: #7a00e2;">Tambah User</h5>
                <p>Isi semua data dengan benar</p>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="text-center" id="same_username">
                </div>
              </div>
            </div>
            <form method="POST" id="formSave">
              @csrf
              <div class="form-group row">
                <div class="col-sm-12" id="maksKode">
                  <input type="text" class="form-control" name="kd_guru" readonly="" value="{{ $max4 }}">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-12">
                  <input type="text" placeholder="Nama" class="form-control" name="name" required="">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-12" id="edit-type-wrapper">
                    <select id="inputRole" class="form-control" name="role">
                      <option value="Guru">Guru</option>
                      <option value="Kurikulum">Kurikulum</option>
                    </select>
                </div>
              </div>
              <div class="form-group row mapel_select">
                <div class="col-sm-10 col-xs-10">
                    <select id="inputMapel" class="form-control daftar_mapel" name="mapel">
                      
                    </select>
                </div>
                <div class="col-sm-2 tambah-mapel-btn">
                  <button class="btn btn-block" data-dismiss="modal" data-toggle="modal" data-target="#tambahMapelModal" style="color: #fff; background-color: #b854f5;"><i class="fas fa-plus"></i></button>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-12">
                  <input type="text" placeholder="Username" class="form-control" name="username" required="">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-12">
                  <input type="password" placeholder="Password" class="form-control" name="password" required="">
                </div>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-block" style="background-color: #b854f5; color: #fff; border-radius: 5px;">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4 mb-4">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="card shadow">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Daftar Akun</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead class="text-center">
                <tr>
                  <th>No</th>
                  <th>Kode Guru</th>
                  <th>Nama</th>
                  <th>Role</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($user as $u)
                <tr>
                  <th>{{ $loop->iteration }}</th>
                  <td>{{ $u->kd_guru }}</td>
                  <td>{{ $u->name }}</td>
                  <td>{{ $u->role }}</td>
                  <td class="text-center">
                    @if($u->role == 'Guru')
                    <button id="{{ $u->id }}" class="btn detailakun btn-icon-split" style="background-color: #b854f5; color: #fff;">
                      <span class="icon text-white-50">
                          <i class="fas fa-info-circle"></i>
                        </span>
                        <span class="text">Detail</span>
                    </button>
                    <button id="{{ $u->kd_guru }}" class="btn hapusakun btn-icon-split" style="background-color: #5700e2; color: #fff;">
                      <span class="icon text-white-50">
                          <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Hapus</span>
                    </button>
                    @else
                    <button id="{{ $u->id }}" class="btn detailakun btn-icon-split" style="background-color: #b854f5; color: #fff;">
                      <span class="icon text-white-50">
                          <i class="fas fa-info-circle"></i>
                        </span>
                        <span class="text">Detail</span>
                    </button>
                    <button class="btn hapus-kurikulum btn-icon-split" style="background-color: #5700e2; color: #fff;">
                      <span class="icon text-white-50">
                          <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Hapus</span>
                    </button>
                    @endif
                  </td>
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
<div class="container-fluid" id="">
  <div class="row">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12 col-sm-12 mb-3">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModalEdit">
                  <span aria-hidden="true" style="color: #aaa;">&times;</span>
                </button>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-sm-12 mb-2" align="center">
                <img src="{{ asset('icon/undraw_editable_dywm.svg') }}" class="img-fluid w-50">
                <h5 class="mt-3 mb-1" style="color: #7a00e2;">Ubah User</h5>
                <p>Ubah data dengan benar</p>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="text-center" id="same_username_2">
                </div>
              </div>
            </div>
            <form method="POST" id="formEdit">
              @csrf
              <div class="form-group row">
                <div class="col-sm-12">
                  <div class="custom-file">
                    <input type="file" name="avatarupdate" class="custom-file-input" id="avatarupdate">
                    <label class="custom-file-label" for="avatarupdate">Choose file...</label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-12">
                  <input type="text" name="idEdit" id="idEdit" hidden="">
                  <input type="text" name="kdGuru" id="kdGuru" hidden="">
                  <input type="text" placeholder="Nama" class="form-control" name="nameupdate" id="nameupdate" required="">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-12" id="edit-type-wrapper">
                    <select id="updateRole" class="form-control" name="roleupdate" id="roleupdate">
                      <option value="Guru" class="role-guru">Guru</option>
                      <option value="Kurikulum" class="role-kurikulum">Kurikulum</option>
                    </select>
                </div>
              </div>
              <div class="form-group row mapel_select mapelupdate">
                <div class="col-sm-12">
                    <select id="updateMapel" class="form-control daftar_mapel" name="mapelupdate">

                    </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="usernameupdate" id="usernameupdate" required="">
                </div>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-block" style="background-color: #b854f5; color: #fff; border-radius: 5px;" id="updateBtn">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="tamabahKelas" tabindex="-1" role="dialog" aria-labelledby="tamabahKelasLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12 col-sm-12 mb-3">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModaltamabahKelas">
                  <span aria-hidden="true" style="color: #aaa;">&times;</span>
                </button>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-sm-12 mb-2" align="center">
                <img src="{{ asset('icon/undraw_true_friends_c94g.svg') }}" class="img-fluid w-50">
                <h5 class="mt-3 mb-1" style="color: #7a00e2;">Tambah Rombel</h5>
                <p>Pilih rombel yang akan diajar</p>
              </div>
            </div>
            <form method="POST" id="formTambahKelas">
              @csrf
              <div class="form-group row">
                <div class="col-sm-12">
                  <select multiple="multiple" style="width: 100%;" id="select1" class="form-control" name="kd_rombel[]" required="">
                    </select>
                </div>
              </div>
              <div class="row" hidden="">
                <input type="text" name="kd_guru" id="tk_kd_guru">
                <input type="text" name="kd_mapel" id="tk_kd_mapel">
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-block" style="background-color: #b854f5; color: #fff; border-radius: 5px;">Tambah</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid" id="kelola_akun_2" hidden="">
  <div class="row">
    <div class="col-sm-12 col-lg-12 col-md-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb shadow" style="background-color: #fff;">
          <li class="breadcrumb-item"><a href="{{ url('/kelola_akun') }}" class="backkelola">Kelola Akun</a></li>
          <li class="breadcrumb-item active" aria-current="page">Detail</li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-4 col-lg-5">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Detail Akun</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="text-center">
            <img src="" class="img-fluid rounded-circle mb-3" id="fotouser">
          </div>
          <h5 class="card-title mb-4" style="font-weight: bold; color: #7a00e2;" id="editnama"></h5>
            <form>
              <div class="form-group row text-white">
                <div class="col-sm-12">
                  <input type="text" class="form-control-plaintext" style="color: #7a00e2;" readonly="" id="editrole"><hr style="border-color: #7a00e2; margin-top: -5px; margin-bottom: -10px;">
                </div>
              </div>
              <div class="form-group row text-white">
                <div class="col-sm-12">
                  <input type="text" class="form-control-plaintext" style="color: #7a00e2;" readonly="" id="editmapel"><hr style="border-color: #7a00e2; margin-top: -5px;" id="hrmapel">
                </div>
              </div>
            </form>
          <div class="text-center">
            <a href="#" data-toggle="modal" id="editBtn" class="btn" data-target="#editModal" style="background-color: #b854f5; color: #fff; font-size: 14px; font-weight: bold; border-radius: 50px;">Edit Data</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7" id="kelas_ajar">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Kelas Ajar</h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" data-target="#tamabahKelas" data-toggle="modal" id="tamabahKelasBtn">
              <i class="fas fa-plus"></i>
            </a>
          </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="card-group">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Kelas X</h5>
                    <ul class="list-group" id="kelas-x">
                      
                    </ul>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Kelas XI</h5>
                    <ul class="list-group" id="kelas-xi">
                      
                    </ul>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Kelas XII</h5>
                    <ul class="list-group" id="kelas-xii">
                      
                    </ul>
                  </div>
                </div>
              </div>
            </div>
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
<script src="{{ asset('js/select2.min.js') }}"></script>

<script type="text/javascript">
function maksKode(){
  $.ajax({
    method: "GET",
    url: "{{ url('/maksKodeMapel') }}",
    success:function(data) {
      $('.autoKodeMapel').html(data);
    }
  });
}

function tabelMapel(){
  $.ajax({
    method: "GET",
    url: "{{ url('/tabelMapel') }}",
    success:function(data) {
      $('#daftarMapel').html(data);
    }
  });
}

function selectMapel(){
  $.ajax({
    method: "GET",
    url: "{{ url('/select_mapel') }}",
    success:function(data) {
      $('.daftar_mapel').html(data);
    }
  });
}

selectMapel();
tabelMapel();
maksKode();

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

$(document).on('click', '.hapus-kurikulum', function(){
  Swal.fire({
    icon: 'error',
    text: 'Akun Kurikulum Tidak Bisa Dihapus',
    showConfirmButton: false,
    timer: 1500
  })
});

$(document).on('click', '#tamabahKelasBtn', function(){
  $('#select1').select2({
    placeholder: '-- Pilih Rombel --',
    allowClear: true
  });
  $("#select1 option").each(function(){
    var value = $(this).val();
    var elems = $("#select1 option[value="+value+"]");
    if (elems.length > 1) {
        elems.remove();
    }
  });
});

$('#formTambahKelas').submit(function(e){
  e.preventDefault();
  var request = new FormData(this);
  $.ajax({
    url: "{{ url('/simpan_kelas') }}",
    method: "POST",
    data: request,
    contentType: false,
    cache: false,
    processData: false,
    success:function(response){
      if(response != ""){
        var kelas_x = "";
        var kelas_xi = "";
        var kelas_xii = "";
        var rombel = "";
        // Rplwikramabogor242411
        for(var i = 0; i<response.tingkat1.length; i++){
          kelas_x = kelas_x + '<li class="list-group-item d-flex justify-content-between align-items-center">'+response.tingkat1[i].rombel+'<a href="#" id="'+response.tingkat1[i].id+'" class="hapuskelas"><span class="badge badge-primary badge-pill">x</span></a></li>';
        }
        for(var i = 0; i<response.tingkat2.length; i++){
          kelas_xi = kelas_xi + '<li class="list-group-item d-flex justify-content-between align-items-center">'+response.tingkat2[i].rombel+'<a href="#" id="'+response.tingkat2[i].id+'" class="hapuskelas"><span class="badge badge-primary badge-pill">x</span></a></li>';
        }
        for(var i = 0; i<response.tingkat3.length; i++){
          kelas_xii = kelas_xii + '<li class="list-group-item d-flex justify-content-between align-items-center">'+response.tingkat3[i].rombel+'<a href="#" id="'+response.tingkat3[i].id+'" class="hapuskelas"><span class="badge badge-primary badge-pill">x</span></a></li>';
        }
        for(var i = 0; i<response.rombel.length; i++){
          rombel = rombel + '<option id="rombel_id" value="'+response.rombel[i].kd_rombel+'">'+response.rombel[i].rombel+'</option>';
        }
        for(var i = 0; i<response.rombel_ajar.length; i++){
          rombel = rombel + '<option id="rombel_id" value="'+response.rombel_ajar[i].kd_rombel+'">'+response.rombel_ajar[i].rombel+'</option>';
        }
        $('#closeModaltamabahKelas').click();
        $('#select1').html(rombel);
        $('#kelas-x').html(kelas_x);
        $('#kelas-xi').html(kelas_xi);
        $('#kelas-xii').html(kelas_xii);
      }
    }
  });
});

$('#formSave').submit(function(e){
  e.preventDefault();
  var request = new FormData(this);
  $.ajax({
    url: "{{ url('/simpan_akun') }}",
    method: "POST",
    data: request,
    contentType: false,
    cache: false,
    processData: false,
    success:function(data){
      var warning = '<div class="alert" role="alert" style="background-color: #d7b2f6; color: #7a00e2;">Username telah digunakan</div>';
      if(data == "sukses"){
        window.location = "{{ url('/kelola_akun') }}";
      }else if(data == "gagal"){
        $('#same_username').html(warning);
        $('#formSave')[0].reset();
      }
    }
  });
});

$('#tambahMapel').submit(function(e){
  e.preventDefault();
  var request = new FormData(this);
  $.ajax({
    url: "{{ url('/simpan_mapel') }}",
    method: "POST",
    data: request,
    contentType: false,
    cache: false,
    processData: false,
    success:function(data){
      if(data == "sukses")
      {
        $('#namaMapel').val('');
        selectMapel();
        tabelMapel();
        maksKode();
      }
    }
  });
});

$('#formEdit').submit(function(e){
  e.preventDefault();
  var kd_guru = $('#kdGuru').val();
  var id = $('#idEdit').val();
  var request = new FormData(this);
  $.ajax({
    url: "{{ url('/update_akun') }}/" + id + "/" + kd_guru,
    method: "POST",
    data: request,
    contentType: false,
    cache: false,
    processData: false,
    success:function(response){
      if(response.status == "sukses"){
        if(response.user.avatar == null){
          $('#fotouser').attr('src', "{{ asset('picture/user.png') }}");
        }else{
          $('#fotouser').attr('src', "{{ asset('picture') }}/" + response.user.avatar);
        }
        if(response.user.role == "Kurikulum"){
          $('.mapelupdate').prop('hidden', true);
          $('#kelas_ajar').prop('hidden', true);
          $('#editmapel').prop('hidden', true);
          $('#hrmapel').prop('hidden', true);
          $('.role-kurikulum').prop('selected', true);
          $('.mapel_select').prop('hidden', true);
          $('.-').prop('hidden', false);
        }else{
          $('.mapelupdate').prop('hidden', false);
          $('#kelas_ajar').prop('hidden', false);
          $('#editmapel').prop('hidden', false);
          $('#hrmapel').prop('hidden', false);
          $('.role-guru').prop('selected', true);
          $('.mapel_select').prop('hidden', false);
          $('.-').prop('hidden', true);
        }
        $('#tk_kd_mapel').val(response.user.kd_mapel);
        $('#tk_kd_guru').val(response.user.kd_guru);
        $('#idEdit').val(response.user.id);
        $('#kdGuru').val(response.user.kd_guru);
        $('#nameupdate').val(response.user.name);
        $('#usernameupdate').val(response.user.username);
        $('#editnama').html(response.user.name);
        $('#editrole').val("Role : " + response.user.role);
        $('#editmapel').val("Mapel : " + response.user.mapel);
        $('#kelola_akun_1').prop('hidden', true);
        $('#kelola_akun_2').prop('hidden', false);
        $('#closeModalEdit').click();
        $('#same_username_2').html('');
      }else if(response.status == "gagal"){
        if(response.user.avatar == null){
          $('#fotouser').attr('src', "{{ asset('picture/user.png') }}");
        }else{
          $('#fotouser').attr('src', "{{ asset('picture') }}/" + response.user.avatar);
        }
        if(response.user.role == "Kurikulum"){
          $('.mapelupdate').prop('hidden', true);
          $('#kelas_ajar').prop('hidden', true);
          $('#editmapel').prop('hidden', true);
          $('#hrmapel').prop('hidden', true);
          $('.role-kurikulum').prop('selected', true);
          $('.mapel_select').prop('hidden', true);
          $('.-').prop('hidden', false);
        }else{
          $('.mapelupdate').prop('hidden', false);
          $('#kelas_ajar').prop('hidden', false);
          $('#editmapel').prop('hidden', false);
          $('#hrmapel').prop('hidden', false);
          $('.role-guru').prop('selected', true);
          $('.mapel_select').prop('hidden', false);
          $('.-').prop('hidden', true);
        }
        $('#tk_kd_mapel').val(response.user.kd_mapel);
        $('#tk_kd_guru').val(response.user.kd_guru);
        $('#idEdit').val(response.user.id);
        $('#kdGuru').val(response.user.kd_guru);
        $('#nameupdate').val(response.user.name);
        $('#editnama').html(response.user.name);
        $('#editrole').val("Role : " + response.user.role);
        $('#editmapel').val("Mapel : " + response.user.mapel);
        $('#kelola_akun_1').prop('hidden', true);
        $('#kelola_akun_2').prop('hidden', false);
        var warning = '<div class="alert" role="alert" style="background-color: #d7b2f6; color: #7a00e2;">Username telah digunakan</div>';
        $('#same_username_2').html(warning);
      }
    }
  });
});

$(document).on('click', '.detailakun', function(e){
  e.preventDefault();
  var id = $(this).attr('id');
  $.ajax({
    url: "{{ url('detail_akun') }}/" + id,
    method: "GET",
    success:function(response){
      if(response != "")
      {
        if(response.user.avatar == null){
          $('#fotouser').attr('src', "{{ asset('picture/user.png') }}");
        }else{
          $('#fotouser').attr('src', "{{ asset('picture') }}/" + response.user.avatar);
        }
        if(response.user.role == "Kurikulum"){
          $('.mapelupdate').prop('hidden', true);
          $('#kelas_ajar').prop('hidden', true);
          $('#editmapel').prop('hidden', true);
          $('#hrmapel').prop('hidden', true);
          $('.role-kurikulum').prop('selected', true);
          $('.mapel_select').prop('hidden', true);
          $('.-').prop('hidden', false);
        }else{
          $('.mapelupdate').prop('hidden', false);
          $('#kelas_ajar').prop('hidden', false);
          $('#editmapel').prop('hidden', false);
          $('#hrmapel').prop('hidden', false);
          $('.role-guru').prop('selected', true);
          $('.mapel_select').prop('hidden', false);
          $('.-').prop('hidden', true);
        }
        $('#tk_kd_mapel').val(response.user.kd_mapel);
        $('#tk_kd_guru').val(response.user.kd_guru);
        $('#panel1Btn').click();
        $('#idEdit').val(response.user.id);
        $('#kdGuru').val(response.user.kd_guru);
        $('#nameupdate').val(response.user.name);
        $('#usernameupdate').val(response.user.username);
        $('#editnama').html(response.user.name);
        $('#editrole').val("Role : " + response.user.role);
        $('#editmapel').val("Mapel : " + response.user.mapel);
        $('.'+response.user.kd_mapel+'').prop('selected', true);
        $('#kelola_akun_1').prop('hidden', true);
        $('#kelola_akun_2').prop('hidden', false);
        var kelas_x = "";
        var kelas_xi = "";
        var kelas_xii = "";
        var rombel = "";
        for(var i = 0; i<response.tingkat1.length; i++){
          kelas_x = kelas_x + '<li class="list-group-item d-flex justify-content-between align-items-center">'+response.tingkat1[i].rombel+'<a href="#" id="'+response.tingkat1[i].id+'" class="hapuskelas"><span class="badge badge-primary badge-pill">x</span></a></li>';
        }
        for(var i = 0; i<response.tingkat2.length; i++){
          kelas_xi = kelas_xi + '<li class="list-group-item d-flex justify-content-between align-items-center">'+response.tingkat2[i].rombel+'<a href="#" id="'+response.tingkat2[i].id+'" class="hapuskelas"><span class="badge badge-primary badge-pill">x</span></a></li>';
        }
        for(var i = 0; i<response.tingkat3.length; i++){
          kelas_xii = kelas_xii + '<li class="list-group-item d-flex justify-content-between align-items-center">'+response.tingkat3[i].rombel+'<a href="#" id="'+response.tingkat3[i].id+'" class="hapuskelas"><span class="badge badge-primary badge-pill">x</span></a></li>';
        }
        for(var i = 0; i<response.rombel.length; i++){
          rombel = rombel + '<option id="rombel_id" value="'+response.rombel[i].kd_rombel+'">'+response.rombel[i].rombel+'</option>';
        }
        for(var i = 0; i<response.rombel_ajar.length; i++){
          rombel = rombel + '<option id="rombel_id" value="'+response.rombel_ajar[i].kd_rombel+'">'+response.rombel_ajar[i].rombel+'</option>';
        }
        $('#select1').html(rombel);
        $('#kelas-x').html(kelas_x);
        $('#kelas-xi').html(kelas_xi);
        $('#kelas-xii').html(kelas_xii);
      }
    }
  });
});

$(document).on('click', '.hapusmapel', function(e){
  e.preventDefault();
  var id_mapel = $(this).attr('id');
  $.ajax({
    url: "{{ url('hapus_mapel') }}/" + id_mapel,
    method: "GET",
    success:function(data){
      if(data == "sukses")
      {
        selectMapel();
        maksKode();
        tabelMapel();
      }
    }
  });
});

$(document).on('click', '.hapuskelas', function(e){
  e.preventDefault();
  var kd_guru = $('#kdGuru').val();
  var id_ajar = $(this).attr('id');
  $.ajax({
    url: "{{ url('hapus_kelas') }}/" + id_ajar + "/" + kd_guru,
    method: "GET",
    success:function(response){
      if(response != ""){
        var kelas_x = "";
        var kelas_xi = "";
        var kelas_xii = "";
        var rombel = "";
        for(var i = 0; i<response.tingkat1.length; i++){
          kelas_x = kelas_x + '<li class="list-group-item d-flex justify-content-between align-items-center">'+response.tingkat1[i].rombel+'<a href="#" id="'+response.tingkat1[i].id+'" class="hapuskelas"><span class="badge badge-primary badge-pill">x</span></a></li>';
        }
        for(var i = 0; i<response.tingkat2.length; i++){
          kelas_xi = kelas_xi + '<li class="list-group-item d-flex justify-content-between align-items-center">'+response.tingkat2[i].rombel+'<a href="#" id="'+response.tingkat2[i].id+'" class="hapuskelas"><span class="badge badge-primary badge-pill">x</span></a></li>';
        }
        for(var i = 0; i<response.tingkat3.length; i++){
          kelas_xii = kelas_xii + '<li class="list-group-item d-flex justify-content-between align-items-center">'+response.tingkat3[i].rombel+'<a href="#" id="'+response.tingkat3[i].id+'" class="hapuskelas"><span class="badge badge-primary badge-pill">x</span></a></li>';
        }
        for(var i = 0; i<response.rombel.length; i++){
          rombel = rombel + '<option id="rombel_id" value="'+response.rombel[i].kd_rombel+'">'+response.rombel[i].rombel+'</option>';
        }
        for(var i = 0; i<response.rombel_ajar.length; i++){
          rombel = rombel + '<option id="rombel_id" value="'+response.rombel_ajar[i].kd_rombel+'">'+response.rombel_ajar[i].rombel+'</option>';
        }
        $('#select1').html(rombel);
        $('#kelas-x').html(kelas_x);
        $('#kelas-xi').html(kelas_xi);
        $('#kelas-xii').html(kelas_xii);
      }
    } 
  }); 
});

$(document).on('click','.hapusakun', function(e){
  e.preventDefault();
  var id = $(this).attr('id');
  $.ajax({
    url: "{{ url('hapus_akun') }}/" + id,
    method : "GET",
    success:function(data){
      if(data == "sukses"){
        window.location = "{{ url('/kelola_akun') }}";
      }
    }
  });
});

$(document).ready( function() {
  $('#edit-type-wrapper select').change(function() {
     if($(this).val() == "Kurikulum"){
        $('.-').prop('hidden', false);
        $('.-').prop('selected', true);
        $('.mapel_select').prop('hidden', true);
     }else{
        $('.M0001').prop('selected', true);
        $('.-').prop('hidden', true);
        $('.mapel_select').prop('hidden', false);
     }
  });
});
</script>
@endsection