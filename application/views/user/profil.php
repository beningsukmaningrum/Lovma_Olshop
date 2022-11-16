<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <!-- <link rel="stylesheet" href="assets/fonts/material-icon/css/material-design-iconic-font.min.css"> -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/fonts/material-icon/css/material-design-iconic-font.min.css" type="text/css">

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style_login.css" type="text/css">
    <!-- <link rel="stylesheet" href="assets/css/style_login.css"> -->
</head>

<body>

    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="<?php echo base_url() ?>assets/img/profil.png" alt="sing up image"></figure>
                        <a class="zmdi zmdi-lock" href=" <?php echo base_url() ?>user/password" class="signup-image-link">&nbsp &nbsp Change password</a>
                    </div>
                    <div>
                        <h2 class="form-title">Profil</h2>
                        <center class="text-muted">Member since <?= date('d F Y', $user['date_created']); ?></center>
                        <div class="row">
                            <div class="col-lg-12">
                                <?= $this->session->flashdata('message'); ?>
                            </div>
                        </div>
                        <div>
                            <i class="zmdi zmdi-account-circle">&nbsp &nbsp &nbsp<?= $user['nama_lengkap']; ?></i>
                            </br>
                            <h5 class="zmdi zmdi-email">&nbsp &nbsp &nbsp<?= $user['email']; ?></h5>
                            </br>
                            <h5 class="zmdi zmdi-home">&nbsp &nbsp &nbsp<?= $user['alamat']; ?></h5>
                            </br>
                            <h5 class="zmdi zmdi-phone">&nbsp &nbsp &nbsp<?= $user['no_tlp']; ?></h5>
                            </br>
                            <h5 class="zmdi zmdi-calendar">&nbsp &nbsp &nbsp<?= $user['tgl_lahir']; ?></h5>
                            </br>
                            <h5 class="zmdi zmdi-account">&nbsp &nbsp &nbsp<?= $user['username']; ?></h5>
                            </br></br>
                            <div>
                                <div class="panel-heading">
                                    <a href="<?php echo base_url() ?>user/edit_profil" class="btn btn-warning">Edit Profil</a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>