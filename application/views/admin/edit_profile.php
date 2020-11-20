<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <form action="<?= base_url('user/edit_profile') ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" readonly tabindex="2" value="<?= $user['username'] ?>">
                            </div>

                            <div class="form-group row">
                                <label>Full Name</label>
                                <input type="text" class="form-control" name="name" tabindex="2" value="<?= $user['name'] ?>">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group row">
                                <label>Address</label>
                                <textarea class="form-control" name="address" rows="2"><?= $user['address'] ?></textarea>
                                <?= form_error('address', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group row">
                                <label>Birthdate</label>
                                <input type="text" class="form-control datepicker" name="birthdate" tabindex="2" value="<?= $user['birthdate'] ?>">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2">Picture</div>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="<?= base_url('assets/img/' . $user['image']); ?>" class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image">
                                                <label class="custom-file-label" for="">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary float-right">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php $this->load->view('templates/footer'); ?>