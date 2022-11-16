<div class="content">
    <div class="container-fluid">
        <form method="post" action="<?php echo base_url('admin/update/' . $barang[0]->id_produkdetail) ?>" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Produk</h4>
                        </div>
                        <div class="card-body">
                            <?php foreach ($barang as $brg) : ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nama Produk</label>
                                            <input type="text" class="form-control" name="nama_produk" value="<?php echo $brg->nama_produk ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input type="text" class="form-control" name="harga_produk" value="<?php echo $brg->harga_produk ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-1">
                                        <div class="form-group">
                                            <label>Stok</label>
                                            <input type="text" class="form-control" name="stok_produk" value="<?php echo $brg->stok_produk ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <select class="form-control" name="jenis_produk" aria-label=".form-select-lg example">
                                                <option value="">----Pilih----</option>
                                                <?php foreach ($jenis_produk as $key => $value) { ?>
                                                    <option value="<?php echo $value->id_jenis ?>" <?= $value->id_jenis == $brg->id_jenis ? 'selected' : null ?>><?= $value->nama_jenis ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea rows="4" cols="80" class="form-control" name="keterangan"><?php echo $brg->keterangan ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                <div class="clearfix"></div>

                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                        <div class="card-image">
                            <!-- <img src="<?= base_url('assets/uploads/produk') . $barang[0]->id_produkdetail . '.png' ?>" alt="..."> -->
                            <img src="<?php echo base_url('assets/uploads/produk/') . $brg->foto_produk ?>" style="width:300px;height:300px" alt="...">
                        </div>


                        <div class="button-container mr-auto ml-auto">
                            <button href="#" class="btn btn-simple btn-link btn-icon">
                                <i class="fa fa-facebook-square"></i>
                            </button>
                            <button href="#" class="btn btn-simple btn-link btn-icon">
                                <i class="fa fa-twitter"></i>
                            </button>
                            <button href="#" class="btn btn-simple btn-link btn-icon">
                                <i class="fa fa-google-plus-square"></i>
                            </button>
                        </div>
                    </div>
                    <input type="file" id="uploadfile" name="uploadfile" class="btn btn-secondary btn-fill pull-right">Update Image</input>

                </div>
            </div>
        </form>
    </div>
</div>