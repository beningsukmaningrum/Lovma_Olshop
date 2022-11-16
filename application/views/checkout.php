    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-12">
    				<div class="breadcrumb__links">
    					<a href="./index.html"><i class="fa fa-home"></i> Home</a>
    					<span>Shopping cart</span>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
    	<div class="container">
    		<!-- <div class="row">
                <div class="col-lg-12">
                    <h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="#">Have a coupon?</a> Click
                        here to enter your code.</h6>
                </div>
            </div> -->
    		<form method="post" action="<?= base_url('OT/proses_checkout/') ?>" class="checkout__form">
    			<div class="row">
    				<div class="col-lg-8">
    					<h5>Billing detail</h5>

    					<div class="row">
    						<!-- <div class="col-lg-6 col-md-6 col-sm-6"> -->
    						<div class="col-lg-12">
    							<div class="checkout__form__input">
    								<p>Name <span>*</span></p>
    								<input type="text" class="form-control" value="<?php echo $user['nama_lengkap'] ?>">
    							</div>
    						</div>
    						<!-- <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Last Name <span>*</span></p>
                                    <input type="text">
                                </div>
                            </div> -->
    						<div class="col-lg-12">
    							<!-- <div class="checkout__form__input">
                                    <p>Country <span>*</span></p>
                                    <input type="text">
                                </div> -->
    							<div class="checkout__form__input">
    								<p>Address <span>*</span></p>
    								<input type="text" placeholder="Street Address" class="form-control" value="<?php echo $user['alamat'] ?>">
    								<!-- <input type="text" placeholder="Apartment. suite, unite ect ( optinal )"> -->
    							</div>
    							<!-- <div class="checkout__form__input">
                                    <p>Town/City <span>*</span></p>
                                    <input type="text">
                                </div>
                                <div class="checkout__form__input">
                                    <p>Country/State <span>*</span></p>
                                    <input type="text">
                                </div>
                                <div class="checkout__form__input">
                                    <p>Postcode/Zip <span>*</span></p>
                                    <input type="text">
                                </div> -->
    						</div>
    						<div class="col-lg-6 col-md-6 col-sm-6">
    							<div class="checkout__form__input">
    								<p>Phone <span>*</span></p>
    								<input type="text" class="form-control" value="<?php echo $user['no_tlp'] ?>">
    							</div>
    						</div>
    						<div class="col-lg-6 col-md-6 col-sm-6">
    							<div class="checkout__form__input">
    								<p>Email <span>*</span></p>
    								<input type="text" class="form-control" value="<?php echo $user['email'] ?>">
    							</div>
    						</div>
    						<div class="col-lg-12">
    							<!-- <div class="checkout__form__checkbox">
                                    <label for="acc">
                                        Create an acount?
                                        <input type="checkbox" id="acc">
                                        <span class="checkmark"></span>
                                    </label>
                                    <p>Create am acount by entering the information below. If you are a returing
                                        customer login at the <br />top of the page</p>
                                </div> -->
    							<!-- <div class="checkout__form__input">
                                    <p>Account Password <span>*</span></p>
                                    <input type="text">
                                </div> -->
    							<!-- <div class="checkout__form__checkbox">
                                    <label for="note">
                                        Note about your order, e.g, special noe for delivery
                                        <input type="checkbox" id="note">
                                        <span class="checkmark"></span>
                                    </label>
                                </div> -->
								<div class="checkout__form__input">
									<p>Pembayaran<span>*</span></p>
									<select name="payment" id="payment" class="btn btn-primary btn-lg dropdown-toggle">
										<option value="BRI">BRI</option>
										<option value="BNI">BNI</option>
										<option value="BCA">BCA</option>
										<option value="Mandiri">Mandiri</option>
									</select>

								</div>
    							<div class="checkout__form__input">
    								<p>Oder notes <span>*</span></p>
    								<input type="text" placeholder="Note about your order, e.g, special noe for delivery">
    							</div>

    						</div>
    					</div>

    				</div>
    				<div class="col-lg-4">
    					<div class="checkout__order">
    						<h5>Your order</h5>

    						<div class="checkout__order__product">

    							<ul>

    								<li>
    									<span class="top__text">Product</span>
    									<span class="top__text__right">Total</span>
    								</li>
    								<?php foreach ($this->cart->contents() as $items) : ?>

    									<li><?php echo $items['name'] ?><span>Rp <?php echo number_format($items['price'], 0, ',', '.') ?></span></li>
    									<!-- <li>02. Zip-pockets pebbled<br /> tote briefcase <span>$ 170.0</span></li>
                                    <li>03. Black jean <span>$ 170.0</span></li>
                                    <li>04. Cotton shirt <span>$ 110.0</span></li> -->
    								<?php endforeach; ?>
    							</ul>

    						</div>

    						<div class="checkout__order__total">
    							<ul>
    								<!-- <li>Subtotal <span>$ 750.0</span></li> -->
    								<!-- <li>Total <span>$ 750.0</span></li> -->
    								<li>Total <span>
    										<?php
											$grand_total = 0;
											if ($keranjang = $this->cart->contents()) {
												foreach ($keranjang as $item) {
													$grand_total = $grand_total + $item['subtotal'];
												}
												echo "Rp. " . number_format($grand_total, 0, ',', '.');

											?>
    									</span></li>
    							</ul>
    						</div>
    						<div class="checkout__order__widget">
    							<label for="o-acc">
    								Create an acount?
    								<input type="checkbox" id="o-acc">
    								<span class="checkmark"></span>
    							</label>
    							<p>Create am acount by entering the information below. If you are a returing customer
    								login at the top of the page.</p>
    							<label for="check-payment">
    								Cheque payment
    								<input type="checkbox" id="check-payment">
    								<span class="checkmark"></span>
    							</label>
    							<label for="paypal">
    								PayPal
    								<input type="checkbox" id="paypal">
    								<span class="checkmark"></span>
    							</label>
    						</div>
    						<button type="submit" class="site-btn">Place oder</button>
    					</div>
    				</div>
    			</div>
    		</form>

    	<?php
											} else {
												echo "Keranjang Anda Masih Kosong";
											}
		?>

    	</div>
    </section>
