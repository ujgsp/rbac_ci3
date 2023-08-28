<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <?= $this->session->flashdata('message'); ?>

        <form action="<?= base_url('auth'); ?>" method="post">
            <div class="input-group mb-2">
                <input type="email" class="form-control" placeholder="Email" name="email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
            <div class="input-group mb-2">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" id="remember">
                        <label for="remember">
                            Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    &nbsp;
                </div>
                <!-- /.col -->
            </div>


            <div class="social-auth-links text-center mb-3">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
        </form>
        <!-- /.social-auth-links -->

        <p class="mb-1 text-center">
            <a href="<?= base_url('auth/forgotpassword'); ?>">Forgot Password?</a>
        </p>
        <p class="mb-0 text-center">
            <a href="<?= base_url('auth/registration'); ?>" class="text-center">Create an Account!</a>
        </p>
    </div>
    <!-- /.login-card-body -->
</div>