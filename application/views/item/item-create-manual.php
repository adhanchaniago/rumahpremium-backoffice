<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $item_code = date('dmy').'-'.strtolower(random_string('alnum',3)); ?>

<div class="col-10">
	<?php echo form_open('item/action/create_manual',array('class'=>'product-validation','novalidate'=>'novalidate')); ?>
	<div class="row">
		<div class="py-3 w-100 position-fixed" style="background: #333; top: 0; z-index: 9999;">
			<div class="row animate-left">
				<div class="col-12 px-5">
					<div class="row">
						<div class="col-8">
							<div class="breadcrumb-nav text-white mt-2 fontsize-smaller text-uppercase">
							    <span class="text-muted">Properti</span>
							    <span class="mx-2">/</span>
							    <span><a class="text-light" href="<?php echo site_url(); ?>item/category/<?php echo strtolower(url_title($title)); ?>">Data Properti <?php echo $title; ?></a>
							    <span class="mx-2">/</span>
							    <span class="text-light"><strong>Tambah Properti <?php echo $title; ?></strong></span>
							</div>
						</div>
						<div class="col-2 text-right">
							<a href="<?php echo site_url(); ?>item/category/<?php echo strtolower(url_title($title)); ?>">
								<button type="button" class="btn btn-outline-danger mr-2">Batalkan</button>
							</a>
							<input type="hidden" name="item_code" value="<?php echo $item_code; ?>">
							<input type="hidden" name="category" value="<?php echo $title; ?>">
							<button class="btn btn-primary btn-action">Simpan</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 py-4 px-5 mt-5 animate-up">
			<div class="info-step my-5">
				<div class="row">
					<div class="col-8 offset-2">
						<div class="card shadow">
							<div class="card-body">
								<h6 class="text-uppercase element-header"><strong>Foto Properti</strong></h6>
								<p class="mb-4 text-muted fontsize-smaller">Foto produk yang dapat diunggah maksimal 6 foto dan berekstensi .jpg atau .png</p>
								<hr>
								<div class="dropzone upload-multiplefile hover-opacity text-center" data-foldername="product" data-code="<?php echo $item_code; ?>" data-accept="image/jpeg,image/png" data-size="30" data-fileupload="">
									<div class="dz-message">
										<div class="p-1">
											<h1 class="my-3"><i class="os-icon os-icon-image icon-upload"></i></h1>
											<h6>Klik atau drop file foto produk di sini <span class="text-danger">*</span></h6>
											<div class="my-2 border-bottom pb-2"><small>File .jpg atau .png </small></div>
											<small>Maksimal 30 MB</small>
										</div>
									</div>
								</div>
								<div class="data-file-product"></div>
								<input type="hidden" class="form-control upload-filetotal-product" name="product_photo_total" value="0">
								<div class="invalid-feedback">Minimal 1 foto diunggah</div>
								<input type="hidden" name="main_image">
							</div>
						</div>
						<div class="card shadow mt-4">
							<div class="card-body">
								<h6 class="text-uppercase element-header"><strong>Informasi Properti</strong></h6>
								<hr>
								<div class="form-group fontsize-small mb-0 clearfix">
									<label for="input-property-name">Nama Properti <span class="text-danger">*</span></label>
									<input type="text" class="form-control validate input-product inputmax" id="input-property-name" data-validate="validation/required" maxlength="50" name="title_item" placeholder="Maksimal 50 karakter" required>
									<div class="invalid-feedback w-75 float-left">Nama properti wajib diisi</div>
									<small class="form-text text-muted text-right"><span class="inputmax-count">0</span>/50</small>
								</div>
								<div class="form-group fontsize-small mb-0">
									<label for="input-property-price" class="fontsize-smaller">Harga Properti <span class="text-danger">*</span></label>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text fontsize-smaller">Rp</span>
										</div>
										<input type="text" class="form-control validate input-numeric input-count-income" id="input-property-price" data-validate="validation/required" name="price" required>
										<div class="invalid-feedback">Harga properti wajib diisi</div>
									</div>
								</div>
								<div class="form-group fontsize-smaller mb-3">
									<label for="input-type-property" class="fontsize-smaller">Tipe Properti <span class="text-danger">*</span></label>
									<select class="form-control select-custom fontsize-smallest" id="input-type-property" name="type" data-category="Pilih Hehe">
										<option value=""></option>
										<option value="Dijual">Dijual</option>
										<option value="Disewakan">Disewakan</option>
									</select>
								</div>
								<div class="form-group fontsize-smaller">
									<label>Deskripsi Properti</label>
									<div id="editor" style="min-height: 100px;"></div>
									<input type="hidden" class="editor w-100" name="product_desc">
								</div>
							</div>
						</div>
						<div class="card shadow mt-4">
							<div class="card-body">
								<h6 class="text-uppercase element-header"><strong>Lokasi Properti</strong></h6>
								<div class="form-group fontsize-small mb-3">
									<label for="input-address">Detail Lokasi <span class="text-danger">*</span></label>
									<textarea class="form-control validate fontsize-small" rows="3" id="input-address" data-validate="validation/required" name="address" placeholder="Isikan nama jalan, kecamatan, kota/kabupaten" required></textarea>
									<div class="invalid-feedback">Detail lokasi wajib diisi</div>
								</div>
								<div class="row">
									<div class="col-6">
										<div class="form-group fontsize-small mb-3">
											<label for="input-lat">Latitude</label>
											<input type="text" class="form-control" id="input-lat" name="latitude">
										</div>
									</div>
									<div class="col-6">
										<div class="form-group fontsize-small mb-3">
											<label for="input-lng">Longitude</label>
											<input type="text" class="form-control" id="input-lng" name="longitude">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card shadow mt-4">
							<div class="card-body">
								<h6 class="text-uppercase element-header"><strong>Detail Properti</strong></h6>
								<div class="row">
									<div class="col-4">								
										<div class="form-group fontsize-small mb-3">
											<label for="input-usia">Usia Bangunan</label>
											<input type="text" class="form-control" id="input-usia" name="usia_bangunan">
										</div>
										<div class="form-group fontsize-small mb-3">
											<label for="input-lantai">Jumlah Lantai</label>
											<input type="number" class="form-control" id="input-lantai" name="lantai">
										</div>
										<div class="form-group fontsize-small mb-3">
											<label for="input-luas-bangunan">Luas Bangunan (m<sup>2</sup>)</label>
											<input type="number" class="form-control" id="input-luas-bangunan" name="luas_bangunan">
										</div>
										<div class="form-group fontsize-small mb-3">
											<label for="input-property-bedroom">Kamar Tidur</label>
											<input type="number" class="form-control" id="input-property-bedroom" name="bedroom" value="0">
										</div>
									</div>
									<div class="col-4">
										<div class="form-group fontsize-small mb-3">
											<label for="input-tanah">Luas Tanah (m<sup>2</sup>)</label>
											<input type="number" class="form-control" id="input-tanah" name="luas_tanah">
										</div>
										<div class="form-group fontsize-small mb-3">
											<label for="input-furnish">Furnish</label>
											<input type="text" class="form-control" id="input-furnish" name="furnish">
										</div>
										<div class="form-group fontsize-small mb-3">
											<label for="input-sertifikat">Sertifikat</label>
											<input type="text" class="form-control" id="input-sertifikat" name="sertifikat">
										</div>
										<div class="form-group fontsize-small mb-3">
											<label for="input-property-bathroom">Kamar Mandi</label>
											<input type="number" class="form-control" id="input-property-bathroom" name="bathroom" value="0">
										</div>
									</div>
									<div class="col-4">
										<div class="form-group fontsize-small mb-3">
											<label for="input-listrik">Listrik (watt)</label>
											<input type="number" class="form-control" id="input-listrik" name="listrik">
										</div>
										<div class="form-group fontsize-small mb-3">
											<label for="input-air">Sumber Air</label>
											<input type="text" class="form-control" id="input-air" name="sumber_air">
										</div>
										<div class="form-group fontsize-small mb-3">
											<label for="input-developer">Pengembang</label>
											<input type="text" class="form-control" id="input-developer" name="developer">
										</div>
										<div class="form-group fontsize-small mb-3">
											<label for="input-property-garage">Garasi</label>
											<input type="number" class="form-control" id="input-property-garage" name="garage" value="0">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card shadow mt-4">
							<div class="card-body">
								<h6 class="text-uppercase element-header"><strong>Fasilitas Properti</strong></h6>
								<div class="row">
									<div class="col-4">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" id="input-ac" name="ac" class="custom-control-input" value="1">
											<label class="custom-control-label" for="input-ac">AC</label>
										</div>
										<div class="custom-control custom-checkbox">
											<input type="checkbox" id="input-kolam" name="kolam_renang" class="custom-control-input" value="1">
											<label class="custom-control-label" for="input-kolam">Kolam Renang</label>
										</div>
										<div class="custom-control custom-checkbox">
											<input type="checkbox" id="input-halaman" name="halaman" class="custom-control-input" value="1">
											<label class="custom-control-label" for="input-halaman">Halaman Bermain</label>
										</div>
									</div>
									<div class="col-4">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" id="input-water-heater" name="water_heater" class="custom-control-input" value="1">
											<label class="custom-control-label" for="input-water-heater">Water Heater</label>
										</div>
										<div class="custom-control custom-checkbox">
											<input type="checkbox" id="input-cuci" name="mesin_cuci" class="custom-control-input" value="1">
											<label class="custom-control-label" for="input-cuci">Mesin Cuci</label>
										</div>
										<div class="custom-control custom-checkbox">
											<input type="checkbox" id="input-gym" name="gym" class="custom-control-input" value="1">
											<label class="custom-control-label" for="input-gym">Gym</label>
										</div>
									</div>
									<div class="col-4">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" id="input-internet" name="internet" class="custom-control-input" value="1">
											<label class="custom-control-label" for="input-internet">Internet</label>
										</div>
										<div class="custom-control custom-checkbox">
											<input type="checkbox" id="input-teras" name="teras" class="custom-control-input" value="1">
											<label class="custom-control-label" for="input-teras">Teras/Balkon</label>
										</div>
										<div class="custom-control custom-checkbox">
											<input type="checkbox" id="input-bathup" name="bathup" class="custom-control-input" value="1">
											<label class="custom-control-label" for="input-bathup">Bathup</label>
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
	<?php echo form_close(); ?>
</div>

</div>
</div>