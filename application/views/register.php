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

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Register</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="nama_lengkap"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Full Name" value="<?= set_value('nama_lengkap'); ?>" />
                                <?= form_error('nama_lengkap', '<small class="text-danger pl-3">', '</small>'); ?>

                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="text" name="email" id="email" placeholder="Email" value="<?= set_value('email'); ?>" />
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="alamat"><i class="zmdi zmdi-home"></i></label>
                                <input type="text" name="alamat" id="alamat" placeholder="Address" value="<?= set_value('alamat'); ?>" />
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="no_tlp"><i class="zmdi zmdi-phone"></i></label>
                                <input type="text" name="no_tlp" id="no_tlp" placeholder="Number Phone" value="<?= set_value('no_tlp'); ?>" />
                                <?= form_error('no_tlp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir"><i class="zmdi zmdi-calendar"></i></label>
                                <input type="date" name="tgl_lahir" id="tgl_lahir" placeholder="Date of Birth" value="<?= set_value('tgl_lahir'); ?>" />
                                <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account"></i></label>
                                <input type="text" name="username" id="username" placeholder="Username" value="<?= set_value('username'); ?>" />
                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password1" id="password1" placeholder="Password" />
                                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="password2" id="password2" placeholder="Repeat your password" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="<?php echo base_url() ?>assets/img/signup-image.jpg" alt="sing up image"></figure>
                        <a href="<?php echo base_url() ?>OT/login" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>


    </div>

    <!-- JS -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>