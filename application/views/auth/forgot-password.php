<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Forgot your password ?</p>

        <?= $this->session->flashdata('message'); ?>

        <form action="<?= base_url('auth/forgotpassword'); ?>" method="post">
            <div class="input-group mb-2">
                <input type="email" class="form-control" placeholder="Email" name="email" value="<?= set_value('email'); ?>">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>


            <div class="social-auth-links text-center mb-3">
                <button type="submit" class="btn btn-primary btn-block">
                Reset Password
                </button>
            </div>
        </form>
        <!-- /.social-auth-links -->

        <p class="mb-1 text-center">
            <a href="<?= base_url('auth'); ?>">Back to login</a>
        </p>
    </div>
    <!-- /.login-card-body -->
</div>