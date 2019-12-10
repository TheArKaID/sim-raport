@extends('layouts/header')
@section('nav')
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
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
    <div class="col-lg-12 mb-4"><a href="{{ url('/detail_nilai/'.$kd_rombel.'/'.auth()->user()->mapel) }}" class="btn btn-success">Kembali</a></div>
  </div>
  <div class="row">
    <div class="col-lg-12 mb-4">
      <div class="card bg-success text-white shadow" id="card-welcome">
        <div class="card-body text-center">
          <h3>
            @foreach($identitas as $i)
              {{ $i->nis . ' - ' . $i->nama }}
            @endforeach
          </h3>
        </div>
      </div>
    </div>
  </div>
  <!-- <div class="row">
    <div class="modal fade" id="editContent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" id="editClose" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ url('/simpan_akun') }}">
              @csrf
              <div class="form-group row">
                <div class="col-sm-8">
                  <input type="text" hidden="" class="form-control" name="" id="nama">
                  <input type="text" hidden="" class="form-control" name="" id="nis">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 offset-sm-1 col-form-label">UH 1</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" disabled="" id="nilai1" name="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 offset-sm-1 col-form-label">UH 2</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" disabled="" id="nilai2" name="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 offset-sm-1 col-form-label">UTS GANJIL</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" disabled="" id="nilai3" name="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 offset-sm-1 col-form-label">UH 3</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" disabled="" id="nilai4" name="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 offset-sm-1 col-form-label">UH 4</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" disabled="" id="nilai5" name="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 offset-sm-1 col-form-label">UAS GANJIL</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" disabled="" id="nilai6" name="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 offset-sm-1 col-form-label">UH 5</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" disabled="" id="nilai7" name="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 offset-sm-1 col-form-label">UH 6</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" disabled="" id="nilai8" name="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 offset-sm-1 col-form-label">UTS GENAP</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" disabled="" id="nilai9" name="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 offset-sm-1 col-form-label">UH 7</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" disabled="" id="nilai10" name="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 offset-sm-1 col-form-label">UH 8</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" disabled="" id="nilai11" name="">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 offset-sm-1 col-form-label">UKK GENAP</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" disabled="" id="nilai12" name="">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-success btn-block" id="editBtn">Edit</button>
                <button type="submit" class="btn btn-primary btn-block" id="updateBtn">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <div class="row">
    <div class="col-lg-12 mb-4">
      <table class="table table-bordered" id="myTable">
        <thead class="text-center">
          <tr>
            <th scope="col" class="bg-success" style="color: #fff;">#</th>
            <th scope="col">UH 1</th>
            <th scope="col">UH 2</th>
            <th scope="col">UTS GANJIL</th>
            <th scope="col">UH 3</th>
            <th scope="col">UH 4</th>
            <th scope="col">UAS</th>
            <th scope="col">UH 5</th>
            <th scope="col">UH 6</th>
            <th scope="col">UTS GENAP</th>
            <th scope="col">UH 7</th>
            <th scope="col">UH 8</th>
            <th scope="col">UKK</th>
            <th scope="col">Opsi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($daftar_nilai as $nilai)
          <tr class="text-center" id="table-nilai">
            <th scope=""></th>
            @if($nilai->uh1 >= $kkm)<td>{{ $nilai->uh1 }}</td>
            @else<td style="background-color: red; color: #fff;">{{ $nilai->uh1 }}</td>@endif
            @if($nilai->uh2 >= $kkm)<td>{{ $nilai->uh2 }}</td>
            @else<td style="background-color: red; color: #fff;">{{ $nilai->uh2 }}</td>@endif
            @if($nilai->uts1 >= $kkm)<td>{{ $nilai->uts1 }}</td>
            @else<td style="background-color: red; color: #fff;">{{ $nilai->uts1 }}</td>@endif
            @if($nilai->uh3 >= $kkm)<td>{{ $nilai->uh3 }}</td>
            @else<td style="background-color: red; color: #fff;">{{ $nilai->uh3 }}</td>@endif
            @if($nilai->uh4 >= $kkm)<td>{{ $nilai->uh4 }}</td>
            @else<td style="background-color: red; color: #fff;">{{ $nilai->uh4 }}</td>@endif
            @if($nilai->uas >= $kkm)<td>{{ $nilai->uas }}</td>
            @else<td style="background-color: red; color: #fff;">{{ $nilai->uas }}</td>@endif
            @if($nilai->uh5 >= $kkm)<td>{{ $nilai->uh5 }}</td>
            @else<td style="background-color: red; color: #fff;">{{ $nilai->uh5 }}</td>@endif
            @if($nilai->uh6 >= $kkm)<td>{{ $nilai->uh6 }}</td>
            @else<td style="background-color: red; color: #fff;">{{ $nilai->uh6 }}</td>@endif
            @if($nilai->uts2 >= $kkm)<td>{{ $nilai->uts2 }}</td>
            @else<td style="background-color: red; color: #fff;">{{ $nilai->uts2 }}</td>@endif
            @if($nilai->uh7 >= $kkm)<td>{{ $nilai->uh7 }}</td>
            @else<td style="background-color: red; color: #fff;">{{ $nilai->uh7 }}</td>@endif
            @if($nilai->uh8 >= $kkm)<td>{{ $nilai->uh8 }}</td>
            @else<td style="background-color: red; color: #fff;">{{ $nilai->uh8 }}</td>@endif
            @if($nilai->ukk >= $kkm)<td>{{ $nilai->ukk }}</td>
            @else<td style="background-color: red; color: #fff;">{{ $nilai->ukk }}</td>@endif
            <td class="text-center">
              <a href="#" id="editBtn" class="btn btn-primary">Ubah Nilai</a>
            </td>
          </tr>
          @endforeach
        </tbody>
        <tr class="text-center" id="edit-nilai" hidden="">
          @if($cek_isi > 0)
          @foreach($daftar_nilai as $n)
            <form method="POST" action="{{ url('/update_nilai/'.$nis.'/'.$kd_rombel.'/'.$mapel.'/'.$kkm) }}">
              @csrf
              <td></td>
              <td><input type="input" style="width: 50px;" name="uh1" id="uh1" value="{{ $n->uh1 }}"></td>
              <td><input type="input" style="width: 50px;" name="uh2" id="uh2" value="{{ $n->uh2 }}"></td>
              <td><input type="input" style="width: 50px;" name="uts1" id="uts1" value="{{ $n->uts1 }}"></td>
              <td><input type="input" style="width: 50px;" name="uh3" id="uh3" value="{{ $n->uh3 }}"></td>
              <td><input type="input" style="width: 50px;" name="uh4" id="uh4" value="{{ $n->uh4 }}"></td>
              <td><input type="input" style="width: 50px;" name="uas" id="uas" value="{{ $n->uas }}"></td>
              <td><input type="input" style="width: 50px;" name="uh5" id="uh5" value="{{ $n->uh5 }}"></td>
              <td><input type="input" style="width: 50px;" name="uh6" id="uh6" value="{{ $n->uh6 }}"></td>
              <td><input type="input" style="width: 50px;" name="uts2" id="uts2" value="{{ $n->uts2 }}"></td>
              <td><input type="input" style="width: 50px;" name="uh7" id="uh7" value="{{ $n->uh7 }}"></td>
              <td><input type="input" style="width: 50px;" name="uh8" id="uh8" value="{{ $n->uh8 }}"></td>
              <td><input type="input" style="width: 50px;" name="ukk" id="ukk" value="{{ $n->ukk }}"></td>
              <td><button id="updateBtn" class="btn btn-primary" type="submit">Update</button></td>
            </form>
            @endforeach
          </tr>
          @else
          <tr class="text-center" id="edit-nilai">
            <form method="POST" action="{{ url('/input_nilai/'.$nis.'/'.$kd_rombel.'/'.$mapel.'/'.$kkm) }}">
              @csrf
              <td></td>
              <td><input type="input" style="width: 50px;" name="uh1"></td>
              <td><input type="input" style="width: 50px;" name="uh2"></td>
              <td><input type="input" style="width: 50px;" name="uts1"></td>
              <td><input type="input" style="width: 50px;" name="uh3"></td>
              <td><input type="input" style="width: 50px;" name="uh4"></td>
              <td><input type="input" style="width: 50px;" name="uas"></td>
              <td><input type="input" style="width: 50px;" name="uh5"></td>
              <td><input type="input" style="width: 50px;" name="uh6"></td>
              <td><input type="input" style="width: 50px;" name="uts2"></td>
              <td><input type="input" style="width: 50px;" name="uh7"></td>
              <td><input type="input" style="width: 50px;" name="uh8"></td>
              <td><input type="input" style="width: 50px;" name="ukk"></td>
              <td><button id="updateBtn" class="btn btn-primary">Insert</button></td>
            </form>
          </tr>
          @endif
      </table>
    </div>
  </div>
@endsection
@section('script')
<script type="text/javascript">
  $

  $(".table").on('click', '#editBtn', function(e){
      $("#table-nilai").prop("hidden", true);
      $("#edit-nilai").prop("hidden", false);
  });

  $("#updateBtn").click(function(){
      $("#table-nilai").prop("hidden", false);
      $("#edit-nilai").prop("hidden", true);
  });

</script>
@endsection