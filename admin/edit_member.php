<?php
session_start();
include ('../koneksi/koneksi.php');
if(empty($_SESSION)){
  header("Location: index_admin.php");
}
$id_akun=$_GET['id_akun'];
$sql = "SELECT * FROM akun WHERE id_akun='$id_akun'"; 
$hasil=mysqli_query($koneksi, $sql) or die(mysqli_error());
while ($tampil=mysqli_fetch_array($hasil))
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Data Member</title>

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
            <h1>Edit Data Member</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Data Member</li>
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
                <h3 class="card-title">Edit Data Member</h3>
              </div>
              
              <!-- form start -->
              <form method="post" action="../proses/update_akun.php" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?php echo $tampil['nama']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $tampil['email']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $tampil['username']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" name="password" value="<?php echo md5($tampil['password']); ?>">
                  </div>
                  <div class="form-group">
                    <label>Foto Profil</label>
                    <?php
                      if (empty($tampil['foto'])) {
                          echo "Tidak ada Foto";
                      }else{
                          echo "<img src='../img/".$tampil['foto']."' width='100' height='100'/>";
                      }
                    ?>
                    <div class="custom-file">
                      <input type="file" name="foto" class="custom-file-input" id="foto">
                      <label class="custom-file-label" for="foto">Choose file</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                    <option <?= ($tampil['status'] == "") ? 'selected' : '' ?> disabled>Role</option>
                    <option value="admin" <?= ($tampil['status'] == "admin") ? 'selected' : '' ?>>Admin</option>
                    <option value="seller" <?= ($tampil['status'] == "seller") ? 'selected' : '' ?>>Seller</option>
                    <option value="member" <?= ($tampil['status'] == "member") ? 'selected' : '' ?>>Member</option>
                  </div>
                  <div class="form-group">
                    <input type="hidden">
                  </div>
                  <div class="form-group">
                    <label>No. Telp</label>
                    <input type="text" class="form-control" name="no_telp" value="<?php echo $tampil['no_telp']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin">
                    <option <?= ($tampil['jenis_kelamin'] == "") ? 'selected' : '' ?> disabled>Jenis Kelamin</option>
                    <option value="laki-laki" <?= ($tampil['jenis_kelamin'] == "laki-laki") ? 'selected' : '' ?>>Laki-laki</option>
                    <option value="perempuan" <?= ($tampil['jenis_kelamin'] == "perempuan") ? 'selected' : '' ?>>Perempuan</option>
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="id_akun" value="<?php echo $id_akun; ?>">
                  </div>
                  <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $tampil['tanggal_lahir']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="<?php echo $tampil['alamat']; ?>">
                  </div>
                  <div class="form-group">
                    <label>Kota</label>
                    <select class="form-control" name="kota">
                    <option selected disabled>Pilih Kota</option>
                    <option value=""></option>
                    <option value=""></option>
                  </div>
                  <div class="form-group">
                    <input type="hidden">
                  </div>
                  <div class="form-group">
                    <label>Provinsi</label>
                    <select class="form-control" name="provinsi">
                    <option selected disabled>Pilih Provinsi</option>
                    <option value="Nanggroe Aceh Darussalam">Nanggroe Aceh Darussalam</option>
                    <option value="Sumatra Utara">Sumatra Utara</option>
                    <option value="Sumatra Selatan">Sumatra Selatan</option>
                    <option value="Sumatra Barat">Sumatra Barat</option>
                    <option value="Bengkulu">Bengkulu</option>
                    <option value="Riau">Riau</option>
                    <option value="Kepulauan Riau">Kepulauan Riau</option>
                    <option value="Jambi">Jambi</option>
                    <option value="Lampung">Lampung</option>
                    <option value="Bangka Belitung">Bangka Belitung</option>
                    <option value="Banten">Banten</option>
                    <option value="DKI Jakarta">DKI Jakarta</option>
                    <option value="Jawa Barat">Jawa Barat</option>
                    <option value="Jawa Tengah">Jawa Tengah</option>
                    <option value="Daerah Istimewa Yogyakarta">Daerah Istimewa Yogyakarta</option>
                    <option value="Jawa Timur">Jawa Timur</option>
                    <option value="Kalimantan Barat">Kalimantan Barat</option>
                    <option value="Kalimantan Timur">Kalimantan Timur</option>
                    <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                    <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                    <option value="Kalimantan Utara">Kalimantan Utara</option>
                    <option value="Bali">Bali</option>
                    <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                    <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                    <option value="Gorontalo">Gorontalo</option>
                    <option value="Sulawesi Barat">Sulawesi Barat</option>
                    <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                    <option value="Sulawesi Utara">Sulawesi Utara</option>
                    <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                    <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                    <option value="Maluku Utara">Maluku Utara</option>
                    <option value="Maluku">Maluku</option>
                    <option value="Papua Barat">Papua Barat</option>
                    <option value="Papua">Papua</option>
                    <option value="Papua Tengah">Papua Tengah</option>
                    <option value="Papua Pegunungan">Papua Pegunungan</option>
                    <option value="Papua Selatan">Papua Selatan</option>
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
<!-- bs-custom-file-input -->
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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