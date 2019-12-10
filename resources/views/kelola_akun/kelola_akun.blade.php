@extends('layouts/header')
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
    <div class="col-lg-12 mb-4">
      <div class="card text-white shadow" id="card-welcome" style="background-image: url('{{ asset('images/dashboardbg.jpg') }}');">
        <div class="card-body text-left ml-4">
          <p style="font-size: 20px;">Kelola Akun dan Hak Akses</p>
        </div>
      </div>
    </div>
    <div class="col-lg-12 mb-4 text-right">
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
                  <input type="text" class="form-control" name="name">
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
                  <input type="text" class="form-control" name="username">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Password</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" name="password">
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
    <div class="col-md-12">
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
<div class="" id="kelola_akun_2" hidden="">
  <div class="row">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #7a00e2;">
            <h5 class="modal-title" id="exampleModalLabel" style="color: #fff;">Edit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModalTambah">
              <span aria-hidden="true" style="color: #fff;">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" id="formEdit">
              @csrf
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Foto</label>
                <input type="file" name="avatarupdate" id="avatarupdate">
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Nama</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="nameupdate" id="nameupdate">
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
                    <select id="inputState" class="form-control" name="mapelupdate" id="roleupdate">
                      @foreach($mapel as $m)
                      <option value="{{ $m->mapel }}">{{ $m->mapel }}</option>
                      @endforeach
                    </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label">Username</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="usernameupdate" id="usernameupdate">
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
    <div class="col-lg-3 ml-4 mt-2">
      <div class="card" style="width: 18rem; background-image: url('{{ asset('images/dashboardbg.jpg') }}');">
        <div class="card-body">
          <div class="text-center">
            <img src="" class="img-fluid rounded-circle img-thumbnail w-50 mb-3" id="fotouser" style="height: 120px;">
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
        <div class="col-md-12 text-left mt-3">
          <button class="btn backkelola" style="color: #fff; background-color: #7a00e2; padding-right: 30px; padding-left: 30px; font-weight: bold;">Back</button>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 ml-4 mt-2" id="kelas_ajar">
      <div class="card" style="width: 18rem;">
        <div class="card-body">
            <div class="d-flex flex-row" style="margin-bottom: -10px;">
              <div>
                <p style="color: #7a00e2; font-weight: bold;">Kelas Ajar</p>
              </div>
              <div style="padding-left: 100px;">
                <button class="btn" style="background-color: #b854f5; color: #fff; font-size: 12px; font-weight: bold; border-radius: 50px;">Tambah</button>
              </div>
            </div><hr style="border-color: #7a00e2;">
            <div class="d-flex flex-row mb-1" style="margin-bottom: -10px;">
              <div>
                <p style="color: #272727; font-weight: bold;">Kelas X</p>
              </div>
              <div style="padding-left: 144px;" class="text-center">
                <a class="btn" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" style="font-size: 10px; font-weight: bold; border-radius: 5px; background-color: #7a00e2; color: #fff;">&#86;</a>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample1">
                  <div class="card card-body">
                    <table cellpadding="5">
                      <tr>
                        <td>RPL X-1</td>
                        <td><a href="" class="btn" style="background-color: #7a00e2; color: #fff; border-radius: 150px; font-weight: bold; font-size: 10px;">X</a></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-flex flex-row mt-2 mb-1" style="margin-bottom: -10px;">
              <div>
                <p style="color: #272727; font-weight: bold;">Kelas XI</p>
              </div>
              <div style="padding-left: 140px;" class="text-center">
                <a class="btn" data-toggle="collapse" href="#multiCollapseExample2" role="button" aria-expanded="false" aria-controls="multiCollapseExample2" style="font-size: 10px; font-weight: bold; border-radius: 5px; background-color: #7a00e2; color: #fff;">&#86;</a>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample2">
                  <div class="card card-body">
                    <table cellpadding="5">
                      <tr>
                        <td>RPL XI-1</td>
                        <td><a href="" class="btn" style="background-color: #7a00e2; color: #fff; border-radius: 150px; font-weight: bold; font-size: 10px;">X</a></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-flex flex-row mt-2 mb-1" style="margin-bottom: -10px;">
              <div>
                <p style="color: #272727; font-weight: bold;">Kelas XII</p>
              </div>
              <div style="padding-left: 136px;" class="text-center">
                <a class="btn" data-toggle="collapse" href="#multiCollapseExample3" role="button" aria-expanded="false" aria-controls="multiCollapseExample3" style="font-size: 10px; font-weight: bold; border-radius: 5px; background-color: #7a00e2; color: #fff;">&#86;</a>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample3">
                  <div class="card card-body">
                    <table cellpadding="5">
                      <tr>
                        <td>RPL XII-1</td>
                        <td><a href="" class="btn" style="background-color: #7a00e2; color: #fff; border-radius: 150px; font-weight: bold; font-size: 10px;">X</a></td>
                      </tr>
                    </table>
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
<script type="text/javascript">
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
  })
}

function loadDataTable(){
  $.ajax({
    url: "{{ url('dataTableAkun') }}",
    success:function(data){
      $('#dataTableIsi').html(data);
    }
  })
}

loadModal();
loadDataTable();

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

$(document).on('click', '.detailakun', function(e){
  e.preventDefault();
  var id = $(this).attr('id');
  $.ajax({
    url: "{{ url('detail_akun') }}/" + id,
    method: "GET",
    success:function(response){
      if(response != "")
      {
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
        $('#nameupdate').val(response.name);
        $('#usernameupdate').val(response.email);
        $('#editnama').html(response.name);
        $('#editrole').val(response.role);
        $('#editmapel').val(response.mapel);
        $('#kelola_akun_1').prop('hidden', true);
        $('#kelola_akun_2').prop('hidden', false);
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