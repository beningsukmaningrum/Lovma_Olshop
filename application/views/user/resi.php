<body>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Recipent</title>

	<!-- Font Icon -->
	<!-- <link rel="stylesheet" href="assets/fonts/material-icon/css/material-design-iconic-font.min.css"> -->
	<link rel="stylesheet" href="http://172.17.0.3/Proyek3-Lovma_4/assets/fonts/material-icon/css/material-design-iconic-font.min.css" type="text/css">

	<!-- Main css -->
	<link rel="stylesheet" href="http://172.17.0.3/Proyek3-Lovma_4/assets/css/style_login.css" type="text/css">
	<!-- <link rel="stylesheet" href="assets/css/style_login.css"> -->
	<div class="main">
		<!-- Sing in  Form -->
		<section class="checkout spad">
			<div class="container">
				<!-- <div class="row">
                <div class="col-lg-12">
                    <h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="#">Have a coupon?</a> Click
                        here to enter your code.</h6>
                </div>
            </div> -->
				<div class="row">

					<div class="col-lg-3"></div>
					<div class="col-lg-6">
						<div class="checkout__order">
							<h5>Recipent</h5>

							<div class="checkout__order__product">

								<ul>

									<li>
										<span class="top__text">Nama</span>
										<div style="font-size: 16px;color: #111111;float: right;">
											<?= $user['nama_lengkap'] ?></span>
										</div>
									</li>
								</ul>

							</div>
							<div class="checkout__order__product">

								<ul>

									<li>
										<span class="top__text">Email</span>
										<div style="font-size: 16px;color: #111111;float: right;">
											<?= $user['email'] ?></span>
										</div>
									</li>
								</ul>

							</div>
							<div class="checkout__order__product">

								<ul>

									<li>
										<span class="top__text">Alamat</span>
										<div style="font-size: 16px;color: #111111;float: right;">
											<?= $user['alamat'] ?></span>
										</div>
									</li>
								</ul>

							</div>
							<div class="checkout__order__product">

								<ul>

									<li>
										<span class="top__text">Phone</span>
										<div style="font-size: 16px;color: #111111;float: right;">
											<?= $user['no_tlp'] ?></span>
										</div>
									</li>
								</ul>

							</div>

							<h5>Order</h5>

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
							

                            <div class="checkout__order__product">

                                <ul>

                                    <li>
                                        <span class="top__text">Payment</span>
                                    </li>

                                        <li><?=$_POST['payment']; ?><span> <?php 
										if ($_POST['payment'] == 'BRI') {
											$norek = "283746372918374";
										}elseif ($_POST['payment'] == 'BCA') {
											$norek = "1837463928";
										}elseif ($_POST['payment'] == 'BNI') {
											$norek = "8364629184";
										}elseif ($_POST['payment'] == 'Mandiri') {
											$norek = "7648301736382";
										}else {
											$norek = "-";
										}
										echo($norek) 
										?></span></li>
                                        <!-- <li>02. Zip-pockets pebbled<br /> tote briefcase <span>$ 170.0</span></li>
                                    <li>03. Black jean <span>$ 170.0</span></li>
                                    <li>04. Cotton shirt <span>$ 110.0</span></li> -->
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
                                                };
                                                echo "Rp. " . number_format($grand_total, 0, ',', '.');
											};

                                            ?>
                                        </span></li>
                                </ul>
                            </div>
						</div>
					</div>
					<div class="col-lg-3"></div>
					<div class="col-lg-6 col-md-6 col-sm-6">
                    <a href="http://localhost/Proyek3-Lovma_4/OT/index" class="primary-btn">Continue Shopping</a>
                </div>
				</div>
			</div>
		</section>

	</div>

	<!-- JS -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/js/main.js"></script>


	<!---->
</body>
