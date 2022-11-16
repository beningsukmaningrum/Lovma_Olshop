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
                        <figure><img src="<?php echo base_url() ?>assets/img/signin-image.jpg" alt="sing up image"></figure>
                        <a href="<?php echo base_url() ?>OT/register" class="signup-image-link">Create an account</a>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Login</h2>
                        <?= $this->session->flashdata('message'); ?>
                        <form action="<?php echo base_url() ?>OT/login" method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="Username" value="<?= set_value('username'); ?>" />
                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" />
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                            </div>
                        </form>
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