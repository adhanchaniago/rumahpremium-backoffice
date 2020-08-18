<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $category_code = date('dmy').'-'.strtolower(random_string('alnum',3)); ?>

<div class="col-10">
	<?php echo form_open('category/action/create',array('class'=>'category-validation','novalidate'=>'novalidate')); ?>
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
							    <span><a class="text-light" href="<?php echo site_url(); ?>category">Data Kategori</a></span>
							    <span class="mx-2">/</span>
							    <span class="text-light"><strong>Ubah Kategori</strong></span>
							</div>					
						</div>
						<div class="col-2 text-right">
							<a href="<?php echo site_url(); ?>category">
								<button type="button" class="btn btn-outline-danger mr-2">Batalkan</button>
							</a>
							<input type="hidden" name="category_code" value="<?php echo $category_code; ?>">
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
								<h6 class="text-uppercase element-header"><strong>Kategori</strong></h6>
								<div class="form-group fontsize-small mb-0 clearfix">
									<label for="input-category-name">Nama Kategori <span class="text-danger">*</span></label>
									<input type="text" class="form-control validate inputmax" id="input-category-name" data-validate="validation/required" maxlength="20" name="category_name" value="<?php echo $category_detail->category_name; ?>" required>
									<div class="invalid-feedback w-75 float-left">Nama kategori wajib diisi</div>
									<small class="form-text text-muted text-right"><span class="inputmax-count"><?php echo strlen($category_detail->category_name); ?></span>/20</small>
								</div>
								<div class="form-group fontsize-small mb-0">
									<label for="input-product-sku">Menentukan Produk <span class="text-danger">*</span></label>
									<select class="form-control select-custom fontsize-small" id="input-product-sku" name="product_code[]" multiple="multiple">
										<?php foreach($product_list as $product): ?>
											<option value="<?php echo $product->product_code; ?>" selected>
												<?php echo $product->product_title; ?>
											</option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						</div>
						<div class="card shadow mt-4">
							<div class="card-body">
								<h6 class="text-uppercase element-header"><strong>Foto Kategori</strong></h6>
								<div class="row">
									<div class="col-6">
										<div class="dropzone upload-file hover-opacity text-center" data-foldername="category" data-fileupload="" data-code="<?php echo $category_code; ?>" data-iduser="<?php echo member()->id_user; ?>" data-accept="image/jpeg,image/png" data-size="30">
											<div class="dz-message">
												<div class="p-1">
													<h1 class="my-3"><i class="os-icon os-icon-image icon-upload"></i></h1>
													<h6>Klik atau drop file icon atau gambar di sini </h6>
													<div class="my-2 border-bottom pb-2"><small>File .jpg atau .png </small></div>
													<small>Maksimal 30 MB</small>
												</div>
											</div>
										</div>
										<input type="hidden" class="form-control upload-file-category" name="category_image" required>
									</div>
									<div class="col-6">
										<h6 class="mt-4">Info</h6>
										<hr>
										<p class="fontsize-smaller">Kami merekomendasikan file icon dengan ukuran <strong>150 x 150 px</strong> atau gambar dengan ukuran <strong>300 x 300 px</strong> atau <strong>400 x 120 px</strong> (Tergantung desain yang dipilih)</p>
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