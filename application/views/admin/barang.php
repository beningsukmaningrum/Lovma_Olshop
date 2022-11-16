<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Management Product</h4>
                        <p class="card-category">Membuat, Memperbarui, dan Menghapus Barang</p>
                    </div>
                    <div class="container-fluid">
                        <button type="button" class="btn btn-primary btn-fill pull-right" data-toggle="modal" data-target="#tambah_barang"><i class="fa fa-plus"></i>Tambah Produk</button>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped" style="text-align: center;">
                            <thead>
                                <th>No.</th>
                                <th>ID Produk</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th colspan="3">Aksi</th>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($barang as $brg) :  ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $brg->id_produkdetail ?></td>
                                        <td><?php echo $brg->nama_produk ?></td>
                                        <td><?php echo $brg->nama_jenis ?></td>
                                        <td>
                                            <?php echo anchor('admin/hapus_barang/' . $brg->id_produkdetail, '<button class="btn btn-danger btn-fill pull-right"><i class="fa fa-trash"></i></button>') ?>
                                            <?php echo anchor('admin/update_barang/' . $brg->id_produkdetail, '<button class="btn btn-warning btn-fill pull-right"><i class="fa fa-edit"></i></button>') ?>
                                            <?php echo anchor('admin/detail_barang/' . $brg->id_produkdetail, '<button class="btn btn-primary btn-fill pull-right"><i class="fa fa-eye"></i></button>') ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() . 'admin/tambah_barang'; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk">
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control" name="harga_produk">
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="text" class="form-control" name="stok_produk">
                    </div>
                    <div class="form-group">
                        <label>Jenis Produk</label>
                        <select class="form-control" name="jenis_produk" aria-label=".form-select-lg example">
                            <option value="">----------------</option>
                            <?php foreach ($jenis_produk as $key => $value) { ?>
                                <option value="<?php echo $value->id_jenis ?>"><?php echo $value->nama_jenis ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" name="keterangan">
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" class="form-control" name="foto_produk" id="foto_produk" for="foto_produk">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-fill btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-fill btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>