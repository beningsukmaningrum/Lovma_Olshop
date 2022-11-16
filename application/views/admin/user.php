<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Management User</h4>
                        <p class="card-category">Melihat data user</p>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped" style="text-align: center;">
                            <thead>
                                <th>No.</th>
                                <th>ID User</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Addres</th>
                                <th>Phone</th>
                                <th>Date of Birth</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Status</th>
                                <th colspan="3">Aksi</th>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($user as $usr) :  ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $usr->id_user ?></td>
                                        <td><?php echo $usr->nama_lengkap ?></td>
                                        <td><?php echo $usr->email ?></td>
                                        <td><?php echo $usr->alamat ?></td>
                                        <td><?php echo $usr->no_tlp ?></td>
                                        <td><?php echo $usr->tgl_lahir ?></td>
                                        <td><?php echo $usr->username ?></td>
                                        <td><?php echo $usr->level_akses ?></td>
                                        <td><?php echo $usr->status ?></td>
                                        <td>
                                            <?php echo anchor('admin/hapus_user/' . $usr->id_user, '<button class="btn btn-danger btn-fill pull-right"><i class="fa fa-trash"></i></button>') ?>
                                            <?php echo anchor('admin/update_user/' . $usr->id_user, '<button class="btn btn-warning btn-fill pull-right"><i class="fa fa-edit"></i></button>') ?>
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