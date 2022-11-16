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
                        <figure><img src="<?php echo base_url() ?>assets/img/profil-edit.png" alt="sing up image"></figure>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Edit Profil</h2>
                        <?= form_open_multipart('user/edit_profil'); ?>
                        <div class="form-group">
                            <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="username" id="username" placeholder="Username" value="<?= $user['username']; ?>" readonly />
                        </div>
                        <div class="form-group">
                            <label for="nama_lengkap"><i class="zmdi zmdi-account-circle material-icons-name"></i></label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Full Name" value="<?= $user['nama_lengkap']; ?>" />
                            <?= form_error('nama_lengkap', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email material-icons-name"></i></label>
                            <input type="text" name="email" id="email" placeholder="Email" value="<?= $user['email']; ?>" />
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="alamat"><i class="zmdi zmdi-home material-icons-name"></i></label>
                            <input type="text" name="alamat" id="alamat" placeholder="Address" value="<?= $user['alamat']; ?>" />
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="no_tlp"><i class="zmdi zmdi-phone material-icons-name"></i></label>
                            <input type="text" name="no_tlp" id="no_tlp" placeholder="Number Phone" value="<?= $user['no_tlp']; ?>" />
                            <?= form_error('no_tlp', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir"><i class="zmdi zmdi-calendar material-icons-name"></i></label>
                            <input type="text" name="tgl_lahir" id="tgl_lahir" placeholder="Date of Birth" value="<?= $user['tgl_lahir']; ?>" />
                            <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Edit</button>
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