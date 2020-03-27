<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SIM RAPORT</title>
  <link rel="shortcut icon" href="{{ asset('icon/icon-1.png') }}">
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('font/nunito.css') }}" rel="stylesheet">
  @yield('css')
</head>
<body id="page-top">
  <div id="wrapper">
    @yield('nav')
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            @if(session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('status') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="font-weight: bold;">{{auth()->user()->name}}</span>
                <img class="img-profile rounded-circle" src="{{auth()->user()->getAvatar()}}">
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#updateModal" style="color: #b854f5;">
                  <i class="fas fa-key fa-sm fa-fw mr-2"></i>
                  Ubah Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal" style="color: #b854f5;">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        @yield('isi')
    </div>
  </div>
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin Untuk Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Klik 'Logout' untuk keluar</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn" style="color: #fff; background-color: #7a00e2;" href="{{ url('/logout') }}">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <!-- <div class="modal-header" style="background-color: #7a00e2; color: #fff;">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: #fff;">×</span>
          </button>
        </div> -->
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12 col-sm-12 mb-3">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="changepassBtn">
                <span aria-hidden="true" style="color: #aaa;">&times;</span>
              </button>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-sm-12 mb-2" align="center">
              <img src="{{ asset('icon/undraw_my_password_d6kg.svg') }}" class="img-fluid w-50">
              <h5 class="mt-3 mb-1" style="color: #7a00e2;">Ubah Password</h5>
              <p>Kuatkan pengamanan anda</p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-sm-12" id="old_pass_false">
            </div>
          </div>
          <form method="POST" id="changepassForm">
          @csrf
          <div class="form-group row">
            <div class="col-sm-12">
              <input type="password" placeholder="Password Lama" class="form-control" name="old_password" id="old_pass_val" required="">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12">
              <input type="password" placeholder="Password Baru" class="form-control" name="new_password" id="new_pass_val" required="">
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-block" type="submit" style="background-color: #b854f5; color: #fff; border-radius: 5px;">Ubah</button>
          </div>
          </form>
        </div>
      </div>
  </div>
</div>
</body>
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
<script src="{{ asset('js/sweetalert.js') }}"></script>
@yield('script')
<script type="text/javascript">
@if ($message = Session::get('pass_change'))
Swal.fire({
  icon: 'success',
  text: '{{ $message }}',
  showConfirmButton: false,
  timer: 1500
});
@endif

$('#changepassForm').submit(function(e){
  e.preventDefault();
  var request = new FormData(this);
  $.ajax({
    url: "{{ url('/changepass') }}/" + "{{ auth()->user()->id }}",
    method: "POST",
    data: request,
    contentType: false,
    cache: false,
    processData: false,
    success:function(data){
      var warningAlert = '<div class="text-center"><div class="alert" role="alert" style="background-color: #d7b2f6; color: #7a00e2;">Password lama tidak sesuai</div></div>';
      if(data == "sukses"){
        location.reload();
      }else if(data == "gagal"){
        $('#old_pass_false').html(warningAlert);
        $('#old_pass_val').val('');
        $('#new_pass_val').val('');
      }
    }
  });
});
</script>
</html>