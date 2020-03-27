@extends('layouts/header')
@section('css')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
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
  <li class="nav-item active">
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
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8" id="title-menu">
	      <div class="media">
	        <img src="{{ asset('icon/student1.png') }}" class="mr-3 rounded" alt="..." style="background-color: #fff; padding: 10px; width: 60px; box-shadow: 3px 3px rgba(0,0,0,.2);">
	        <div class="media-body">
	          <h5 class="mt-1" style="color: #3e3d3e; font-weight: bold;">Kelola Siswa</h5>
	          Kelola data siswa sekolah
	        </div>
	      </div>
	    </div>
	    <div class="col-lg-4 col-md-4 col-sm-4 mt-4 text-right">
	      <button class="btn btn-sm shadow-sm" style="color: #fff; background-color: #7a00e2;" data-toggle="modal" data-target="#importModal"><i class="fas fa-file-import fa-sm text-white-50"></i> Import Data</button>
	      <button class="btn btn-sm shadow-sm" style="color: #fff; background-color: #b854f5;" data-toggle="modal" data-target="#addModal"><i class="fas fa fa-plus fa-sm text-white-50"></i> Tambah Data</button>
	    </div>
	</div>
	<div class="row">
		<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
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
			                <img src="{{ asset('intruksi_gambar/intruksi.jpg') }}" class="img-fluid w-100">
			                <h5 class="mt-3 mb-1" style="color: #7a00e2;">Import Siswa</h5>
			                <p>Pastikan format dan penempatan sesuai dengan gambar diatas</p>
			              </div>
			            </div>
			            <div class="row">
			              <div class="col-lg-12 col-md-12 col-sm-12">
			                <div class="text-center" id="same_username">
			                </div>
			              </div>
			          </div>
			          <div class="row">
			          	<div class="col-lg-12 col-md-12 col-sm-12">
			          	  <form method="POST" action="{{ url('/import_siswa') }}" enctype="multipart/form-data">
			          	  	@csrf
				          	  <div class="form-group row">
			                    <div class="col-sm-12">
			                      <div class="custom-file">
									<input type="file" class="custom-file-input" id="customFile" name="file" required="">
									<label class="custom-file-label" for="customFile">Pilih Excel</label>
								  </div>
			                    </div>
			                  </div>
			                  <div class="form-group row">
			                    <div class="col-sm-12">
			                      <button type="submit" class="btn btn-block" style="color: #fff; background-color: #b854f5;">Import</button>
			                    </div>
			                  </div>
		                  </form>
			          	</div>
			          </div>
				  </div>
			  </div>
		  </div>
	  </div>
	  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
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
			                <img src="{{ asset('icon/undraw_wall_post_83ul.svg') }}" class="img-fluid w-50">
			                <h5 class="mt-3 mb-1" style="color: #7a00e2;">Edit Siswa</h5>
			                <p>Edit data siswa</p>
			              </div>
			            </div>
			            <div class="row">
			              <div class="col-lg-12 col-md-12 col-sm-12">
			                <div class="text-center" id="same_username">
			                </div>
			              </div>
			          </div>
			          <div class="row">
			          	<div class="col-lg-12 col-md-12 col-sm-12">
			          	  <form method="POST" id="update_modal">
			          	  	@csrf
				          	  <div class="form-group row">
			                    <label for="edit_nis" class="col-sm-2 col-form-label text-right">NIS</label>
			                    <div class="col-sm-10">
			                      <input type="text" id="edit_id" hidden="">
			                      <input name="nis" type="number" class="form-control" id="edit_nis" autocomplete="off" required>
			                    </div>
			                  </div>
			                  <div class="form-group row">
			                    <label for="edit_nama" class="col-sm-2 col-form-label text-right">Nama</label>
			                    <div class="col-sm-10">
			                      <input name="nama" type="text" class="form-control" id="edit_nama" autocomplete="off" required>
			                    </div>
			                  </div>
			                  <div class="form-group row">
			                    <label for="edit_jk" class="col-sm-2 col-form-label text-right">JK</label>
			                    <div class="col-sm-10">
			                      <select id="edit_jk" class="form-control" name="jk" required>
			                      	<option value="">-- Pilih Jenis Kelamin --</option>
			                      	<option class="jk-l" value="L">Laki - Laki</option>
			                      	<option class="jk-p" value="P">Perempuan</option>
			                      </select>
			                    </div>
			                  </div>
			                  <div class="form-group row">
			                    <label for="edit_rombel" class="col-sm-2 col-form-label text-right">Rombel</label>
			                    <div class="col-sm-10">
			                      <select id="edit_rombel" class="form-control" name="rombel" required="">
			                      	<option value="">-- Pilih Rombel --</option>
			                      	@foreach($rombels as $rombel)
			                      	<option value="{{ $rombel->rombel }}">{{ $rombel->rombel }}</option>
			                      	@endforeach
			                      </select>
			                    </div>
			                  </div>
			                  <div class="form-group row">
			                    <label for="edit_rayon" class="col-sm-2 col-form-label text-right">Rayon</label>
			                    <div class="col-sm-10">
			                      <select id="edit_rayon" class="form-control" name="rayon" required="">
			                      	<option value="">-- Pilih Rayon --</option>
			                      	@foreach($rayons as $rayon)
			                      	<option value="{{ $rayon->singkatan_rayon }}">{{ $rayon->rayon }}</option>
			                      	@endforeach
			                      </select>
			                    </div>
			                  </div>
			                  <div class="form-group row">
			                    <div class="col-sm-12">
			                      <button type="submit" class="btn btn-block" style="color: #fff; background-color: #b854f5;">Ubah Siswa</button>
			                    </div>
			                  </div>
		                  </form>
			          	</div>
			          </div>
				  </div>
			  </div>
		  </div>
	  </div>
	  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
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
			                <img src="{{ asset('icon/undraw_exams_g4ow.svg') }}" class="img-fluid w-50">
			                <h5 class="mt-3 mb-1" style="color: #7a00e2;">Tambah Siswa</h5>
			                <p>Tambah data siswa</p>
			              </div>
			            </div>
			            <div class="row">
			              <div class="col-lg-12 col-md-12 col-sm-12">
			                <div class="text-center" id="same_nis">
			                </div>
			              </div>
			          </div>
			          <div class="row">
			          	<div class="col-lg-12 col-md-12 col-sm-12">
			          	  <form method="POST" action="{{ url('/tambah_siswa') }}">
			          	  	@csrf
				          	  <div class="form-group row">
			                    <label for="nis" class="col-sm-2 col-form-label text-right">NIS</label>
			                    <div class="col-sm-10">
			                      <input name="nis" type="number" class="form-control" id="nis" autocomplete="off" required>
			                    </div>
			                  </div>
			                  <div class="form-group row">
			                    <label for="nama" class="col-sm-2 col-form-label text-right">Nama</label>
			                    <div class="col-sm-10">
			                      <input name="nama" type="text" class="form-control" id="nama" autocomplete="off" required>
			                    </div>
			                  </div>
			                  <div class="form-group row">
			                    <label for="jk" class="col-sm-2 col-form-label text-right">JK</label>
			                    <div class="col-sm-10">
			                      <select id="jk" class="form-control" name="jk" required>
			                      	<option value="">-- Pilih Jenis Kelamin --</option>
			                      	<option value="L">Laki - Laki</option>
			                      	<option value="P">Perempuan</option>
			                      </select>
			                    </div>
			                  </div>
			                  <div class="form-group row">
			                    <label for="rombel" class="col-sm-2 col-form-label text-right">Rombel</label>
			                    <div class="col-sm-10">
			                      <select id="rombel" class="form-control" name="rombel" required="">
			                      	<option value="">-- Pilih Rombel --</option>
			                      	@foreach($rombels as $rombel)
			                      	<option value="{{ $rombel->rombel }}">{{ $rombel->rombel }}</option>
			                      	@endforeach
			                      </select>
			                    </div>
			                  </div>
			                  <div class="form-group row">
			                    <label for="rayon" class="col-sm-2 col-form-label text-right">Rayon</label>
			                    <div class="col-sm-10">
			                      <select id="rayon" class="form-control" name="rayon" required="">
			                      	<option value="">-- Pilih Rayon --</option>
			                      	@foreach($rayons as $rayon)
			                      	<option value="{{ $rayon->singkatan_rayon }}">{{ $rayon->rayon }}</option>
			                      	@endforeach
			                      </select>
			                    </div>
			                  </div>
			                  <div class="form-group row">
			                    <div class="col-sm-12">
			                      <button type="submit" class="btn btn-block" style="color: #fff; background-color: #b854f5;">Tambah Siswa</button>
			                    </div>
			                  </div>
		                  </form>
			          	</div>
			          </div>
				  </div>
			  </div>
		  </div>
	  </div>
	</div>
	<div class="row mt-4">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="card shadow">
				<div class="card-header py-3">
	              <h6 class="m-0 font-weight-bold text-primary">Daftar Siswa</h6>
	            </div>
				<div class="card-body">
					<div class="table-responsive">
				      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				        <thead class="text-center">
				          <tr>
				            <th>No</th>
				            <th>NIS</th>
				            <th>Nama</th>
				            <th>JK</th>
				            <th>Rombel</th>
				            <th>Rayon</th>
				            <th>Aksi</th>
				          </tr>
				        </thead>
				        <tbody>
				        	@foreach($siswas as $siswa)
				        	<tr>
				        		<td>{{ $loop->iteration }}</td>
				        		<td>{{ $siswa->nis }}</td>
				        		<td>{{ $siswa->nama }}</td>
				        		<td>{{ $siswa->jk }}</td>
				        		<td>{{ $siswa->rombel }}</td>
				        		<td>{{ $siswa->rayon }}</td>
				        		<td>
									<button class="btn edit-siswa btn-icon-split" style="background-color: #b854f5; color: #fff;" data-toggle="modal" data-target="#editModal" data-edit="{{ $siswa->id }}">
										<span class="icon text-white-50">
											<i class="fas fa-edit"></i>
										</span>
										<span class="text">Edit</span>
									</button>
									<button class="btn hapus-siswa btn-icon-split" style="background-color: #5700e2; color: #fff;" data-hapus="{{ $siswa->id }}">
										<span class="icon text-white-50">
											<i class="fas fa-trash"></i>
										</span>
										<span class="text">Hapus</span>
									</button>
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
@endsection
@section('script')
<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
<script type="text/javascript">
$('#update_modal').submit(function(e){
	e.preventDefault();
	var id = $('#edit_id').val();
	var request = new FormData(this);
	$.ajax({
	  url: "{{ url('/update_siswa') }}/" + id,
	  method: "POST",
	  data: request,
	  contentType: false,
	  cache: false,
	  processData: false,
	  success:function(data) {
	  	window.location = "{{ url('/kelola_siswa') }}";
      }
	});
});

$(document).on('click', '.hapus-siswa', function(e) {
	e.preventDefault();
	var id = $(this).attr('data-hapus');
	$.ajax({
		method: "GET",
		url: "{{ url('/hapus_siswa') }}/" + id,
		success:function(data) 
		{
			window.location = "{{ url('/kelola_siswa') }}";
		}
	});
});

$(document).on('click', '.edit-siswa', function(e) {
	e.preventDefault();
	var id = $(this).attr('data-edit');
	$.ajax({
		method: "GET",
		url: "{{ url('/edit_siswa') }}/" + id,
		success:function(response)
		{
			$('#edit_id').val(response.data_siswa.id);
			$('#edit_nis').val(response.data_siswa.nis);
			$('#edit_nama').val(response.data_siswa.nama);
			if(response.data_siswa.jk == 'L'){
				$('.jk-l').prop('selected', true);
				$('.jk-p').prop('selected', false);
			}else if(response.data_siswa.jk == 'P'){
				$('.jk-p').prop('selected', true);
				$('.jk-l').prop('selected', false);
			}
			$('#edit_rombel').append('<option value="'+response.data_siswa.rombel+'" selected>'+response.data_siswa.rombel+'</option>');
			$('#edit_rayon').append('<option value="'+response.data_siswa.rayon+'" selected>'+response.data_siswa.rayon_lengkap+'</option>');
		}
	});
});

@if ($message = Session::get('import'))
Swal.fire({
  icon: 'success',
  text: '{{ $message }}',
  showConfirmButton: false,
  timer: 1200
})
@endif

@if ($message = Session::get('save'))
Swal.fire({
  icon: 'success',
  text: '{{ $message }}',
  showConfirmButton: false,
  timer: 1200
})
@endif

@if ($message = Session::get('update'))
Swal.fire({
  icon: 'success',
  text: '{{ $message }}',
  showConfirmButton: false,
  timer: 1200
})
@endif

@if ($message = Session::get('delete'))
Swal.fire({
  icon: 'success',
  text: '{{ $message }}',
  showConfirmButton: false,
  timer: 1200
})
@endif
</script>
@endsection