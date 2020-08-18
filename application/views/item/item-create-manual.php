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
							    <span class="text-muted">Toko Online</span>
							    <span class="mx-2">/</span>
							    <span class="text-muted">Produk</span>
							    <span class="mx-2">/</span>
							    <span><a class="text-light" href="<?php echo site_url(); ?>product">Data Produk</a></span>
							    <span class="mx-2">/</span>
							    <span class="text-light"><strong>Tambah Produk</strong></span>
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
								<h6 class="text-uppercase element-header"><strong>Foto Produk</strong></h6>
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
								<h6 class="text-uppercase element-header"><strong>Informasi Produk</strong></h6>
								<p class="mb-4 text-muted fontsize-smaller">Menambahkan informasi produk yang menarik adalah langkah pertama untuk mulai berjualan</p>
								<hr>
								<div class="form-group fontsize-small mb-0 clearfix">
									<label for="input-product-name">Nama Produk <span class="text-danger">*</span></label>
									<input type="text" class="form-control validate input-product inputmax" id="input-product-name" data-validate="validation/required" maxlength="50" name="product_title" required>
									<div class="invalid-feedback w-75 float-left">Nama produk wajib diisi</div>
									<small class="form-text text-muted text-right"><span class="inputmax-count">0</span>/50</small>
								</div>
								<div class="form-group fontsize-small mb-0 clearfix">
									<label for="input-product-sku">SKU Produk <span class="text-danger">*</span></label>
									<input type="text" class="form-control validate input-sku inputmax" id="input-product-sku" data-validate="validation/required" data-max="20" maxlength="20" name="product_sku" required>
									<div class="invalid-feedback w-75 float-left">SKU produk wajib diisi</div>
									<small class="form-text text-muted text-right"><span class="inputmax-sku inputmax-count">0</span>/20</small>
								</div>
								<div class="form-group fontsize-small mb-0">
									<label for="input-product-sku" class="fontsize-smaller">Kategori Produk <span class="text-danger">*</span></label>
									<select class="form-control select-custom fontsize-small" id="input-product-sku" name="category_code[]" multiple="multiple">
										<?php foreach($category_list as $category): ?>
											<option value="<?php echo $category->category_code; ?>"><?php echo $category->category_name; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						</div>
						<div class="card shadow mt-4">
							<div class="card-body">
								<h6 class="text-uppercase element-header"><strong>Harga Produk</strong></h6>
								<div class="form-group fontsize-small mb-0">
									<label for="input-product-price" class="fontsize-smaller">Harga Jual <span class="text-danger">*</span></label>
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text fontsize-smaller">Rp</span>
										</div>
										<input type="text" class="form-control validate input-numeric input-count-income" id="input-product-price" data-validate="validation/required" name="product_price_real" required>
										<div class="invalid-feedback">Harga jual produk wajib diisi</div>
									</div>
								</div>
								<div class="row">
									<div class="col-8">
										<div class="form-group fontsize-small mb-0">
											<label for="input-product-price-cost" class="fontsize-smaller">Harga Pokok</label>
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text fontsize-smaller">Rp</span>
												</div>
												<input type="text" class="form-control input-numeric input-count-income" id="input-product-price-cost" name="product_price_cost" required>
											</div>
										</div>
									</div>
									<div class="col-4">
										<div class="form-group fontsize-small mb-0">
											<label for="input-product-sku" class="fontsize-smaller">Jumlah Keuntungan</label>
											<p class="mt-1 fontsize-smaller total-income"><strong>-</strong></p>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-8">
										<div class="form-group fontsize-small mb-0">
											<label for="input-product-discount" class="fontsize-smaller">Diskon</label>
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text fontsize-smaller">%</span>
												</div>
												<input type="text" placeholder="Maksimal diskon 90%" class="form-control input-numeric input-count-discount" id="input-product-discount" name="product_discount" min="0" max="90" onKeyUp="if(this.value > 90){ this.value = '90'; } else if(this.value < 0){ this.value = '0'; }" required>
											</div>
										</div>
									</div>
									<div class="col-4">
										<div class="form-group fontsize-small mb-0">
											<label for="input-product-sku" class="fontsize-smaller">Harga Setelah Diskon</label>
											<p class="mt-1 fontsize-smaller total-discount"><strong>-</strong></p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card shadow mt-4">
							<div class="card-body">
								<h6 class="text-uppercase element-header"><strong>Detail Produk</strong></h6>
								<p class="mb-4 text-muted fontsize-smaller">Tambahkan informasi detail produk untuk memudahkan pembeli</p>
								<hr>
								<div class="form-group fontsize-small mb-0">
									<label for="input-product-weight" class="fontsize-smaller">Berat <span class="text-danger">*</span></label>
									<div class="input-group mb-3">
										<input type="text" class="form-control validate" id="input-product-weight" data-validate="validation/required" name="product_weight" required>
										<div class="input-group-append">
											<span class="input-group-text fontsize-smaller">gram</span>
										</div>
										<div class="invalid-feedback">Berat produk wajib diisi</div>
									</div>
								</div>
								<div class="row">
									<div class="col-4">
										<div class="form-group fontsize-small mb-0">
											<label for="input-product-length" class="fontsize-smaller">Panjang <span class="text-danger">*</span></label>
											<div class="input-group mb-3">
												<input type="text" class="form-control validate" id="input-product-length" data-validate="validation/required" name="product_length" required>
												<div class="input-group-append">
													<span class="input-group-text fontsize-smaller">cm</span>
												</div>
												<div class="invalid-feedback">Panjang produk wajib diisi</div>
											</div>
										</div>
									</div>
									<div class="col-4">
										<div class="form-group fontsize-small mb-0">
											<label for="input-product-width" class="fontsize-smaller">Lebar <span class="text-danger">*</span></label>
											<div class="input-group mb-3">
												<input type="text" class="form-control validate" id="input-product-width" data-validate="validation/required" name="product_width" required>
												<div class="input-group-append">
													<span class="input-group-text fontsize-smaller">cm</span>
												</div>
												<div class="invalid-feedback">Lebar produk wajib diisi</div>
											</div>
										</div>
									</div>
									<div class="col-4">
										<div class="form-group fontsize-small mb-0">
											<label for="input-product-height" class="fontsize-smaller">Tinggi <span class="text-danger">*</span></label>
											<div class="input-group mb-3">
												<input type="text" class="form-control validate" id="input-product-height" data-validate="validation/required" name="product_width" required>
												<div class="input-group-append">
													<span class="input-group-text fontsize-smaller">cm</span>
												</div>
												<div class="invalid-feedback">Tinggi produk wajib diisi</div>
											</div>
										</div>
									</div>
								</div>
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