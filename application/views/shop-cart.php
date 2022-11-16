    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="<?php echo base_url('OT/index') ?>"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($this->cart->contents() as $items) : ?>
                                    <tr>
                                        <td class="cart__product__item">
                                            <img src="<?php echo base_url('assets/uploads/produk/') . $items['foto_produk']; ?>" style="width:90px;height:90px" alt="">
                                            <div class="cart__product__item__title">
                                                <h6><?php echo $items['name'] ?></h6>
                                                <!-- <div class="rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div> -->
                                            </div>
                                        </td>
                                        <td class="cart__price">Rp <?php echo number_format($items['price'], 0, ',', '.') ?></td>
                                        <td class="cart__quantity"><?php echo $items['qty'] ?></td>
                                        <td class="cart__total">Rp <?php echo number_format($items['subtotal'], 0, ',', '.') ?></td>
                                        <td><a href="<?php echo base_url('OT/hapus_cart/' . $items['rowid']) ?>" class="primary-btn"><span class="icon_close"></span></a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <a href="<?php echo base_url('OT/index') ?>" class="primary-btn">Continue Shopping</a>
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>Cart total</h6>
                        <ul>
                            <li>TOTAL <span>Rp <?php echo number_format($this->cart->total(), 0, ',', '.') ?></span></li>
                        </ul>
                        <a href="checkout/" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Cart Section End -->