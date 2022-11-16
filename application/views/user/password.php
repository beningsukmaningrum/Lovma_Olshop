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
                        <h2 class="form-title">Change Password</h2>
                        <?= $this->session->flashdata('message'); ?>
                        <form action="<?= base_url('user/password'); ?>" method="post">
                            <div class="form-group">
                                <label for="password_skrg"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password_skrg" id="password_skrg" placeholder="Current Password" />
                                <?= form_error('password_skrg', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="new_password1"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="new_password1" id="new_password1" placeholder="New Password" />
                                <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="new_password2"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="new_password2" id="new_password2" placeholder="Repeat your password" />
                                <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Change Password" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="<?php echo base_url() ?>assets/img/password.png" alt="sing up image"></figure>

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