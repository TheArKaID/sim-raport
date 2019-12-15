@extends('layouts/header')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('multiSelect/css/bootstrap4/tail.select-default.css') }}">
<style type="text/css">
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
    color: #272727;
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
<div class="container-fluid" id="kelola_akun_1">
  <div class="row">
    <div class="col-lg-8 col-sm-8" id="title-menu">
      <div class="media">
        <img src="{{ asset('icon/id-card2.png') }}" class="mr-3 rounded" alt="..." style="background-color: #fff; padding: 10px; width: 80px; box-shadow: 3px 3px rgba(0,0,0,.2);">
        <div class="media-body">
          <h5 class="mt-1" style="color: #3e3d3e; font-weight: bold;">Kelola Akun</h5>
          Kelola akun dan hak akses
        </div>
      </div>
      <!-- <p style="font-size: 20px; color: #343334; font-weight: bold;" class="">
      <img src="{{ asset('icon/id-card2.png') }}" class="img-fluid rounded" style="background-color: #fff; padding: 10px; width: 80px; box-shadow: 3px 3px rgba(0,0,0,.2); flex-direction: column; align-items: center; justify-content: center; object-fit: cover;">
      &nbsp;&nbsp;Kelola Akun dan Hak Akses</p> -->
    </div>
    <div class="col-lg-4 mt-3 text-right">
      <a href="#" data-toggle="modal" class="btn" data-target="#saveModal" style="background-color: #b854f5; color: #fff; border-radius: 100px; font-size: 14px;"><i class="fa fa-plus"></i> Tambah Data</a>
    </div>
    <div class="modal fade" id="saveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #7a00e2;">
            <h5 class="modal-title" id="exampleModalLabel" style="color: #fff;">Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModalTambah">
              <span aria-hidden="true" style="color: #fff;">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" id="formSave">
              @csrf
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Kode Guru</label>
                <div class="col-sm-8" id="maksKode">
                  
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Nama</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="name" required="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Role</label>
                <div class="col-sm-8" id="edit-type-wrapper">
                    <select id="inputState" class="form-control" name="role">
                      <option value="Guru">Guru</option>
                      <option value="Kurikulum">Kurikulum</option>
                    </select>
                </div>
              </div>
              <div class="form-group row mapel_select">
                <label class="col-sm-4 col-form-label">Mapel</label>
                <div class="col-sm-8">
                    <select id="inputState" class="form-control" name="mapel">
                      @foreach($mapel as $m)
                      <option value="{{ $m->mapel }}">{{ $m->mapel }}</option>
                      @endforeach
                    </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Username</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="username" required="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Password</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" name="password" required="">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-block" style="background-color: #b854f5; color: #fff; border-radius: 50px;">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 mt-4">
      <div class="form-group">
        <input type="text" class="search form-control col-md-12" name="" placeholder="Cari Disini">
      </div>
    </div>
    <div class="col-lg-12">
      <table class="table table-bordered" id="dataTable">
        <thead class="text-center">
          <tr>
            <th scope="col" style="color: #fff; background-color: #7a00e2;">#</th>
            <th scope="col">Kode Guru</th>
            <th scope="col">Nama</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody id="dataTableIsi">
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="container-fluid" id="">
  <div class="row">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #7a00e2;">
            <h5 class="modal-title" id="exampleModalLabel" style="color: #fff;">Edit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModalEdit">
              <span aria-hidden="true" style="color: #fff;">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" id="formEdit">
              @csrf
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Foto</label>
                <div class="col-sm-8">
                  <input type="file" name="avatarupdate" id="avatarupdate" style="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Nama</label>
                <div class="col-sm-8">
                  <input type="text" name="idEdit" id="idEdit" hidden="">
                  <input type="text" name="kdGuru" id="kdGuru" hidden="">
                  <input type="text" class="form-control" name="nameupdate" id="nameupdate" required="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Role</label>
                <div class="col-sm-8" id="edit-type-wrapper">
                    <select id="inputState" class="form-control" name="roleupdate" id="roleupdate">
                      <option value="Guru" id="Guru">Guru</option>
                      <option value="Kurikulum" id="Kurikulum">Kurikulum</option>
                    </select>
                </div>
              </div>
              <div class="form-group row mapel_select">
                <label class="col-sm-4 col-form-label">Mapel</label>
                <div class="col-sm-8">
                    <select id="inputState" class="form-control" name="mapelupdate" id="mapelupdate">
                      @foreach($mapel as $m)
                        <option value="{{ $m->mapel }}" id="{{ $m->mapel }}">{{ $m->mapel }}</option>
                      @endforeach
                    </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Username</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="usernameupdate" id="usernameupdate" required="">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-block" style="background-color: #b854f5; color: #fff; border-radius: 50px;" id="updateBtn">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="tamabahKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #7a00e2;">
            <h5 class="modal-title" id="exampleModalLabel" style="color: #fff;">Tambah Kelas</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModaltamabahKelas">
              <span aria-hidden="true" style="color: #fff;">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" id="formTambahKelas">
              @csrf
              <div class="form-group row">
                <label class="col-sm-4 col-form-label text-center">Rombel</label>
                <div class="col-sm-8">
                  <select multiple="" id="select1" class="form-control" name="kd_rombel[]">
                    </select>
                </div>
              </div>
              <div class="row">
                <input type="text" name="kd_guru" id="tk_kd_guru" hidden="">
                <input type="text" name="mapel" id="tk_mapel" hidden="">
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-block" style="background-color: #b854f5; color: #fff; border-radius: 50px;">Tambah</button>
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
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="card" style="width: 100%; background-image: url('{{ asset('images/dashboardbg.jpg') }}');">
        <div class="card-body" id="card-body">
          <div class="text-center">
            <img src="" class="img-fluid rounded-circle img-thumbnail mb-3" id="fotouser" style="height: auto; width: 50%;">
          </div>
          <h5 class="card-title text-white mb-4" style="font-weight: bold;" id="editnama"></h5>
            <form>
              <div class="form-group row text-white">
                <div class="col-sm-12">
                  <input type="text" class="form-control-plaintext" style="color: #fff;" readonly="" id="editrole"><hr style="border-color: #fff; margin-top: -5px; margin-bottom: -10px;">
                </div>
              </div>
              <div class="form-group row text-white">
                <div class="col-sm-12">
                  <input type="text" class="form-control-plaintext" style="color: #fff;" readonly="" id="editmapel"><hr style="border-color: #fff; margin-top: -5px;" id="hrmapel">
                </div>
              </div>
            </form>
          <div class="text-center">
            <a href="#" data-toggle="modal" id="editBtn" class="btn" data-target="#editModal" style="background-color: #b854f5; color: #fff; font-size: 14px; font-weight: bold; border-radius: 50px;">Edit Data</a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-left mt-3 mb-4">
          <button class="btn backkelola" style="color: #fff; background-color: #7a00e2; padding-right: 30px; padding-left: 30px; font-weight: bold;">Back</button>
        </div>
      </div>
    </div>
    <div class="col-lg-8 col-md-8" id="kelas_ajar">
      <div class="row">
        <div class="col-sm-12 mb-3">
          <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center" style="color: #7a00e2; font-weight: bold;">
              Kelas Ajar
              <a href="" style="padding: 5px;" data-target="#tamabahKelas" data-toggle="modal" id="tamabahKelasBtn"><span class="badge badge-primary badge-pill"><b>+</b></span></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="tabContainer">
            <div class="buttonContainer">
              <button onclick="showPanel(0, '#7a00e2')" id="panel1Btn">Kelas X</button>
              <button onclick="showPanel(1, '#7a00e2')">Kelas XI</button>
              <button onclick="showPanel(2, '#7a00e2')" id="panel2Btn">Kelas XII</button>
            </div>
            <div class="tabPanel">
              <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                  <ul class="list-group"id="kelas-x" style="font-size: 14px;">
                  </ul>
                </div>
                <div class="col-sm-2"></div>
              </div>
            </div>
            <div class="tabPanel">
              <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                  <ul class="list-group" id="kelas-xi" style="font-size: 14px;">
                  </ul>
                </div>
                <div class="col-sm-2"></div>
              </div>
            </div>
            <div class="tabPanel">
              <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                  <ul class="list-group" id="kelas-xii" style="font-size: 14px;">
                  </ul>
                </div>
                <div class="col-sm-2"></div>
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
<script type="text/javascript" src="{{ asset('multiSelect/js/tail.select-full.min.js') }}"></script>
<script type="text/javascript">
// tail.select('#select1', {
//   search: true
// });

var tabButtons = document.querySelectorAll(".tabContainer .buttonContainer button");
var tabPanels = document.querySelectorAll(".tabContainer .tabPanel");
function showPanel(panelIndex, colorCode){
  tabButtons.forEach(function(node){
    node.style.backgroundColor="";
    node.style.color = "";
  });
  tabButtons[panelIndex].style.backgroundColor=colorCode;
  tabButtons[panelIndex].style.color="white";
  tabPanels.forEach(function(node){
    node.style.display="none";
  });
  tabPanels[panelIndex].style.display="block";
  tabPanels[panelIndex].style.backgroundColor=colorCode;
}

$(document).ready(function(){
  $('.search').on('keyup', function(){
    var searchTerm = $(this).val().toLowerCase();
    $("#dataTable tbody tr").each(function(){
      var lineStr = $(this).text().toLowerCase();
      if(lineStr.indexOf(searchTerm) == -1){
        $(this).hide();
      }else{
        $(this).show();
      }
    });
  });
});

function loadModal(){
  $.ajax({
    url: "{{ url('maksKode') }}",
    success:function(data){
      $('#maksKode').html(data);
    }
  });
}

function loadDataTable(){
  $.ajax({
    url: "{{ url('dataTableAkun') }}",
    success:function(data){
      $('#dataTableIsi').html(data);
    }
  });
}

loadModal();
loadDataTable();

$(document).on('click', '#tamabahKelasBtn', function(){
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
        for(var i = 0; i<response.tingkat1.length; i++){
          kelas_x = kelas_x + '<li id="kelasfield" class="list-group-item d-flex justify-content-between align-items-center">'+response.tingkat1[i].rombel+'<a href="#" id="'+response.tingkat1[i].id+'" class="hapuskelas"><span class="badge badge-primary badge-pill">x</span></a></li>';
        }
        for(var i = 0; i<response.tingkat2.length; i++){
          kelas_xi = kelas_xi + '<li id="kelasfield" class="list-group-item d-flex justify-content-between align-items-center">'+response.tingkat2[i].rombel+'<a href="#" id="'+response.tingkat2[i].id+'" class="hapuskelas"><span class="badge badge-primary badge-pill">x</span></a></li>';
        }
        for(var i = 0; i<response.tingkat3.length; i++){
          kelas_xii = kelas_xii + '<li id="kelasfield" class="list-group-item d-flex justify-content-between align-items-center">'+response.tingkat3[i].rombel+'<a href="#" id="'+response.tingkat3[i].id+'" class="hapuskelas"><span class="badge badge-primary badge-pill">x</span></a></li>';
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
      if(data == "sukses"){
        $('#formSave')[0].reset();
        $('#closeModalTambah').click();
        loadDataTable();
        loadModal();
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
      if(response != ""){
        if(response.avatar == null){
          $('#fotouser').attr('src', "{{ asset('picture/user.png') }}");
        }else{
          $('#fotouser').attr('src', "{{ asset('picture') }}/" + response.avatar);
        }
        if(response.role == "Kurikulum"){
          $('#kelas_ajar').prop('hidden', true);
          $('#editmapel').prop('hidden', true);
          $('#hrmapel').prop('hidden', true);
          $('#Kurikulum').prop('selected', true);
          $('#Guru').prop('selected', false);
        }else{
          $('#kelas_ajar').prop('hidden', false);
          $('#editmapel').prop('hidden', false);
          $('#hrmapel').prop('hidden', false);
          $('#Kurikulum').prop('selected', false);
          $('#Guru').prop('selected', true);
        }
        $('#tk_mapel').val(response.mapel);
        $('#tk_kd_guru').val(response.kd_guru);
        $('#idEdit').val(response.id);
        $('#kdGuru').val(response.kd_guru);
        $('#nameupdate').val(response.name);
        $('#usernameupdate').val(response.email);
        $('#editnama').html(response.name);
        $('#editrole').val(response.role);
        $('#editmapel').val(response.mapel);
        $('#kelola_akun_1').prop('hidden', true);
        $('#kelola_akun_2').prop('hidden', false);
        $('#closeModalEdit').click();
        loadDataTable();
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
          $('#kelas_ajar').prop('hidden', true);
          $('#editmapel').prop('hidden', true);
          $('#hrmapel').prop('hidden', true);
          $('#Kurikulum').prop('selected', true);
          $('#Guru').prop('selected', false);
        }else{
          $('#kelas_ajar').prop('hidden', false);
          $('#editmapel').prop('hidden', false);
          $('#hrmapel').prop('hidden', false);
          $('#Kurikulum').prop('selected', false);
          $('#Guru').prop('selected', true);
        }
        $('#tk_mapel').val(response.user.mapel);
        $('#tk_kd_guru').val(response.user.kd_guru);
        $('#panel1Btn').click();
        $('#idEdit').val(response.user.id);
        $('#kdGuru').val(response.user.kd_guru);
        $('#nameupdate').val(response.user.name);
        $('#usernameupdate').val(response.user.email);
        $('#editnama').html(response.user.name);
        $('#editrole').val(response.user.role);
        $('#editmapel').val(response.user.mapel);
        $('#'+response.user.mapel+'').prop('selected', true);
        $('#kelola_akun_1').prop('hidden', true);
        $('#kelola_akun_2').prop('hidden', false);
        var kelas_x = "";
        var kelas_xi = "";
        var kelas_xii = "";
        var rombel = "";
        for(var i = 0; i<response.tingkat1.length; i++){
          kelas_x = kelas_x + '<li id="kelasfield" class="list-group-item d-flex justify-content-between align-items-center">'+response.tingkat1[i].rombel+'<a href="#" id="'+response.tingkat1[i].id+'" class="hapuskelas"><span class="badge badge-primary badge-pill">x</span></a></li>';
        }
        for(var i = 0; i<response.tingkat2.length; i++){
          kelas_xi = kelas_xi + '<li id="kelasfield" class="list-group-item d-flex justify-content-between align-items-center">'+response.tingkat2[i].rombel+'<a href="#" id="'+response.tingkat2[i].id+'" class="hapuskelas"><span class="badge badge-primary badge-pill">x</span></a></li>';
        }
        for(var i = 0; i<response.tingkat3.length; i++){
          kelas_xii = kelas_xii + '<li id="kelasfield" class="list-group-item d-flex justify-content-between align-items-center">'+response.tingkat3[i].rombel+'<a href="#" id="'+response.tingkat3[i].id+'" class="hapuskelas"><span class="badge badge-primary badge-pill">x</span></a></li>';
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
          kelas_x = kelas_x + '<li id="kelasfield" class="list-group-item d-flex justify-content-between align-items-center">'+response.tingkat1[i].rombel+'<a href="#" id="'+response.tingkat1[i].id+'" class="hapuskelas"><span class="badge badge-primary badge-pill">x</span></a></li>';
        }
        for(var i = 0; i<response.tingkat2.length; i++){
          kelas_xi = kelas_xi + '<li id="kelasfield" class="list-group-item d-flex justify-content-between align-items-center">'+response.tingkat2[i].rombel+'<a href="#" id="'+response.tingkat2[i].id+'" class="hapuskelas"><span class="badge badge-primary badge-pill">x</span></a></li>';
        }
        for(var i = 0; i<response.tingkat3.length; i++){
          kelas_xii = kelas_xii + '<li id="kelasfield" class="list-group-item d-flex justify-content-between align-items-center">'+response.tingkat3[i].rombel+'<a href="#" id="'+response.tingkat3[i].id+'" class="hapuskelas"><span class="badge badge-primary badge-pill">x</span></a></li>';
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

$(document).on('click', '.backkelola', function(){
  $('#kelola_akun_1').prop('hidden', false);
  $('#kelola_akun_2').prop('hidden', true);
});

$(document).on('click','.hapusakun', function(e){
  e.preventDefault();
  var id = $(this).attr('id');
  $.ajax({
    url: "{{ url('hapus_akun') }}/" + id,
    method : "GET",
    success:function(data){
      if(data == "sukses"){
        loadDataTable();
      }
    }
  });
});

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