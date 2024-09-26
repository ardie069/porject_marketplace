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
                            <?php

                            if ($_SESSION['status'] == "seller") {
                                echo ("
                                    <li>
                                    <i class='ni ni-bag-17'></i> 
                                    <a href='seller.php'>Seller</a>
                                    </li>
                                    <li>
                                    <i class='fa fa-user-circle-o'></i> 
                                    <a href='account.php'>" . $data_user['nama'] . "</a>
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
                                    <a href='account.php'>" . $data_user['nama'] . "</a>
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
                          <a class='nav-link' href='account.php'>$data_user[nama]</a>
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
                          <a class='nav-link' href='account.php'>$data_user[nama]</a>
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

    <!-- breadcumb -->
    <section class="breadcrumb-section pb-3 pt-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Akun Saya</li>
                <li class="breadcrumb-item active" aria-current="page">Seller</li>
            </ol>
        </div>
    </section>

    <!-- edit product -->
    <form method="post" action="proses/tambah_stok.php" enctype="multipart/form-data">
        <section class="container">
            <h3 class="mt-5">Tambah Stok Produk</h3>
            <div class="mb-3">
                <label for="nameProduct" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" value="<?php echo $tampil['nama_barang']; ?>" readonly />
                <input type="hidden" name="id_barang" class="form-control"
                    value="<?php echo $tampil['id_barang']; ?>" />
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Stok</label>
                <input type="text" name="stok" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="variant" class="form-label">Variasi</label>
                <select class='form-control' name='variasi'>
                    <option selected disabled>Pilih Variasi</option>
                    <?php foreach ($variasi as $data_variasi) {
            echo '<option value='.$data_variasi.'>'.$data_variasi.'</option>';
            }
            ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Warna</label>
                <select class='form-control' name='warna'>
                    <option selected disabled>Pilih Warna</option>
                    <?php foreach ($warna as $data_warna) {
            echo '<option value='.$data_warna.'>'.$data_warna.'</option>';
            }
            ?>
                </select>
            </div>
            <div class="mb-5">
                <button type="submit" class="btn btn-primary mt-5">Submit</button>
            </div>
        </section>
    </form>
    <!-- end edit product -->

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
</body>

</html>