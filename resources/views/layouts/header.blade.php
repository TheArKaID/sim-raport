<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SIM RAPORT</title>
  <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
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
          <a class="btn btn-primary" href="{{ url('/logout') }}">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form method="POST" action="{{ url('/changepass/'. auth()->user()->id) }}">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #7a00e2; color: #fff;">
          <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="color: #fff;">×</span>
          </button>
        </div>
        <div class="modal-body">
            @csrf
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Password Baru</label>
              <div class="col-sm-8">
                <input type="password" class="form-control" name="newpassword" value="" required="">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-block" type="submit" style="background-color: #b854f5; color: #fff; border-radius: 50px;">Ubah</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
  <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
  <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
</body>
@yield('script')
</html>