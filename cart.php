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
    <section class="breadcrumb-section pb-3 pt-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
            </ol>
        </div>
    </section>

    <!-- tables -->
    <form action="proses/add_checkout.php" method="POST" id="myForm" enctype="multipart/form-data">
        <div class="container">
            <br />
            <table class="table">
                <thead>
                    <tr>
                        <!-- <th><input type="checkbox" id="checkAllBarang"> Checkout</th> -->
                        <!-- <th><input type="checkbox" id="checkAllDelete"> Delete</th> -->
                        <th class="text-center">No.</th>
                        <th>Nama Toko</th>
                        <th class="text-right">Produk</th>
                        <th></th>
                        <th>Variasi</th>
                        <th>Warna</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th class="text-right">Hapus</th>
                    </tr>
                </thead>
                <!-- <input type='checkbox' name='barang[]' id='centang' onclick='changeValue(this.value)' value='".$tampil['id_cart']."'>

                <input type='checkbox' class='checkstatus' name='chk_product[]' data-id='".$tampil["id_cart"]."' data-code='".$tampil["id_barang"]."'>";

                <input type='hidden' name='selected_product[]'' id='product-".$tampil["id_cart"]."' value='' />

                <input type='hidden' name='id_toko[]' value='" . $tampil['id_toko'] . "' />
                            <input type='hidden' name='id_akun' value='" . $data['id_akun'] . "' />
                            <input type='hidden' name='id_barang[]' value='" . $tampil['id_barang'] . "' />
                            <input type='hidden' name='harga_barang[]' value='".$tampil['harga_barang']."'>
                            <input type='hidden' name='variasi_order[]' value='".$tampil['variasi_cart']."'>
                            <input type='hidden' name='warna_order[]' value='".$tampil['warna_cart']."'>
                            <input type='hidden' name='status_order[]' value='dalam proses'>
                            <input type='hidden' name='subtotal[]' value='".$subtotal."'> -->
                <tbody>
                    <?php
        $sql_tabel="SELECT * FROM cart JOIN akun ON cart.id_akun = akun.id_akun JOIN barang ON cart.id_barang = barang.id_barang JOIN toko ON cart.id_toko = toko.id_toko WHERE akun.username='$_SESSION[username]' OR akun.email='$_SESSION[username]' OR akun.no_telp='$_SESSION[username]'";
        $data_tabel = mysqli_query($koneksi, $sql_tabel);
        $total_tabel = mysqli_num_rows($data_tabel);

        if (!empty($total_tabel)){
            $no = 1;
            foreach ($koneksi->query($sql_tabel) as $tampil) :
            echo "<tr>
                        <td class='text-center'>".$no++."</td>
                        <td>".$tampil['nama_toko']."</td>
                        <td>".$tampil['nama_barang']."</td>
                        <td><img src='img/".$tampil['foto_barang']."' width='100' height='100'></td>
                        <td>".$tampil['variasi_cart']."</td>
                        <td>".$tampil['warna_cart']."</td>
                        <td>Rp. ".number_format($tampil['harga_barang'],2,",",".")."</td>
                        <td>
                            
                            <input type='number' name='jumlah[]' class='form-control num' id='num' min='0' onchange='del0()' value='1' />
                            <input type='hidden' id='id_akun' name='id_akun' value='" . $data['id_akun'] . "' />

                        <input type='hidden' name='id_cart[]' value='" . $tampil['id_cart'] . "' />
                        <input type='hidden' name='id_toko[]' value='" . $tampil['id_toko'] . "' />
                            <input type='hidden' name='id_barang[]' value='" . $tampil['id_barang'] . "' />
                            <input type='hidden' name='harga_barang[]' value='".$tampil['harga_barang']."'>
                            <input type='hidden' name='variasi_order[]' value='".$tampil['variasi_cart']."'>
                            <input type='hidden' name='warna_order[]' value='".$tampil['warna_cart']."'>
                            <input type='hidden' name='status_order[]' value='dalam proses'>


                        </td>
                        <td class='td-actions text-right'>
                            <a href='proses/del_wish_cart.php?id_cart=".$tampil['id_cart']."&tipe=cart'
                                type='button' class='btn btn-danger btn-icon btn-sm hapus' id='hapus'>
                                <i class='ni ni-fat-remove pt-1'></i>
                            </a>
                        </td>
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

        <!-- cart -->
        <section class="pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <?php
                    if ($total_order==0) {
                      echo "<button type='button' class='btn btn-primary' disabled hidden>Checkout</button>";
                    }else {
                        echo "<button type='submit' class='btn btn-primary' name='checkout'>Checkout</button>
                        <button type='submit' class='btn btn-danger' name='delete'>Hapus Semua</button>";
                    }
                    ?>
                </div>
            </div>
        </section>
    </form>
    <!-- end cart -->

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
    <script src="./assets/js/core/jquery-3.2.1.min.js"></script>
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
    //     // $('#checkout').click(function(){
    //     $("#myForm").submit(function (event) {
    //       var id_akun = $("#id_akun").val();
    //       var jumlah = $("#num").val();
    //       // var formData = {
    //       //     id_akun: $("#id_akun").val(),
    //       //     jumlah: $("#jumlah").val(),
    //       //     status_order: $("#status_order").val(),
    //       //   };
    //       var id_cart = [];
    //       // var id_akun = [];
    //       var id_barang = [];
    //       var harga_barang = [];
    //       var id_toko = [];
    //       var variasi_order = [];
    //       var warna_order = [];
    //       // var status_order = [];
    //       $('#centang').each(function(){
    //         if($(this).prop('checked') == true){
    //         // jumlah.push($(this).data('jumlah'));
    //         id_cart.push($(this).data('id_cart'));
    //         // id_akun.push($(this).data('id_akun'));
    //         id_barang.push($(this).data('id_barang'));
    //         harga_barang.push($(this).data('harga_barang'));
    //         id_toko.push($(this).data('id_toko'));
    //         variasi_order.push($(this).data('variasi_order'));
    //         warna_order.push($(this).data('warna_order'));
    //         // status_order.push($(this).data('status_order'));
    //         }
    //       });

    //       if(id_cart.length > 0){
    //        $.ajax({
    //         url:"proses/add_checkout.php",
    //         method:"POST",
    //         data:{id_cart:id_cart, id_akun:id_akun, id_barang:id_barang, harga_barang:harga_barang, id_toko:id_toko, variasi_order:variasi_order, warna_order:warna_order, jumlah:jumlah},
    //         // data:{product_id:product_id, product_name:product_name, product_price:product_price, product_shop:product_shop, product_variasi:product_variasi, product_warna:product_warna, action:action},
    //         success:function(data){
    //          // alert("Barang sudah masuk ke Checkout");
    //          window.location.href = 'checkout.php';
    //          alert(data);
    //         }
    //        });
    //       }
    //       else
    //       {
    //        alert('Pilih setidaknya 1 barang');
    //       }

    //      });
    // });

    // if (document.querySelector('.num').value == 0) {
    //     $(".num").on('change', function(event) {
    //         document.querySelector('.hapus').click();
    //     });
    // }

    // $("input[type=checkbox]").on("click", function() {
    //     var id_cart = $(this).data("id_cart");
    //     var id_barang = $(this).data("id_barang");
    //     var id_toko = $(this).data("id_toko");
    //     var harga_barang = $(this).data("harga_barang");
    //     var variasi_order = $(this).data("variasi_order");
    //     var warna_order = $(this).data("warna_order");

    //         if($(this).is(":checked")){
    //             $("#barang-"+id_cart).val(id_barang);
    //             $("#toko-"+id_cart).val(id_toko);
    //             $("#harga-"+id_cart).val(harga_barang);
    //             $("#variasi-"+id_cart).val(variasi_order);
    //             $("#warna-"+id_cart).val(warna_order);
    //         }
    //         else if($(this).is(":not(:checked)")){
    //             $("#barang-"+id_cart).val("");
    //             $("#toko-"+id_cart).val("");
    //             $("#harga-"+id_cart).val("");
    //             $("#variasi-"+id_cart).val("");
    //             $("#warna-"+id_cart).val("");
    //         }
    // });

    // var centang = document.getElementsById('centang');
    // var button = document.getElementsById('checkout');
    // if (centang.checked != true) {
    //     button.
    //     alert("harus memilih barang");
    // };

    // $("#checkAllBarang").click(function () {
    //     $('input:checkbox').not(this).prop('checked', this.checked);
    // });
    // $("#checkAllDelete").click(function () {
    // $('input:checkbox#checkDel').not(this).prop('checked', this.checked);
    // });

    var elems = document.getElementsByClassName('hapus');
    var confirmIt = function(e) {
        if (!confirm('Apakah anda yakin untuk menghapus?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }

    function del0() {
        var number = document.getElementById('num').value;
        if (number == 0) {
            document.querySelector('.hapus').click();
            number = 1;
        }
    }
    </script>
</body>

</html>