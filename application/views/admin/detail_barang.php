<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Detail Product</h4>
                    </div>

                    <div class="card-body table-full-width table-responsive">
                        <?php foreach ($barang as $brg) : ?>
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="<?php echo base_url('assets/uploads/produk/') . $brg->foto_produk ?>" width="300" height="300">
                                </div>
                                <div class="col-md-8">
                                    <table class="table">
                                        <tr>
                                            <td>Nama Produk</td>
                                            <td><strong>
                                                    <?php echo $brg->nama_produk ?>
                                                </strong></td>
                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td><strong>
                                                    Rp. <?php echo number_format($brg->harga_produk, 0, ',', '.') ?>
                                                </strong></td>
                                        </tr>
                                        <tr>
                                            <td>Stok</td>
                                            <td><strong>
                                                    <?php echo $brg->stok_produk ?>
                                                </strong></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Produk</td>
                                            <td><strong>
                                                    <?php echo  $brg->nama_jenis ?>
                                                </strong></td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td><strong>
                                                    <?php echo $brg->keterangan ?>
                                                </strong></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="modal-footer">
                            <a href="<?php echo base_url('admin/barang') ?>"><button class="btn btn-primary btn-fill pull-right">Kembali</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>