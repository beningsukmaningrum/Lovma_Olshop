    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container-fluid">

        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="section-title">
                        <h4>New product</h4>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".fashion">Fashion</li>
                        <li data-filter=".hijab">Hijab</li>
                    </ul>
                </div>
            </div>
            <div class="row property__gallery">
                <?php foreach ($barang as $brg) : ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mix <?= $brg->nama_jenis ?>">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="<?= base_url('assets/uploads/produk/') . $brg->foto_produk ?>">
                                <div class="label new">New</div>
                                <ul class="product__hover">
                                    <li><a href="<?php echo base_url('assets/uploads/produk/') . $brg->foto_produk ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                                    <li><?php echo anchor('OT/tambah_keranjang/' . $brg->id_produkdetail, '<span class="icon_bag_alt"></span>') ?></li>

                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="<?php echo base_url('OT/produk_detail/' . $brg->id_produkdetail); ?>"><?php echo $brg->nama_produk ?></a></h6>
                                <!-- <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div> -->
                                <div class="product__price">Rp. <?php echo number_format($brg->harga_produk, 0, ',', '.') ?></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Banner Section Begin -->
    <section class="banner set-bg" data-setbg="<?php echo base_url() ?>assets/img/banner/banner-1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-8 m-auto">
                    <div class="banner__slider owl-carousel">
                        <div class="banner__item">
                            <div class="banner__text">
                                <span>The Chloe Collection</span>
                                <h1>The Project Jacket</h1>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                        <div class="banner__item">
                            <div class="banner__text">
                                <span>The Chloe Collection</span>
                                <h1>The Project Jacket</h1>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                        <div class="banner__item">
                            <div class="banner__text">
                                <span>The Chloe Collection</span>
                                <h1>The Project Jacket</h1>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Services Section Begin -->
    <section class="services spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-car"></i>
                        <h6>Free Shipping</h6>
                        <p>For all oder over $99</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-money"></i>
                        <h6>Money Back Guarantee</h6>
                        <p>If good have Problems</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-support"></i>
                        <h6>Online Support 24/7</h6>
                        <p>Dedicated support</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="services__item">
                        <i class="fa fa-headphones"></i>
                        <h6>Payment Secure</h6>
                        <p>100% secure payment</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->