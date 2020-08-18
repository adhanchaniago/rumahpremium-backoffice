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
	
	<div class="row align-items-center h-100">
		<div class="col-4 offset-4">
			<div class="card">
				<div class="card-body">
					<div class="text-center">
	                    <h5>Admin Rumah Premium</h5>
	                    <hr>
	                    <h5 class="mt-3 mb-2"><strong>Selamat <?php echo $day_status; ?></strong></h5>
	                    <h6 class="mb-4">Selamat datang kembali</h6>
	                </div>
	                <hr>
	                <div class="px-5 pt-2">
						<?php echo form_open('login/member',array('class'=>'login-validation','novalidate'=>'novalidate')); ?>
							<div class="form-group fontsize-small">
								<label for="input-email">Email / Nomor Handphone</label>
								<input type="text" class="form-control user-login" id="input-email" name="user_access"  required>
								<div class="invalid-feedback invalid-user-login">Email / Nomor Handphone tidak valid</div>
							</div>
							<div class="form-group fontsize-small">
								<label for="input-password">Password</label>
								<input type="password" class="form-control validate" id="input-password" data-validate="validation/required" name="user_password" required>
								<div class="invalid-feedback">Password tidak sesuai</div>
							</div>
							<input type="hidden" name="type">
							<button class="btn btn-block btn-primary btn-login">Masuk</button>
						<?php echo form_close(); ?>
					</div>
					<hr>
					<div class="my-4 text-center">
						<a href="mailto:yodha.project@gmail.com">
							<small>Gagal Login?</small>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>