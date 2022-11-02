<?php
session_start();
include ('../koneksi/koneksi.php');
if(empty($_SESSION)){
  header("Location: index_admin.php");
}
$id_order=$_GET['id_order'];
$sql = "SELECT * FROM cart, akun, barang WHERE cart.id_akun = akun.id_akun AND cart.id_barang = barang.id_barang AND cart.id_order='$id_order'"; 
$hasil=mysqli_query($koneksi, $sql) or die(mysqli_error());
while ($tampil=mysqli_fetch_array($hasil))
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Data Order</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" href="#modalKeluar" data-toggle="modal" data-target="#modalKeluar" role="button">
          <i class="fas fa-power-off"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Modal Log Out -->
  <div class="modal fade" id="modalKeluar" tabindex="-1" role="dialog" aria-labelledby="modalKeluar" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Log Out</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah anda Yakin Untuk Log Out ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="../proses/logout.php" class="btn btn-danger">Log Out</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <br>
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index_admin.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="data_member.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Data Member</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Barang
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="data_barang.php" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Data Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="data_kategori.php" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Data Kategori Barang</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="data_order.php" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>Data Order</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="data_toko.php" class="nav-link">
              <i class="nav-icon fas fa-store"></i>
              <p>Data Toko</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Data Order</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Data Order</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit Data Order</h3>
              </div>
              
              <!-- form start -->
              <form method="post" action="../proses/update_order.php" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label>User Order</label>
                    <input type="hidden" name="tipe" value="admin">
                    <input type="hidden" name="id_order" value="<?php echo $id_order; ?>">
                    <input type="text" class="form-control" value="<?php echo $tampil['nama']; ?>" disabled>
                  </div>
                  <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" value="<?php echo $tampil['nama_barang']; ?>" disabled>
                  </div>
                  <div class="form-group">
                    <label>Jumlah Pesan</label>
                    <input type="text" class="form-control" value="<?php echo $tampil['jumlah']; ?>" disabled>
                  </div>
                  <div class="form-group">
                    <input type="hidden">
                  </div>
                  <div class="form-group">
                    <label>Status Order</label>
                    <select class="form-control" name="status_order">
                    <option <?= ($tampil['status_order'] == "") ? 'selected' : '' ?> disabled>Status Order</option>
                    <option value="belum dibayar" <?= ($tampil['status_order'] == "belum dibayar") ? 'selected' : '' ?>>Belum Dibayar</option>
                    <option value="dibayar" <?= ($tampil['status_order'] == "dibayar") ? 'selected' : '' ?>>Dibayar</option>
                    <option value="dibatalkan" <?= ($tampil['status_order'] == "dibatalkan") ? 'selected' : '' ?>>Dibatalkan</option>
                    <option value="dalam proses" <?= ($tampil['status_order'] == "dalam proses") ? 'selected' : '' ?>>Dalam Proses</option>
                    <option value="dalam pengiriman" <?= ($tampil['status_order'] == "dalam pengiriman") ? 'selected' : '' ?>>Dalam Pengiriman</option>
                    <option value="terkirim" <?= ($tampil['status_order'] == "terkirim") ? 'selected' : '' ?>>Terkirim</option>
                    
                  </div>
                  <div class="form-group">
                    <input type="hidden">
                  </div>
                
                <!-- /.card-body -->  
                <button type="submit" class="btn btn-primary">Submit</button>
                
              </form>
            </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2022 </strong> All rights reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/js/adminlte.min.js"></script>

<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>

<?php }  ?>