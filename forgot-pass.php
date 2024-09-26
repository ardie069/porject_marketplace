<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <title>
        Lupa Kata Sandi
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <!-- Nucleo Icons -->
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="assets/css/argon-design-system.css?v=1.2.2" rel="stylesheet" />
    <!--<style type="text/css">
    form i {
        margin-left: -20px;
        cursor: pointer;
    }
  </style>-->
</head>

<body class="register-page">
    <div class="wrapper">
    <section class="section section-shaped section-lg">
    <div class="shape shape-style-1 bg-gradient-default">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div class="container pt-lg-7">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card bg-secondary shadow border-0">
                <div class="card-body px-lg-5 py-lg-5">
                    <div class="text-center text-muted mb-4">
                        <small>Reset untuk Lupa Kata Sandi</small>
                    </div>
        <form role="form" method="post" action="proses/aksi_lupa_pass.php" onsubmit="return checkPassword()">
            <div class="form-group">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" name="username" placeholder="Nama Pengguna" type="text">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" name="password" placeholder="Kata Sandi Baru" id="newPassword" type="password">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i type="button" class="bi bi-eye-slash" id="togglePassword1"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group focused">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" name="password"
                        placeholder="Konfirmasi Kata Sandi Baru" id="confirmPassword" type="password">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i type="button" class="bi bi-eye-slash" id="togglePassword2"></i></span>
                    </div>
                </div>
            </div>
            <div class="text-center">
              <span id = "pesan" style="color:red"> </span>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary mt-4">Reset Kata Sandi</button>
            </div>
        </form>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <a href="register.php" class="text-light"><small>Buat Akun Baru</small></a>
                </div>
                <div class="col-6 text-right">
                    <a href="login.php" class="text-light"><small>Masuk</small></a>
                </div>
            </div>
        </div>

  <!-- Modal -->
  <div class="modal fade" id="modalPesan" tabindex="-1" role="dialog" aria-labelledby="modalPesan" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <span id = "message" style="color:red"> </span>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

                </div>
            </div>
        </section>
    </div>
    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="assets/js/plugins/bootstrap-switch.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
    <script src="assets/js/plugins/moment.min.js"></script>
    <script src="assets/js/plugins/datetimepicker.js" type="text/javascript"></script>
    <script src="assets/js/plugins/bootstrap-datepicker.min.js"></script>
    <!-- Control Center for Argon UI Kit: parallax effects, scripts for the example pages etc -->
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <script src="assets/js/argon-design-system.min.js?v=1.2.2" type="text/javascript"></script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script>
    function checkPassword() {
      var password = document.getElementById('newPassword').value;
      var confirm = document.getElementById('confirmPassword').value;

      if (confirm != password){
        var field = document.getElementById("pesan");
        field.innerHTML = "Password tidak sama";
        return false;
      } else {
        alert("Password sudah diubah, silahkan login ulang");
      }
    }

    // Toggle New Password Reset
    const togglePassword1 = document.querySelector('#togglePassword1');
    const newPassword = document.querySelector('#newPassword');

    var password = true;

    togglePassword1.addEventListener('click', function() {
        if (password == true) {
            newPassword.setAttribute("type", "text");
            togglePassword1.setAttribute("class", "bi bi-eye-fill");
        } else {
            newPassword.setAttribute("type", "password");
            togglePassword1.setAttribute("class", "bi bi-eye-slash");
        }
        password = !password;
    });


    // Toggle Confirm Password Reset
    const togglePassword2 = document.querySelector('#togglePassword2');
    const confirmPassword = document.querySelector('#confirmPassword');

    var password = true;

    togglePassword2.addEventListener('click', function() {
        if (password == true) {
            confirmPassword.setAttribute("type", "text");
            togglePassword2.setAttribute("class", "bi bi-eye-fill");
        } else {
            confirmPassword.setAttribute("type", "password");
            togglePassword2.setAttribute("class", "bi bi-eye-slash");
        }
        password = !password;
    });

    window.TrackJS &&
        TrackJS.install({
            token: "ee6fab19c5a04ac1a32a645abde4613a",
            application: "argon-design-system-pro"
        });
    </script>
</body>

</html>