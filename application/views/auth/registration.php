<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Create an Account!</p>

        <?= $this->session->flashdata('message'); ?>

        <form action="<?= base_url('auth/registration'); ?>" method="post">
            <div class="input-group mb-2">
                <input type="text" class="form-control" placeholder="Fullname" name="name" value="<?= set_value('name'); ?>">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
            
            <div class="input-group mb-2">
                <input type="email" class="form-control" placeholder="Email" name="email" value="<?= set_value('email'); ?>">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>

            <div class="input-group mb-2">
                <input type="password" class="form-control" placeholder="Password" name="password1">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>

            <div class="input-group mb-2">
                <input type="password" class="form-control" placeholder="Retype Password" name="password2">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>


            <div class="social-auth-links text-center mb-3">
                <button type="submit" class="btn btn-primary btn-block">
                Register Account
                </button>
            </div>
        </form>
        <!-- /.social-auth-links -->

        <p class="mb-1 text-center">
            <a href="<?= base_url('auth/forgotpassword'); ?>">Forgot Password?</a>
        </p>
        <p class="mb-0 text-center">
            <a href="<?= base_url('auth'); ?>" class="text-center">Already have an account? Login!</a>
        </p>
    </div>
    <!-- /.login-card-body -->
</div>