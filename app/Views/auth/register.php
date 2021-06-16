<?= $this->extend('template/auth_template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row vertical-offset-100">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Daftar Sekarang!</h3>
                </div>
                <div class="panel-body">
                    <form accept-charset="UTF-8" action="<?= base_url('/auth/saveRegister') ?>" role="form" method="POST">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control " placeholder="E-mail" name="email" type="email" value="<?= old('email') ?>" required>
                                <div class="invalid-feedback">

                                </div>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Nama Lengkap" name="fullname" type="text" value="<?= old('fullname') ?>" required>
                                <div class="invalid-feedback">
                                    Tidak boleh kosong
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="username" type="text" value="<?= old('username') ?>" required>
                                <div class="invalid-feedback">

                                </div>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                                <div class="invalid-feedback">
                                    Tidak boleh kosong
                                </div>
                            </div>
                            <input class="btn btn-lg btn-warning btn-block" type="submit" value="Daftar">
                            <br>

                            <div class="text-center w-full p-t-23">
                                <span class="txt1">
                                    Sudah punya akun?
                                </span>
                                <a href="<?= base_url('/auth/login') ?>" class="txt2">
                                    Login disini
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