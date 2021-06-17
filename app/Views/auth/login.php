<?= $this->extend('template/auth_template'); ?>

<?= $this->section('content'); ?>

<div class="container">
	<div class="row vertical-offset-100">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">InstaApp</h3>
				</div>
				<div class="panel-body">

					<?php if (session()->getFlashdata('msg') == TRUE) : ?>
						<div class="alert alert-success" role="alert">
							<?= session()->getFlashdata('msg') ?>
						</div>
					<?php endif; ?>

					<?php if (session()->getFlashdata('errlog') == TRUE) : ?>
						<div class="alert alert-danger" role="alert">
							<?= session()->getFlashdata('errlog') ?>
						</div>
					<?php endif; ?>

					<form accept-charset="UTF-8" action="<?= base_url('/auth/authLogin') ?>" role="form" method="POST">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" id="username" name="username" value="<?= old('username') ?>" type="text" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" id="password" name="password" type="password" value="" required>
							</div>
							<input class="btn btn-lg btn-primary btn-block" type="submit" value="Log In" id="login">
							<br>
							<div class="text-center w-full p-t-23">
								<span class="txt1">
									Dont have an account?
								</span>
								<a href="<?= base_url('/auth/register') ?>" class="txt2">
									Sign Up
								</a>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(function() {
		$('#login').attr('disabled', true);
		$('#password').change(function() {
			if ($('#username').val() != '' && $('#password').val() != '') {
				$('#login').attr('disabled', false);
			} else {
				$('#login').attr('disabled', true);
			}
		});

		$('#username').change(function() {
			if ($('#username').val() != '' && $('#password').val() != '') {
				$('#login').attr('disabled', false);
			} else {
				$('#login').attr('disabled', true);
			}
		});
	});
</script>

<?= $this->endSection(); ?>