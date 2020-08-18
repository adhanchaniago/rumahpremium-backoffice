<?php
date_default_timezone_set("Asia/Jakarta");
if(date('H') < 12)
{
	$day_status = 'Pagi';
	echo '<div class="container-fluid h-100" style="background: radial-gradient(ellipse at bottom, #FFF 0%, blue 100%); overflow: hidden;">';
}
elseif (date('H') > 11 && date('H') < 15)
{
	$day_status = 'Siang';
	echo '<div class="container-fluid h-100" style="background: radial-gradient(ellipse at bottom, #FFF 0%, blue 100%); overflow: hidden;">';
}
elseif (date('H') > 15 && date('H') < 18)
{
	$day_status = 'Sore';
	echo '<div class="container-fluid h-100" style="background: radial-gradient(ellipse at bottom, #FFF 0%, blue 100%); overflow: hidden;">';	
}
else
{
	$day_status = 'Malam';
	echo '<div class="container-fluid h-100" style="min-height: 100vh; background: radial-gradient(ellipse at bottom, #1b2735 0%, #090a0f 100%); overflow: hidden;">';
}
?>
	<div id="stars"></div>
	<div id="stars2"></div>
	<div id="stars3"></div>
	<div class="row">
		<div class="col-4 offset-4">
			<div class="card my-4 position-relative animate-up" style="z-index: 1000;">
				<div class="card-body  align-items-center h-100">
					<div class="text-center">
	                    <img src="assets/logo.png" width="60">
	                    <h5 class="mt-3 mb-2"><strong>Hi, Selamat <?php echo $day_status; ?></strong></h5>
	                    <p class="mb-4 text-muted fontsize-smaller"><hr>Kamu bisa buat toko online milikmu sendiri dengan gratis</p>
	                </div>
	                <hr>
	                <div class="px-5 pt-2">
						<?php echo form_open('register/user',array('class'=>'register-validation','novalidate'=>'novalidate')); ?>
							<div class="form-group fontsize-small">
								<label for="input-fullname">Nama Lengkap</label>
								<input type="text" class="form-control validate" id="input-fullname" placeholder="Isikan sesuai KTP" name="user_fullname" data-validate="validation/required" required>
								<div class="invalid-feedback">Nama lengkap wajib diisi</div>
							</div>
							<div class="form-group fontsize-small">
								<label for="input-email">Email</label>
								<input type="email" class="form-control validate" id="input-email" placeholder="user@gmail.com" name="user_email" data-validate="register/email_check" required>
								<div class="invalid-feedback">Email tidak valid atau sudah pernah digunakan</div>
							</div>
							<div class="form-group fontsize-small">
								<label for="input-password">Password</label>
								<input type="password" class="form-control password validate" id="input-password" placeholder="******" name="user_password" data-validate="validation/password" required>
								<div class="invalid-feedback">Password wajib diisi minimal 6 karakter</div>
							</div>
							<div class="form-group fontsize-smaller">
								<label for="input-repassword">Ulangi Password</label>
								<input type="password" class="form-control showpasswordconf password passconf validate" id="input-repassword" placeholder="******" name="passconf" data-validate="validation/required" required>
								<div class="invalid-feedback">Password tidak sama</div>
							</div>
							<button class="btn btn-block btn-primary btn-action">Daftar</button>
						<?php echo form_close(); ?>
					</div>
					<hr>
					<div class="my-4 text-center">
						<small>Sudah punya akun? <a href="<?php echo base_url(); ?>login">Masuk di sini</a></small>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>