<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit User</h4>
                    </div>
                    <div class="card-body">
                        <?php foreach ($user as $usr) : ?>
                            <form method="post" action="<?php echo base_url('admin/update_user2/' . $usr->id_user) ?>">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $usr->nama_lengkap ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="email" value="<?php echo $usr->email ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control" name="alamat" value="<?php echo $usr->alamat ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Number Phone</label>
                                            <input type="text" class="form-control" name="no_tlp" value="<?php echo $usr->no_tlp ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input type="text" class="form-control" name="tgl_lahir" value="<?php echo $usr->tgl_lahir ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="level_akses" value="<?php echo $usr->username ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                <div class="clearfix"></div>
                            </form>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-body">
                    <div class="card-image">
                        <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="...">
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
            </div>
        </div>
    </div>
</div>