<span class="modal-close rounded-circle bg-white hover text-center shadow position-absolute" data-dismiss="modal">
	<i class="fas fa-times"></i>
</span>
<div class="modal-body">
	<h5 class="text-center mb-5">Gagal Login?</h5>
	<ul class="nav nav-tabs fontsize-smaller" id="myTab" role="tablist">
		<li class="nav-item" role="presentation">
			<a class="nav-link active" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="true">Lupa Password</a>
		</li>
		<li class="nav-item" role="presentation">
			<a class="nav-link" id="email-tab" data-toggle="tab" href="#email" role="tab" aria-controls="email" aria-selected="false">Lupa Email</a>
		</li>
		<li class="nav-item" role="presentation">
			<a class="nav-link" id="phone-tab" data-toggle="tab" href="#phone" role="tab" aria-controls="phone" aria-selected="false">Lupa Nomor Handphone</a>
		</li>
	</ul>
	<div class="tab-content" id="myTabContent">
		<div class="tab-pane fade show active" id="password" role="tabpanel" aria-labelledby="password-tab">
			<h5 class="mt-4">Lupa password?</h5>
			<p class="fontsize-smaller text-muted">Kami akan mengirimkan panduan mengubah password melalui email yang kamu daftarkan</p>
			<hr>
			<?php echo form_open('login/member',array('class'=>'login-validation','novalidate'=>'novalidate')); ?>
				<div class="form-group fontsize-small">
					<label for="input-email">Email</label>
					<input type="text" class="form-control user-login" id="input-email" name="user_access"  required>
					<div class="invalid-feedback invalid-user-login">Email tidak valid</div>
				</div>
				<input type="hidden" name="type">
				<button class="btn btn-block btn-primary btn-login">Kirimkan</button>
			<?php echo form_close(); ?>			
		</div>
		<div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email-tab">
			<h5 class="mt-4">Lupa email?</h5>
			<p class="fontsize-smaller text-muted">Kami akan mengirimkan alamat email melalui nomor handphone yang kamu daftarkan</p>
			<hr>
			<?php echo form_open('login/member',array('class'=>'login-validation','novalidate'=>'novalidate')); ?>
				<div class="form-group fontsize-small">
					<label for="input-email">Nomor Handphone</label>
					<input type="text" class="form-control user-login" id="input-email" name="user_access"  required>
					<div class="invalid-feedback invalid-user-login">Nomor Handphone tidak valid</div>
				</div>
				<input type="hidden" name="type">
				<button class="btn btn-block btn-primary btn-login">Kirimkan</button>
			<?php echo form_close(); ?>
		</div>
		<div class="tab-pane fade" id="phone" role="tabpanel" aria-labelledby="phone-tab">
			<h5 class="mt-4">Lupa nomor handphone?</h5>
			<p class="fontsize-smaller text-muted">Kami akan mengirimkan nomor handphone melalui email yang kamu daftarkan</p>
			<hr>
			<?php echo form_open('login/member',array('class'=>'login-validation','novalidate'=>'novalidate')); ?>
				<div class="form-group fontsize-small">
					<label for="input-email">Email</label>
					<input type="text" class="form-control user-login" id="input-email" name="user_access"  required>
					<div class="invalid-feedback invalid-user-login">Email tidak valid</div>
				</div>
				<input type="hidden" name="type">
				<button class="btn btn-block btn-primary btn-login">Kirimkan</button>
			<?php echo form_close(); ?>
		</div>
		<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
	</div>
</div>