<?php
session_start();

// error_reporting(0);

// include('koneksi/koneksi.php');

// $sql = "SELECT * FROM barang ORDER BY nama_barang ASC LIMIT 4";
// $query = mysqli_query($koneksi, $sql);
// $data = mysqli_fetch_array($query);

// $sql_user = "SELECT * FROM akun WHERE username='$_SESSION[username]' OR email='$_SESSION[username]' OR no_telp='$_SESSION[username]'";
// $query_user = mysqli_query($koneksi, $sql_user);
// $data_user = mysqli_fetch_array($query_user);

// $wish = "SELECT * FROM wishlist JOIN akun ON wishlist.id_akun = akun.id_akun WHERE akun.username='$_SESSION[username]' OR akun.email='$_SESSION[username]' OR akun.no_telp='$_SESSION[username]' ";
// $data_wish = mysqli_query($koneksi, $wish);
// $total_wish = mysqli_num_rows($data_wish);

// $order = "SELECT * FROM cart JOIN akun ON cart.id_akun = akun.id_akun WHERE akun.username='$_SESSION[username]' OR akun.email='$_SESSION[username]' OR akun.no_telp='$_SESSION[username]' ";
// $data_order = mysqli_query($koneksi, $order);
// $total_order = mysqli_num_rows($data_order);

// 
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

    <!-- Icons -->
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="./assets/css/font-awesome.css" rel="stylesheet" />

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
                            <li>
                                <i class='ni ni-bag-17'></i>
                                <a href='seller.php'>Seller</a>
                            </li>
                            <li>
                                <i class='fa fa-user-circle-o'></i>
                                <a href='account.php'>jj</a>
                            </li>
                            <li>
                                <i class='fa fa-power-off'></i>
                                <a href='#modalKeluar' data-toggle='modal' data-target='#modalKeluar' role='button'>Keluar</a>
                            </li>
                            <?php

                            // if ($_SESSION['status'] == "seller") {
                            //     echo ("
                            //      ");
                            // } elseif ($_SESSION['status'] == "member") {
                            //     echo ("
                            //       <li>
                            //       <i class='fa fa-address-card-o'></i> 
                            //       <a href='register_seller.php'>Ingin Buka Toko?</a>
                            //       </li>
                            //       <li>
                            //       <i class='fa fa-user-circle-o'></i> 
                            //       <a href='account.php'>" . $data_user['nama'] . "</a>
                            //       </li>
                            //       <li>
                            //       <i class='fa fa-power-off'></i> 
                            //       <a href='#modalKeluar' data-toggle='modal' data-target='#modalKeluar' role='button'>Keluar</a>
                            //       </li>");
                            // } else {
                            //     echo ("
                            //       <li>
                            //       <i class='fa fa-power-off'></i> 
                            //       <a href='login.php'>Masuk</a>
                            //       </li>");
                            // }

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
                            <span class="logo">IndoMarket</span>
                        </a>
                    </div>
                    <div class="col-lg-7 col-12 col-sm-6">
                        <form action="products.php" method="get" class="search">
                            <div class="input-group w-100">
                                <input type="text" id="cari" name="cari" class="form-control" placeholder="Cari" />
                                <div class="input-group-append">
                                    <button id="btnCari" class="btn btn-primary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-2 col-12 col-sm-6">
                        <div class="right-icons pull-right d-none d-lg-block">
                            <div class='single-icon wishlist'>
                                <a href='login.php'><i class='fa fa-heart-o fa-2x'></i></a>
                            </div>
                            <div class='single-icon shopping-cart'>
                                <a href='login.php'><i class='fa fa-shopping-cart fa-2x'></i></a>
                            </div>
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
                        <a class='nav-link' href='products.php'>Produk</a>
                        <li class='nav-item d-lg-none'>
                            <a class='nav-link' href='login.php'>Masuk</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- SLIDER -->
    <section class="slider-section pt-4 pb-4">
        <div class="container">
            <div class="slider-inner">
                <div class="row">
                    <div class="col-md-3">
                        <nav class="nav-category">
                            <h2>Kategori</h2>
                            <ul class="menu-category">
                                <li><a href="#" id="pakaian">Pakaian</a></li>
                                <li><a href="#" id="elektronik">Elektronik</a></li>
                                <li><a href="#">Rumah and Dapur</a></li>
                                <li><a href="#">Bayi and Mainan</a></li>
                                <li><a href="#">Olahraga</a></li>
                                <li><a href="#">Barang Digital</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-9">
                        <div id="carouselIndicators" class="carousel slide carousel-fade" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner shadow-sm rounded">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="./assets/img/slides/slide1.jpg" alt="First slide" />
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5 class="text-white">Mountains, Nature Collection</h5>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="./assets/img/slides/slide2.jpg"
                                        alt="Second slide" />
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5 class="text-white">Freedom, Sea Collection</h5>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="./assets/img/slides/slide3.jpg" alt="Third slide" />
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5 class="text-white">Living the Dream, Lost Island</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Slider -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="products-grids trending pb-4 pt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Produk Populer</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                    <div class="card" style="height: 100%;">
                        <img src="" class="card-img-top" class="img-fluid" height="50%">
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text">Rp. </p>
                            <a href="" class="btn btn-primary">Lihat Produk</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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

    <?php
    // if (isset($_GET["berhasil_toko"])) { 
    ?>
    <div class="modal fade" id="modalToko" tabindex="-1" role="dialog" aria-labelledby="modalToko">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Berhasil Membuat Toko</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Berhasil Membuat Toko, Silahkan Masuk Ulang Untuk Mengaksesnya.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>  

</body>

</html>