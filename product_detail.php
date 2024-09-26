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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                                if ($_SESSION['status'] == 'member' || $_SESSION['status'] == 'seller') {

                                    echo "
                                    <div class='single-icon wishlist'>
                                    <a href='wishlist.php'><i class='fa fa-heart-o fa-2x'></i></a>
                                    <span class='badge badge-default'>" . $total_wish . "</span>
                                    </div>
                                    <div class='single-icon shopping-cart'>
                                    <a href='cart.php''><i class='fa fa-shopping-cart fa-2x'></i></a>
                                    <span class='badge badge-default'>" . $total_order . "</span>
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
    <!-- Page Header -->
    <section class="breadcrumb-section pb-3 pt-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                <li class="breadcrumb-item"><a href="products.php">Produk</a></li>
                <li class=" breadcrumb-item active" aria-current="page">Rincian Produk</li>
            </ol>
        </div>
    </section>
    <section class="product-page pb-4 pt-4">
        <div class="container">
            <div class="row product-detail-inner">
                <div class="col-sm-12 col-lg-6">
                    <div id="product-images" class="carousel slide" data-ride="carousel">
                        <!-- slides -->
                        <div class="carousel-inner">

                            <div class="carousel-item active"><img src="img/<?php echo $tampil['foto_barang']; ?>"
                                    alt="Product 1" width="200" height="200" />
                            </div>
                            <div class="carousel-item"><img src="img/<?php echo $tampil['foto_barang2']; ?>"
                                    alt="Product 2" width="200" height="200" /></div>
                            <div class="carousel-item"><img src="img/<?php echo $tampil['foto_barang3']; ?>"
                                    alt="Product 3" width="200" height="200" /></div>
                            <div class="carousel-item"><img src="img/<?php echo $tampil['foto_barang4']; ?>"
                                    alt="Product 4" width="200" height="200" /></div>
                        </div>
                        <!-- Left right -->
                        <a class="carousel-control-prev" href="#product-images" data-slide="prev"> <span
                                class="carousel-control-prev-icon"></span> </a>
                        <a class="carousel-control-next" href="#product-images" data-slide="next"> <span
                                class="carousel-control-next-icon"></span> </a>
                        <!-- Thumbnails -->
                        <ol class="carousel-indicators list-inline">
                            <li class="list-inline-item active">
                                <a id="carousel-selector-0" class="selected" data-slide-to="0"
                                    data-target="#product-images"> <img src="img/<?php echo $tampil['foto_barang']; ?>"
                                        class="img-fluid" width="100" height="100" /> </a>
                            </li>
                            <li class="list-inline-item">
                                <a id="carousel-selector-1" data-slide-to="1" data-target="#product-images"> <img
                                        src="img/<?php echo $tampil['foto_barang2']; ?>" class="img-fluid" width="100"
                                        height="100" /> </a>
                            </li>
                            <li class="list-inline-item">
                                <a id="carousel-selector-2" data-slide-to="2" data-target="#product-images"> <img
                                        src="img/<?php echo $tampil['foto_barang3']; ?>" class="img-fluid" width="100"
                                        height="100" /> </a>
                            </li>
                            <li class="list-inline-item">
                                <a id="carousel-selector-3" data-slide-to="3" data-target="#product-images"> <img
                                        src="img/<?php echo $tampil['foto_barang4']; ?>" class="img-fluid" width="100"
                                        height="100" /> </a>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-detail">
                        <h2 class="product-name"><?php echo $tampil['nama_barang']; ?></h2>
                        <div class="product-price"><span class="price">Rp.
                                <?php echo number_format($tampil['harga_barang'], 2, ",", "."); ?></span></div>
                        <div class="product-short-desc">
                            <p>
                                <?php echo $tampil['deskripsi']; ?>
                            </p>
                        </div>
                        <!-- <input type='hidden' name='id_barang' onchange='showStok(this.value)' value='".$id_barang."'> -->
                        <div class="product-select">
                            <?php

                                                                if ($_SESSION['status'] == 'member' || $_SESSION['status'] == 'seller') {
                                                                    echo "<form method='POST' action='proses/add_order.php'>
                                                                    <div class='form-group'>
                                                                    <label>Variasi</label>
                                                                    
                                                                    <select class='form-control' id='variasi' name='variasi' onchange='showStok(this.value)'>
                                                                    <option selected disabled>Pilih Variasi</option>";
                                                                    foreach ($variasi as $data_variasi) {
                                                                        echo'<option value='.$data_variasi.'>'.$data_variasi.'</option>';
                                                                    }
                                                                    echo "</select>
                                                                    </div>
                                                                    <div class='form-group'>
                                                                    <label>Warna</label>
                                                                    <select class='form-control' id='warna' name='warna'>
                                                                    <option selected disabled>Pilih Warna</option>";
                                                                    foreach ($warna as $data_warna) {
                                                                        echo '<option value='.$data_warna.'>'.$data_warna.'</option>';
                                                                    }
                                                                    echo"</select>
                                                                    </div>
                                                                    <div class='form-group'>
                                                                    <label>Stok</label>
                                                                    <p id='stokBarang'>Stok barang : </p>
                                                                    </div>
                                                                    <div class='row'>
                                                                    <input type='hidden' name='tipe' value='products'>
                                                                    <input type='hidden' name='id_akun' value='" . $data['id_akun'] . "' />
                                                                    <input type='hidden' name='id_toko' value='" . $tampil['id_toko'] . "' />
                                                                    <input type='hidden' name='id_barang' value='" . $tampil['id_barang'] . "' />
                                                                    <div class='col-md-4 col-lg-6'>
                                                                    <button type='submit' id='keranjang' class='btn btn-primary btn-block'>Tambahkan ke keranjang</button>
                                                                    </div>
                                                                    </form>

                                                                    <form method='POST' action='proses/add_wish.php'>
                                                                    <input type='hidden' name='id_akun' value='" . $data['id_akun'] . "' />
                                                                    <input type='hidden' name='id_barang' value='" . $tampil['id_barang'] . "' />
                                                                    <div class='col-md-4'>
                                                                    <button type='submit' class='btn btn-secondary'><i class='fa fa-heart-o'></i></button>
                                                                    </div>
                                                                    </form>
                                                                    ";
                                                                } else {
                                                                 echo "<div class='form-group'>
                                                                 <label>Variasi</label>
                                                                 <select class='form-control' name='variasi'>
                                                                 <option selected disabled>Pilih Variasi</option>";
                                                                 foreach ($variasi as $data_variasi) {
                                                                    echo"<option value='".$data_variasi."'>".$data_variasi."</option>";
                                                                }
                                                                echo "</select>
                                                                </div>
                                                                <div class='form-group'>
                                                                <label>Warna</label>
                                                                <select class='form-control' name='warna'>
                                                                <option selected disabled>Pilih Warna</option>";
                                                                foreach ($warna as $data_warna) {
                                                                    echo "<option value='".$data_warna."'>".$data_warna."</option>";
                                                                }
                                                                echo"</select>
                                                                </div>
                                                                <div class='row'><div class='col-md-4 col-lg-8'>
                                                                <a href='login.php' class='btn btn-primary btn-block'>Tambahkan ke keranjang</a>
                                                                </div>
                                                                <div class='col-md-4'>
                                                                <a href='login.php' class='btn btn-secondary'><i class='fa fa-heart-o'></i></a>
                                                                </div>";}
                                                                ?>


                        </div>
                    </div>
                    <div class="product-share">
                        <ul>
                            <li class="categories-title">Share :</li>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product-details">
                    <div class="nav-wrapper">
                        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab"
                                    href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1"
                                    aria-selected="true">Reviews</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                                    aria-labelledby="tabs-icons-text-1-tab">
                                    <div class="review-form">
                                        <h3>Tulis Review</h3>
                                        <form>
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <label>Review</label>
                                                <textarea cols="4" class="form-control"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section class="other-products pb-4 pt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Produk yang Serupa</h2>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <?php
                                            $sql = "SELECT * FROM barang WHERE jenis_barang LIKE '%" . $jenis_barang . "%'";
                                            foreach ($koneksi->query($sql) as $data) :
                                                ?>
                <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                    <div class="card" style="height: 100%;">
                        <img src="img/<?php echo $data['foto_barang']; ?>" class="card-img-top" class="img-fluid"
                            height="50%">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $data['nama_barang']; ?></h5>
                            <p class="card-text">Rp. <?php echo number_format($data['harga_barang'],2,",","."); ?></p>
                            <a href="product_detail.php?id_barang=<?php echo $data['id_barang']; ?>&jenis_barang=<?php echo $data['jenis_barang']; ?>"
                                class="btn btn-primary">Lihat Produk</a>
                        </div>
                    </div>
                </div>
                <?php
                                                endforeach;
                                                ?>
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
    <script type="text/javascript">
    // $(document).ready(function(){
    //       var variasi = [];
    //       var warna = [];

    //       $('#variasi').each(function(){
    //         if( $('#variasi :selected').length > 1){
    //          var bac = [];
    //          $('#variasi :selected').each(function(i, variasi) {
    //            bac[i] = $(selected).val();
    //          }); 
    //         } else {
    //            var bac = $("#variasi").val();; 
    //         }
    //       });

    //       $('#warna').each(function(){
    //         if( $('#warna :selected').length > 1){
    //          var bac = [];
    //          $('#warna :selected').each(function(i, warna) {
    //            bac[i] = $(selected).val();
    //          }); 
    //         } else {
    //            var bac = $("#warna").val();; 
    //         }
    //       });

    //        $.ajax({
    //         url:"get_stok.php",
    //         method:"GET",
    //         data:{variasi:variasi, warna:warna},
    //         success:function(data){
    //             console.log(data);
    //         }
    //        });

    // });

    function showStok(variasi) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("stokBarang").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "get_stok.php?variasi="+variasi, true);
        xmlhttp.send();
    }


    // $(document).ready(function(){

    //     var app = {
    //         tampil: function(){
    //             var stok = $(this).val();
    //             $.ajax({
    //                 url: "get_stok.php",
    //                 method: "POST",
    //                 data: {stok: stok},
    //                 success: function(data){
    //                     $("#stokBarang").html(data)
    //                 }
    //             })
    //         }
    //     }
    //     $(document).on("change", "#variasi", app.tampil)

    //     // ambil data variasi
    //     // $('body').on("change","#variasi",function(){
    //     //     var id = $(this).val();
    //     //     var data = "variasi_stok="+id+"&data=variasi";
    //     //     $.ajax({
    //     //         type: 'POST',
    //     //         url: "get_stok.php",
    //     //         data: data,
    //     //         success: function(hasil) {
    //     //             $("#stok-barang").html(hasil);
    //     //         }
    //     //     });
    //     // });

    //     // // ambil data warna
    //     // $('body').on("change","#warna",function(){
    //     //     var id = $(this).val();
    //     //     var data = "warna_stok="+id+"&data=warna";
    //     //     $.ajax({
    //     //         type: 'POST',
    //     //         url: "get_stok.php",
    //     //         data: data,
    //     //         success: function(hasil) {
    //     //             $("#stok-barang").html(hasil);
    //     //         }
    //     //     });
    //     // });
    // });
    </script>
</body>

</html>