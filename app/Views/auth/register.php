<?= $this->extend('template/auth_template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row vertical-offset-100">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Sign Up</h3>
                </div>
                <div class="panel-body">
                    <form accept-charset="UTF-8" action="<?= base_url('/auth/saveRegister') ?>" role="form" method="POST">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" placeholder="E-mail" name="email" type="email" value="<?= old('email') ?>">
                                <div class="invalid-feedback">
                                    <?= ($validation->getError('email')); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="form-control <?= ($validation->hasError('fullname')) ? 'is-invalid' : ''; ?>" placeholder="Full Name" name="fullname" type="text" value="<?= old('fullname') ?>">
                                <div class="invalid-feedback">
                                    <?= ($validation->getError('fullname')); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" placeholder="Username" name="username" type="text" value="<?= old('username') ?>">
                                <div class="invalid-feedback">
                                    <?= ($validation->getError('username')); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" placeholder="Password" name="password" type="password" value="">
                                <div class="invalid-feedback">
                                    <?= ($validation->getError('password')); ?>
                                </div>
                            </div>
                            <input class="btn btn-lg btn-warning btn-block" type="submit" value="Daftar">
                            <br>

                            <div class="text-center w-full p-t-23">
                                <span class="txt1">
                                    Already have an account?
                                </span>
                                <a href="<?= base_url('/auth/login') ?>" class="txt2">
                                    Log in
                                </a>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>