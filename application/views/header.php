<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Lovma Template">
    <meta name="keywords" content="Lovma, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lovma Beauty</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css" type="text/css">
</head>

<body>
    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <a href="<?php echo base_url() ?>OT/index"><img src="<?php echo base_url() ?>assets/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="<?php echo base_url('OT/index_login') ?>">Home</a></li>
                            <li><a href="<?php echo base_url('OT/product_login') ?>">Product</a></li>
                            <li><a href="<?php echo base_url('OT/about_login') ?>">About Us</a></li>
                            <li><a href="<?php echo base_url('OT/contact_login') ?>">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        <div class="header__right__auth">
                            <a href="<?php echo base_url() ?>OT/login">Login</a>
                            <a href="<?php echo base_url() ?>OT/register">Register</a>
                        </div>

                        <ul class="header__right__widget">
                            <li>
                                <!-- <?php $keranjang = 'keranjang' . $this->cart->total_items() . 'items' ?>
                                <?php echo anchor('OT/shop_cart', $keranjang)  ?> -->
                                <a href="#">
                                    <span class="icon_bag_alt" <?php $keranjang = '' . $this->cart->total_items() . '' ?>></span>
                                    <div class="tip"> <?php echo $keranjang ?></div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->