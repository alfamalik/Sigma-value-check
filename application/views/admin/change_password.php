<!-- Begin Page Content -->
<div class="container-fluid">

    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <form method="POST" action="<?= base_url('user/change_password') ?>">
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" class="form-control pwstrength" data-indicator="pwindicator" name="new_password" tabindex="2">
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">Confirm Password</label>
                            <input type="password" class="form-control" name="repeat_password" tabindex="2">
                            <?= form_error('repeat_password', '<p class="text-danger">', '</p>'); ?>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary float-right" tabindex="4">
                                Reset Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php $this->load->view('templates/footer'); ?>