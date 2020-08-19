<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php $template_code = date('dmy').'-'.strtolower(random_string('alnum',3)); ?>

<div class="col-10">
	<?php echo form_open('item/action/create_csv',array('class'=>'product-validation','novalidate'=>'novalidate')); ?>
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
							<a href="<?php echo site_url(); ?>item/category/<?php echo $title; ?>">
								<button type="button" class="btn btn-outline-danger mr-2">Batalkan</button>
							</a>
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
								<h6 class="text-uppercase element-header"><strong>Unggah Properti Melalui Excel</strong></h6>
								<p class="mb-4 text-muted fontsize-smaller">Kamu dapat melakukan penambahan data menggunakan file excel yang sudah disiapkan secara template. Silahkan unduh template dan isi sesuai produk yang akan diunggah. <br><br>Setelah selesai mengisi data produk, mohon menyimpan file template tersebut dengan ekstensi .csv untuk kemudian diunggah di kolom yang disediakan di bawah ini.<br><br>
									*Untuk unggah gambar produk, kami menyarankan untuk mengunggahnya terlebih dahulu menggunakan <a href="https://pasteboard.co" target="_blank">https://pasteboard.co</a> atau abaikan jika gambar produk tersebut sudah diunggah di server lain.</p>
								<hr>
								<a href="<?php echo base_url(); ?>repository/template/template-properti.xlsx" target="_blank">
									<button type="button" class="btn btn-primary btn-sm mb-4">Unduh template properti</button>
								</a>
								<div class="dropzone upload-file hover-opacity text-center" data-foldername="bulk-upload" data-code="<?php echo $template_code; ?>" data-iduser="<?php echo member()->id_user; ?>" data-accept=".csv" data-size="30" data-fileupload="">
									<div class="dz-message">
										<div class="p-1">
											<h1 class="my-3"><i class="os-icon os-icon-file icon-upload"></i></h1>
											<h6>Klik atau drop file template di sini <span class="text-danger">*</span></h6>
											<div class="my-2 border-bottom pb-2"><small>File .csv </small></div>
											<small>Maksimal 30 MB</small>
										</div>
									</div>
								</div>
								<input type="hidden" class="form-control validate upload-file-bulk-upload" data-validate="validation/required" name="template_file" required>
								<input type="hidden" class="form-control validate" data-validate="validation/required" name="template_code" value="<?php echo $template_code; ?>">
								<div class="invalid-feedback">Minimal 1 foto diunggah</div>
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