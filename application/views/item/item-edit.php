<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $product_code = date('dmy').'-'.strtolower(random_string('alnum',3)); ?>

<div class="col-10">
	<?php echo form_open('product/action/create_manual',array('class'=>'product-validation','novalidate'=>'novalidate')); ?>
	<div class="row">
		<div class="py-3 w-100 position-fixed" style="background: #333; top: 0; z-index: 9999;">
			<div class="row animate-left">
				<div class="col-12 px-5">
					<div class="row">
						<div class="col-8">
							<div class="breadcrumb-nav text-white mt-2 fontsize-smaller text-uppercase">
							    <span class="text-muted">Properti</span>
							    <span class="mx-2">/</span>
							    <span class="text-muted">Data Properti</span>
							    <span class="mx-2">/</span>
							    <span class="text-light"><strong>Tambah Properti</strong></span>
							</div>					
						</div>
						<div class="col-2 text-right">
							<a href="<?php echo site_url(); ?>product">
								<button type="button" class="btn btn-outline-danger mr-2">Batalkan</button>
							</a>
							<input type="hidden" name="product_code" value="<?php echo $product_code; ?>">
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
								<div class="dropzone upload-multiplefile hover-opacity text-center" data-foldername="product" data-code="<?php echo $product_code; ?>" data-iduser="<?php echo member()->id_user; ?>" data-accept="image/jpeg,image/png" data-size="30">
									<div class="dz-message">
										<div class="p-1">
											<h1 class="my-3"><i class="os-icon os-icon-image icon-upload"></i></h1>
											<h6>Klik atau drop file foto produk di sini <span class="text-danger">*</span></h6>
											<div class="my-2 border-bottom pb-2"><small>File .jpg atau .png </small></div>
											<small>Maksimal 30 MB</small>
										</div>
									</div>
								</div>
								<input type="hidden" class="form-control validate upload-file-product" data-validate="validation/required" name="product_photo" required>
								<input type="hidden" class="form-control validate upload-filetotal-product" data-validate="validation/required" name="product_photo_total" required>
								<div class="invalid-feedback">Minimal 1 foto diunggah</div>
							</div>
						</div>
						<div class="card shadow mt-4">
							<div class="card-body">
								<h6 class="text-uppercase element-header"><strong>Informasi Properti</strong></h6>
								<hr>
								<div class="form-group fontsize-small mb-0 clearfix">
									<label for="input-product-name">Nama Properti <span class="text-danger">*</span></label>
									<input type="text" class="form-control validate input-product inputmax" id="input-product-name" data-validate="validation/required" maxlength="50" name="product_title" required>
									<div class="invalid-feedback w-75 float-left">Nama properti wajib diisi</div>
									<small class="form-text text-muted text-right"><span class="inputmax-count">0</span>/50</small>
								</div>
								<div class="form-group fontsize-small mb-0">
									<label for="input-product-price" class="fontsize-smaller">Harga Properti <span class="text-danger">*</span></label>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text fontsize-smaller">Rp</span>
										</div>
										<input type="text" class="form-control validate input-numeric input-count-income" id="input-product-price" data-validate="validation/required" name="product_price_real" required>
										<div class="invalid-feedback">Harga properti wajib diisi</div>
									</div>
								</div>
								<div class="form-group fontsize-small mb-3">
									<label for="input-product-sku" class="fontsize-smaller">Kategori Produk <span class="text-danger">*</span></label>
									<select class="form-control select-custom fontsize-small" id="input-product-sku" name="category_code[]" multiple="multiple">
										<?php foreach($category_list as $category): ?>
											<option value="<?php echo $category->category_code; ?>"><?php echo $category->category_name; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="row">
									<div class="col-4">
										<div class="form-group fontsize-small mb-3">
											<label for="input-product-name">Kamar Tidur</label>
											<input type="text" class="form-control validate input-product inputmax" id="input-product-name" data-validate="validation/required" maxlength="50" name="product_title" required>
										</div>
									</div>
									<div class="col-4">
										<div class="form-group fontsize-small mb-3">
											<label for="input-product-name">Kamar Mandi</label>
											<input type="text" class="form-control validate input-product inputmax" id="input-product-name" data-validate="validation/required" maxlength="50" name="product_title" required>
										</div>
									</div>
									<div class="col-4">
										<div class="form-group fontsize-small mb-3">
											<label for="input-product-name">Garasi</label>
											<input type="text" class="form-control validate input-product inputmax" id="input-product-name" data-validate="validation/required" maxlength="50" name="product_title" required>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card shadow mt-4">
							<div class="card-body">
								<h6 class="text-uppercase element-header"><strong>Lokasi Properti</strong></h6>
								<div class="form-group fontsize-small mb-3">
									<label for="input-product-name">Detail Lokasi <span class="text-danger">*</span></label>
									<textarea class="form-control validate fontsize-small" rows="3" id="input-product-name" data-validate="validation/required" maxlength="50" name="product_title" placeholder="Isikan nama jalan, kecamatan, kota/kabupaten" required></textarea>
									<div class="invalid-feedback">Detail lokasi wajib diisi</div>
								</div>
								<div class="row">
									<div class="col-6">
										<div class="form-group fontsize-small mb-3">
											<label for="input-product-name">Latitude</label>
											<input type="text" class="form-control validate input-product inputmax" id="input-product-name" data-validate="validation/required" maxlength="50" name="product_title" required>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group fontsize-small mb-3">
											<label for="input-product-name">Longitude</label>
											<input type="text" class="form-control validate input-product inputmax" id="input-product-name" data-validate="validation/required" maxlength="50" name="product_title" required>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card shadow mt-4">
							<div class="card-body">
								<h6 class="text-uppercase element-header"><strong>Fasilitas Properti</strong></h6>
							</div>
						</div>
<!-- 						<div class="card shadow mt-4">
							<div class="card-body">
								<div class="row">
									<div class="col-9">
										<h6 class="text-uppercase element-header"><strong>Tipe/Varian Produk</strong></h6>
									</div>
									<div class="col-3">
										<button class="btn btn-outline-dark btn-block">+ Tambahkan</button>
									</div>
								</div>
								<p class="mb-4 text-muted fontsize-smaller">Tambahkan tipe atau varian produk seperti ukuran, warna, atau jenis tipe</p>
								<hr>
							</div>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>
</div>

</div>
</div>