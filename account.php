<?php
session_start();

include('koneksi/koneksi.php');

$sql = "SELECT * FROM akun WHERE username='$_SESSION[username]' OR email='$_SESSION[username]' OR no_telp='$_SESSION[username]'";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);

$data_foto = $data['foto'];

$wish = "SELECT * FROM wishlist JOIN akun ON wishlist.id_akun = akun.id_akun WHERE akun.username='$_SESSION[username]' OR akun.email='$_SESSION[username]' OR akun.no_telp='$_SESSION[username]' ";

$data_wish = mysqli_query($koneksi, $wish);
$total_wish = mysqli_num_rows($data_wish);

$order = "SELECT * FROM cart JOIN akun ON cart.id_akun = akun.id_akun WHERE akun.username='$_SESSION[username]' OR akun.email='$_SESSION[username]' OR akun.no_telp='$_SESSION[username]' ";

$data_order = mysqli_query($koneksi, $order);
$total_order = mysqli_num_rows($data_order);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <title>IndoMarket</title>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <!-- Icons -->
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="./assets/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Jquery UI -->
    <link type="text/css" href="./assets/css/jquery-ui.css" rel="stylesheet" />

    <!-- Argon CSS -->
    <link type="text/css" href="./assets/css/argon-design-system.min.css" rel="stylesheet" />

    <!-- Main CSS-->
    <link type="text/css" href="./assets/css/style.css" rel="stylesheet" />

    <!-- Optional Plugins-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
</head>

<body>
    <header class="header clearfix">
        <div class="top-bar d-none d-sm-block pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 text-left right-2">
                    </div>
                    <div class="col-md-6 text-right d-md-none d-lg-block">
                        <ul class="top-links account-links">
                            <?php
            
            if ($_SESSION['status'] == "seller") {
                echo ("
                <li>
                    <i class='fa fa-store'></i> 
                    <a href='seller.php'>Seller</a>
                </li>
                <li>
                    <i class='fa fa-user-circle-o'></i> 
                    <a href='account.php'>" . $data['nama'] . "</a>
                </li>
                <li>
                    <i class='fa fa-power-off'></i> 
                    <a href='#modalKeluar' data-toggle='modal' data-target='#modalKeluar' role='button'>Keluar</a>
                </li>");
            } elseif ($_SESSION['status'] == "member") {
                echo ("
                <li>
                    <i class='fa fa-address-card-o'></i> 
                    <a href='register_seller.php'>Ingin Buka Toko?</a>
                </li>
                <li>
                    <i class='fa fa-user-circle-o'></i> 
                    <a href='account.php'>" . $data['nama'] . "</a>
                </li>
                <li>
                    <i class='fa fa-power-off'></i> 
                    <a href='#modalKeluar' data-toggle='modal' data-target='#modalKeluar' role='button'>Keluar</a>
                </li>");
            } else {
                echo ("
                <li>
                    <i class='fa fa-power-off'></i> 
                    <a href='login.php'>Masuk</a>
                </li>");
            }
            
            ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Log Out -->
        <div class="modal fade" id="modalKeluar" tabindex="-1" role="dialog" aria-labelledby="modalKeluar"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="logOutModalLabel">Konfirmasi Keluar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin untuk keluar?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <a href="proses/logout.php" class="btn btn-danger">Keluar</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="header-main border-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-12 col-sm-6">
                        <a class="navbar-brand mr-lg-5" href="./index.php"> <i class="fa fa-shopping-bag fa-3x"></i>
                            <span class="logo">IndoMarket</span> </a>
                    </div>
                    <div class="col-lg-7 col-12 col-sm-6">
                        <form action="products.php" method="get" class="search">
                            <div class="input-group w-100">
                                <input type="text" name="cari" class="form-control" placeholder="Cari" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-2 col-12 col-sm-6">
                        <div class="right-icons pull-right d-none d-lg-block">
                            <?php
                            if ($_SESSION['status'] == 'member' || $_SESSION['status'] == 'seller'){

                                echo "
                                <div class='single-icon wishlist'>
                                <a href='wishlist.php'><i class='fa fa-heart-o fa-2x'></i></a>
                                <span class='badge badge-default'>".$total_wish."</span>
                            </div>
                                <div class='single-icon shopping-cart'>
                                <a href='cart.php''><i class='fa fa-shopping-cart fa-2x'></i></a>
                                <span class='badge badge-default'>".$total_order."</span>
                            </div>";
                            } else {
                                echo "
                                <div class='single-icon wishlist'>
                                <a href='login.php'><i class='fa fa-heart-o fa-2x'></i></a>
                            </div>
                                <div class='single-icon shopping-cart'>
                                <a href='login.php''><i class='fa fa-shopping-cart fa-2x'></i></a>
                            </div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class='navbar navbar-main navbar-expand-lg navbar-light border-top border-bottom'>
            <div class='container'>
                <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#main_nav'
                    aria-controls='main_nav' aria-expanded='false' aria-label='Toggle navigation'>
                    <span class='navbar-toggler-icon'></span>
                </button>

                <div class="collapse navbar-collapse" id="main_nav">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="index.php">Beranda</a>
                        </li>
                        <?php

                        if ($_SESSION['status'] == 'member') {
                            echo ("      
                  <ul class='navbar-nav'>
                    <li class='nav-item dropdown'>
                      <a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#' aria-expanded='true'>Laman</a>
                      <div class='dropdown-menu'>
                        <a class='dropdown-item' href='products.php'>Produk</a>
                        <a class='dropdown-item' href='cart.php'>Keranjang</a>
                        <a class='dropdown-item' href='order_detail.php'>Rincian Pesanan</a>
                      </div>
                    </li>
                    <li class='nav-item d-lg-none'>
                      <a class='nav-link' href='register_seller.php'>Ingin Buka Toko?</a>
                    </li>
                    <li class='nav-item d-lg-none'>
                      <a class='nav-link' href='account.php'>$data[nama]</a>
                    </li>
                    <li class='nav-item d-lg-none'>
                    <a class='nav-link' href='#modalKeluar' data-toggle='modal' data-target='#modalKeluar' role='button'>Keluar</a>
                    </li>
                  </ul>
                  ");
                        } elseif ($_SESSION['status'] == 'seller') {
                            echo ("<ul class='navbar-nav'>
              <li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#' aria-expanded='true'>Laman</a>
                <div class='dropdown-menu'>
                  <a class='dropdown-item' href='products.php'>Produk</a>
                  <a class='dropdown-item' href='cart.php'>Keranjang</a>
                  <a class='dropdown-item' href='order_detail.php'>Rincian Pesanan</a>
                </div>
              </li>
              <li class='nav-item d-lg-none'>
                <a class='nav-link' href='register_seller.php'>Ingin Buka Toko?</a>
              </li>
              <li class='nav-item d-lg-none'>
                <a class='nav-link' href='account.php'>$data[nama]</a>
              </li>
              <li class='nav-item d-lg-none'>
                <a class='nav-link' href='#modalKeluar' data-toggle='modal' data-target='#modalKeluar'>Keluar</a>
              </li>
            </ul>");
                        } else {
                            echo ("<a class='nav-link' href='products.php'>Produk</a>
                                <li class='nav-item d-lg-none'>
                              <a class='nav-link' href='login.php'>Masuk</a>
                            </li>");
                        }

                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- breadcrumb -->
    <section class="breadcrumb-section pb-3 pt-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Akun Saya</li>
            </ol>
        </div>
    </section>

    <!-- profile -->
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="col-12">
                <div class="product-details">
                    <div class="nav-wrapper">
                        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                                    href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1"
                                    aria-selected="true">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab"
                                    href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2"
                                    aria-selected="false">Pesanan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab"
                                    href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3"
                                    aria-selected="false">Alamat</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-4-tab" data-toggle="tab"
                                    href="#tabs-icons-text-4" role="tab" aria-controls="tabs-icons-text-4"
                                    aria-selected="false">Rincian Akun</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-1-tab">
                                    <div class="text-center mt-5">
                                        <?php
if (empty($data_foto)) {
echo "<i class='fa fa-user-circle-o' style='font-size: 10em;'></i>";
}else{
echo "<img src='img/".$data_foto."' class='rounded mx-auto d-flex mb-5' width='300' alt='profile' />";
}
?>
                                        <h3><?php echo $data['nama']; ?></h3>
                                        <h5>Alamat</h5>
                                        <p><?php echo $data['alamat']; ?></p>
                                        <h5>Email</h5>
                                        <p><?php echo $data['email']; ?></p>
                                        <h5>Nomor Telepon</h5>
                                        <p><?php echo $data['no_telp']; ?></p>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-2-tab">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Produk</th>
                                                <th></th>
                                                <th>Variasi</th>
                                                <th>Warna</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                                <th>Total Harga</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
        $sql_tabel="SELECT * FROM checkout JOIN akun ON checkout.id_akun = akun.id_akun JOIN barang ON checkout.id_barang = barang.id_barang JOIN toko ON barang.id_toko = toko.id_toko WHERE akun.username='$_SESSION[username]' OR akun.email='$_SESSION[username]' OR akun.no_telp='$_SESSION[username]'";
        $data_tabel = mysqli_query($koneksi, $sql_tabel);
        $total_tabel = mysqli_num_rows($data_tabel);

        if (!empty($total_tabel)){
            $no = 1;
            foreach ($koneksi->query($sql_tabel) as $data) :
            echo "<tr>
        <td class='text-center'>".$no++."</td>
        <td>".$data['nama_barang']."</td>
        <td><img src='img/".$data['foto_barang']."' width='100' height='100'></td>
        <td>".$data['variasi_order']."</td>
        <td>".$data['warna_order']."</td>
        <td>Rp. ".number_format($data['harga_barang'],2,",",".")."</td>
        <td>".$data['jumlah']."</td>
        <td>Rp. ".number_format($data['subtotal'],2,",",".")."</td>
        <td>".$data['status_order']."</td>
    </tr>";
        endforeach;
        ?>
                                        </tbody>
                                    </table>
                                    <?php } elseif (empty($total_tabel)) {
            echo "</tbody>
    </table>
            <p class='text-center'>Tidak ada produk</p>";
    } ?>
                                </div>

                                <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-3-tab">
                                    <div class="mb-5 col-6">
                                        <h5>Alamat Utama</h5>
                                        <div class="mb-3">
                                            <p><?php echo $data['alamat']; ?></p>
                                        </div>
                                        <div>
                                            <label>Nomor Telepon</label>
                                            <p><?php echo $data['no_telp']; ?></p>
                                        </div>
                                        <button class="btn btn-primary" data-toggle="modal"
                                            data-target="#ubahAlamat">Ubah Alamat</button>
                                    </div>
                                    <div class="mb-5 col-6">
                                        <h5>Alamat (Opsional)</h5>
                                        <div class="mb-3">
                                            <p>123 Payment Street, Los Angeles, CA</p>
                                        </div>
                                        <div>
                                            <label>Nomor Telepon</label>
                                            <p>+012 4566 789</p>
                                        </div>
                                        <button class="btn btn-primary" data-toggle="modal"
                                            data-target="#ubahAlamat2">Ubah Alamat</button>
                                        <p class="pt-5">* Tambahkan alamat jika berbeda dengan alamat utama</p>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="tabs-icons-text-4" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-4-tab">
                                    <h3>Rincian Akun</h3>
                                    <form method="post" action="proses/ubah_data_user.php" enctype="multipart/form-data"
                                        class="row g-3">
                                        <div class="col-md-6">
                                            <label for="inputPictureProfile" class="form-label">Foto Profil</label>
                                            <input class="form-control" name="foto" type="file"
                                                id="inputPictureProfile" />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputFirstName2" class="form-label">Nama Lengkap</label>
                                            <input type="text" name="nama" class="form-control" id="inputLastName2" />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="inputEmail2" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="inputEmail2" />
                                        </div>
                                        <div>
                                            <input type="hidden" name="username"
                                                value="<?php echo $_SESSION['username']; ?>">
                                        </div>
                                        <div class="container">
                                            <button type="submit" class="btn btn-primary mb-5">Perbarui Akun</button>
                                        </div>
                                    </form>
                                    <div class="review-form">
                                        <h3>Ubah Kata Sandi</h3>
                                        <form method="post" action="proses/ganti_pass.php" class="row g-3">
                                            <div class="col-6">
                                                <label for="inputCurrentPassword2" class="form-label">Kata Sandi
                                                    Lama</label>
                                                <input type="hidden" name="username"
                                                    value="<?php echo $_SESSION['username']; ?>">
                                                <input type="password" class="form-control"
                                                    id="inputCurrentPassword2" />
                                                <i type="button"
                                                    class="material-icons oplos togglePassword1">visibility_off</i>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputNewPassword2" class="form-label">Kata Sandi
                                                    Baru</label>
                                                <input type="password" name="password" class="form-control"
                                                    id="inputNewPassword2" />
                                                <i type="button"
                                                    class="material-icons oplos togglePassword2">visibility_off</i>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputConfirmPassword2" class="form-label">Konfirmasi Kata
                                                    Sandi</label>
                                                <input type="password" class="form-control" id="inputConfirmPassword2"
                                                    onkeypress="checkPassword()" />
                                                <i type="button"
                                                    class="material-icons oplos togglePassword3">visibility_off</i>
                                                <span id="pesan" style="color:red"> </span>
                                            </div>
                                            <div class="container">
                                                <button type="submit" class="btn btn-primary mt-3">Simpan
                                                    Perubahan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end profile -->

    <!-- modal edit address -->
    <div class="modal fade" id="ubahAlamat" tabindex="-1" role="dialog" aria-labelledby="ubahAlamat" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ubahAlamat">Alamat Utama</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="proses/ubah_alamat.php">
                        <div class="mb-3">
                            <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
                            <label for="address" class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="address"
                                placeholder="masukkan alamat" />
                        </div>
                        <div class="mb-3">
                            <label for="mobileNumber" class="form-label">Nomor Telepon</label>
                            <input type="text" name="no_telp" class="form-control" id="mobileNumber"
                                placeholder="masukkan nomor telepon" />
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal edit address 2 -->
    <div class="modal fade" id="ubahAlamat2" tabindex="-1" role="dialog" aria-labelledby="ubahAlamat2"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ubahAlamat2">Alamat (Opsional)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="address" placeholder="Masukkan alamat" />
                    </div>
                    <div class="mb-3">
                        <label for="mobileNumber" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="mobileNumber"
                            placeholder="Masukkan nomor telepon" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer bg-primary">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer about">
                            <div class="logo-footer"><i class="fa fa-shopping-bag fa-3x"></i> <span
                                    class="logo">IndoMarket</span></div>
                            <p class="text"></p>
                            <p class="call">
                                Punya Pertanyaan? Hubungi Kami<span><a href="tel:08113030391">0811 3030 391</a></span>
                            </p>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer links">
                            <h4>Informasi</h4>
                            <ul>
                                <li><a href="#">Tentang Kami</a></li>
                                <li><a href="#">Syarat &amp; Ketentuan</a></li>
                                <li><a href="#">Kontak Kami</a></li>
                                <li><a href="#">Kebijakan Privasi</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer links">
                            <h4>Layanan</h4>
                            <ul>
                                <li><a href="#">Metode Pembayaran</a></li>
                                <li><a href="#">Ajukan Pengembalian</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer social">
                            <h4>Kontak Kami</h4>
                            <!-- Single Widget -->
                            <div class="contact">
                                <ul>
                                    <li>Jl. Cipunegara No. 54, Purwantoro, Kec. Blimbing, Kota Malang, Jawa Timur</li>
                                    <li>65122 Indonesia</li>
                                    <li>info@indomarket.com</li>
                                    <li>0811 3030 391</li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                            <ul>
                                <li>
                                    <a href="#"><i class="ti-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="ti-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="ti-flickr"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="ti-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="copyright-inner border-top">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="left">
                                <p>Copyright © 2022 <a href="http://indokoding.net" target="_blank">IndoKoding.net</a> -
                                    All Rights Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>

    <!-- Core -->
    <script src="./assets/js/core/jquery.min.js"></script>
    <script src="./assets/js/core/popper.min.js"></script>
    <script src="./assets/js/core/bootstrap.min.js"></script>
    <script src="./assets/js/core/jquery-ui.min.js"></script>

    <!-- Optional plugins -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Argon JS -->
    <script src="./assets/js/argon-design-system.js"></script>

    <!-- Main JS-->
    <script src="./assets/js/main.js"></script>
    <script src="./assets/js/toggle-password.js"></script>

    <?php
    if (isset($_GET["berhasil_ganti_pass"])) { ?>
    <div class="modal fade" id="modalPass" tabindex="-1" role="dialog" aria-labelledby="modalPass">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Berhasil Mengganti Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Berhasil Mengganti Password Baru.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <script>
    $('#modalPass').modal('show');
    </script>
    <?php } ?>

    <script>
    function checkPassword() {

        var password = document.getElementById('inputNewPassword2').value;
        var confirm = document.getElementById('inputConfirmPassword2').value;

        if (confirm !== password) {
            var field = document.getElementById("pesan");
            field.innerHTML = "Password tidak sesuai";
        } else {
            var field = document.getElementById("pesan");
            field.innerHTML = "";
        }
    }
    </script>
</body>

</html>