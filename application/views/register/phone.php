<!-- <div class="container-fluid" style="  background: radial-gradient(ellipse at bottom, #FFF 0%, blue 100%); overflow: hidden;"> -->
<div class="container-fluid" style="height: 100vh; background: radial-gradient(ellipse at bottom, #1b2735 0%, #090a0f 100%); overflow: hidden;">
	<div id="stars"></div>
	<div id="stars2"></div>
	<div id="stars3"></div>
	<div class="row">
		<div class="col-4 offset-4 mt-3">
			<div class="card my-4 position-relative animate-up" style="z-index: 1000;">
				<div class="card-body">
					<div class="otp-phone">
						<div class="text-center">
		                    <img src="https://tokoadmin.tokotalk.com/images/verify_phone1.svg" width="180" class="my-3">
		                    <h5 class="mt-3 mb-2"><strong>Verifikasi Nomor Handphone</strong></h5>
		                    <p class="mb-4 fontsize-smaller text-muted">Kode verifikasi akan kami kirimkan melalui SMS</p>
		                </div>
		                <hr>
		                <div class="px-5 pt-2">
		                	<form class="otp-validation" novalidate>
								<div class="form-group fontsize-smaller">
									<label for="input-phone">Nomor Handphone</label>
									<input type="text" class="form-control input-phone" id="input-phone" placeholder="Contoh : 085643816130" name="otp_phone" required>
									<input type="hidden" class="input-user-code" value="<?php echo $user_code; ?>">
									<div class="invalid-feedback validate-empty">Nomor handphone belum diisikan dengan benar</div>
									<div class="invalid-feedback validate-reuse d-none">Nomor handphone sudah pernah digunakan</div>
								</div>
							</form>
							<p class="text-center fontsize-smallest d-none otp-counter">Kamu dapat mengirim ulang setelah <br><strong>30</strong> detik</p>
							<button class="btn btn-block btn-primary btn-otp">Kirim Kode Verifikasi</button>
						</div>
						<hr>
						<div class="my-4 text-center">
							<small>Kesulitan menerima kode verifikasi? <a href="<?php echo base_url(); ?>login">Kami siap membantu</a></small>
						</div>
					</div>
					<div class="otp-verification d-none">
						<div class="text-center">
		                    <img src="https://tokoadmin.tokotalk.com/images/verify_phone2.svg" width="180" class="my-3">
		                    <h5 class="mt-3 mb-2"><strong>Kode verifikasi telah kami kirimkan ke</strong></h5>
		                    <h6 class="otp-phone-label"><strong></strong></h6>
		                    <p class="mb-4 fontsize-smaller text-muted">Masukkan 6 digit kode di bawah ini</p>
		                </div>
		                <hr>
		                <div class="px-5 pt-2">
							<?php echo form_open('register/verification',array('class'=>'otp-validation','novalidate'=>'novalidate')); ?>
								<div class="form-group fontsize-smaller">
									<input type="text" class="form-control validate text-center input-otp" placeholder="******" name="otp_code" data-validate="register/otp_code_check" maxlength="6" required>
									<input type="hidden" name="user_code" value="<?php echo $user_code; ?>">
									<input type="hidden" name="user_phone">
									<div class="invalid-feedback text-center">Kode yang kamu masukkan belum sesuai</div>
								</div>
								<button class="btn btn-block btn-primary btn-action">Verifikasi</button>
							<?php echo form_close(); ?>
						</div>
						<hr>
						<div class="my-4 text-center">
							<small><a class="link-phone">Ubah Nomor Handphone</a></small>
						</div>
					</div>
					<div class="otp-limit d-none">
						<div class="text-center">
		                    <img src="https://tokoadmin.tokotalk.com/images/verify_phone2.svg" width="180" class="my-3">
		                    <h5 class="mt-3 mb-2"><strong>Limit pengiriman kode sudah habis</strong></h5>
		                    <p class="mb-4 fontsize-smaller text-muted">Mohon kontak pusat bantuan untuk mendaftarkan nomor handphone kamu</p>
		                </div>
						<hr>
						<div class="my-4 text-center">
							<small><a href="#">Pusat Bantuan</a></small>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>