<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SIM RAPORT</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
</head>
<body id="page-top">
  <div id="wrapper">
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
      @if(auth()->user()->role == 'Kurikulum')
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
      @endif
      <hr class="sidebar-divider d-none d-md-block">
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->name}}</span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 mb-4">
              <div class="card bg-success text-white shadow" id="card-welcome">
                <div class="card-body text-center">
                  <h3>Kelola Akun dan Hak Akses</h3>
                </div>
              </div>
            </div>
            <div class="col-lg-12 mb-4">
              <a href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>Tambah Data</a>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="{{ url('/simpan_akun') }}">
                      @csrf
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Kode Guru</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" name="kd_guru">
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
                        <div class="col-sm-8">
                            <select id="inputState" class="form-control" name="role">
                              <option value="Guru">Guru</option>
                              <option value="Kurikulum">Kurikulum</option>
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
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12" align="center">
              <table class="table" id="myTable">
                <thead class="text-center">
                  <tr>
                    <th scope="col" class="bg-success" style="color: #fff;">#</th>
                    <th scope="col">Kode Guru</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($user as $u)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $u->kd_guru }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->role }}</td>
                    <td class="text-center"><a href="" class="btn btn-primary">Detail <i class="fa fa-search fa-lg"></i></a>  <a href="{{ url('/hapus_akun', $u->id) }}" class="btn btn-danger">Hapus <i class="far fa-trash-alt fa-lg"></i></a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
      </div>
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
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</body>
<script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</html>
