<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Web GIS</title>

    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/favicon.ico">

    <!-- Font Icon -->
    <!-- <link rel="stylesheet" href="../../assets/login_register_assets/fonts/material-icon/css/material-design-iconic-font.min.css"> -->

    <!-- Main css -->
    <!-- <link rel="stylesheet" href="../../assets/login_register_assets/css/style.css">
</head>
<body>
    <div style="color: red;margin-bottom: 15px;">
        <?php
        // Cek apakah terdapat session nama message
        if($this->session->flashdata('message')){ // Jika ada
        echo $this->session->flashdata('message'); // Tampilkan pesannya
        }
        ?>
    </div>
    <div class="main" style=" -->
    <!-- background: url(<?php echo base_url('assets/images/gis.jpg');?>) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;">

        <!-- Sing in  Form -->
        <!-- <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="../../assets/login_register_assets/images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="<?php echo base_url('index.php/home/register') ?>" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <form method="POST" class="register-form" id="login-form" action="<?php echo base_url('index.php/auth/login') ?>" onSubmit="return validasi()">
                            <div class="form-group">
                                <label for="your_username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="Your Username" required/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" required/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                    </div>
                </div> -->
            <!-- </div>
        </section>
    </div> --> 

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
        function validasi() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            if (username != "" && password!="") {
                return true;
            }else{
                alert('Username and Password must be filled!');
                return false;
            }
        }
    </script>
<!-- </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
<!-- </html>
<!DOCTYPE html>
<html lang="en"> --> 

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Pelayanan Publik - Kabupaten Bandung </title>
  <!-- plugins:css -->
  <!-- <?=base_url('')?>/assets/vendors/feather/feather.css -->
  <link rel="stylesheet" href="<?=base_url('')?>/assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="<?=base_url('')?>/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?=base_url('')?>/assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?=base_url('')?>/assets/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="<?=base_url('')?>/assets/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="<?=base_url('')?>/assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?=base_url('')?>/assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?=base_url('')?>/images/logo.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="<?=base_url('')?>/images/logo.png" alt="logo">
              </div>
              <h4>Silahkan Masukan Akun Anda</h4>
              <h6 class="fw-light">Login.</h6>
              <form class="pt-3" method="POST" class="register-form" id="login-form" action="<?php echo base_url('index.php/auth/login') ?>" onSubmit="return validasi()">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="username" id="username" placeholder="Your Username" required/>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Password" required/>
                </div>
                <div class="mt-3">
                <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="signin" id="signin" class="form-submit" value="Log in"/>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Lupa password?</a>
                </div>
                <div class="text-center mt-4 fw-light">
                 Belum Punya Akun? <a href="<?=base_url('index.php/home/register')?>" class="text-primary">Daftar</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?=base_url('')?>/assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?=base_url('')?>/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?=base_url('')?>/assets/js/off-canvas.js"></script>
  <script src="<?=base_url('')?>/assets/js/hoverable-collapse.js"></script>
  <script src="<?=base_url('')?>/assets/js/template.js"></script>
  <script src="<?=base_url('')?>/assets/js/settings.js"></script>
  <script src="<?=base_url('')?>/assets/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>

