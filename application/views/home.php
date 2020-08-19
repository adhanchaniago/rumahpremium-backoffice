<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-12 py-4 px-5 animate-up">
	<h5 class="mb-0"><strong>Halo, <?php echo member()->user_fullname; ?></strong></h5>
	<p>Ayo semangat input properti jualan hari ini</p>
	<div class="info-step my-5">
		<div class="row">
			<div class="col-4">
				<div class="card shadow">
					<div class="card-body text-center">
						<img src="<?php echo base_url(); ?>assets/icon/puzzle.png" width="40">
						<strong class="ml-3">Jumlah Properti Rumah</strong>
						<hr>
						<h6 class="mb-4"><?php echo $item_rumah_total; ?> Properti</h6>
						<a href="<?php echo site_url(); ?>item/form/create/manual/rumah" class="text-decoration-none">
							<button class="btn btn-primary btn-block">Mulai unggah properti</button>
						</a>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card shadow">
					<div class="card-body text-center">
						<img src="<?php echo base_url(); ?>assets/icon/puzzle.png" width="40">
						<strong class="ml-3">Jumlah Properti Apartment</strong>
						<hr>
						<h6 class="mb-4"><?php echo $item_apartment_total; ?> Properti</h6>
						<a href="<?php echo site_url(); ?>item/form/create/manual/apartment" class="text-decoration-none">
							<button class="btn btn-primary btn-block">Mulai unggah properti</button>
						</a>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card shadow">
					<div class="card-body text-center">
						<img src="<?php echo base_url(); ?>assets/icon/puzzle.png" width="40">
						<strong class="ml-3">Jumlah Properti Komersial</strong>
						<hr>
						<h6 class="mb-4"><?php echo $item_komersial_total; ?> Properti</h6>
						<a href="<?php echo site_url(); ?>item/form/create/manual/komersial" class="text-decoration-none">
							<button class="btn btn-primary btn-block">Mulai unggah properti</button>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</div>
</div>
</div>
</div>