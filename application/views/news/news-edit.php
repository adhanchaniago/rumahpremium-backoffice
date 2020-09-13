<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="col-10">
	<?php echo form_open('news/action/update',array('class'=>'news-validation','novalidate'=>'novalidate')); ?>
	<div class="row">
		<div class="py-3 w-100 position-fixed" style="background: #333; top: 0; z-index: 9999;">
			<div class="row animate-left">
				<div class="col-12 px-5">
					<div class="row">
						<div class="col-8">
							<div class="breadcrumb-nav text-white mt-2 fontsize-smaller text-uppercase">
							    <span class="text-muted">Berita</span>
							    <span class="mx-2">/</span>
							    <span><a class="text-light" href="<?php echo site_url(); ?>news">Daftar <?php echo $title; ?></a>
							    <span class="mx-2">/</span>
							    <span class="text-light"><strong>Edit <?php echo $title; ?></strong></span>
							</div>
						</div>
						<div class="col-2 text-right">
							<a href="<?php echo site_url(); ?>news/category/<?php echo strtolower(url_title($title)); ?>">
								<button type="button" class="btn btn-outline-danger mr-2">Batalkan</button>
							</a>
							<input type="hidden" name="news_code" value="<?php echo $news_detail->news_code; ?>">
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
								<h6 class="text-uppercase element-header"><strong>Foto Berita</strong></h6>
								<p class="mb-4 text-muted fontsize-smaller">Foto berita yang dapat diunggah maksimal 6 foto dan berekstensi .jpg atau .png</p>
								<hr>
								<div class="dropzone upload-multiplefile hover-opacity text-center" data-foldername="news" data-code="<?php echo $news_detail->news_code; ?>" data-accept="image/jpeg,image/png" data-size="30" data-fileupload="<?php if(news_image_list($news_detail->id_news) != null) { echo implode(",",news_image_list($news_detail->id_news)); } ?>">
									<div class="dz-message">
										<div class="p-1">
											<h1 class="my-3"><i class="os-icon os-icon-image icon-upload"></i></h1>
											<h6>Klik atau drop file foto berita di sini <span class="text-danger">*</span></h6>
											<div class="my-2 border-bottom pb-2"><small>File .jpg atau .png </small></div>
											<small>Maksimal 30 MB</small>
										</div>
									</div>
								</div>
								<div class="data-file-news"></div>
								<input type="hidden" class="form-control validate upload-filetotal-news" data-validate="validation/required" name="news_photo_total" value="<?php echo count(news_image_list($news_detail->id_news)); ?>" required>
								<div class="invalid-feedback">Minimal 1 foto diunggah</div>
								<input type="hidden" name="main_image" value="<?php echo news_image($news_detail->id_news)->image; ?>">
								<input type="hidden" name="main_image_old" value="<?php echo news_image($news_detail->id_news)->image; ?>">
							</div>
						</div>
						<div class="card shadow mt-4">
							<div class="card-body">
								<h6 class="text-uppercase element-header"><strong>Konten Berita</strong></h6>
								<hr>
								<div class="form-group fontsize-small mb-0 clearfix">
									<label for="input-property-name">Judul Berita <span class="text-danger">*</span></label>
									<input type="text" class="form-control validate input-product inputmax" id="input-property-name" data-validate="validation/required" maxlength="100" name="news_title" placeholder="Maksimal 100 karakter" value="<?php echo $news_detail->news_title; ?>" required>
									<div class="invalid-feedback w-75 float-left">Judul berita wajib diisi</div>
									<small class="form-text text-muted text-right"><span class="inputmax-count">0</span>/100</small>
								</div>
								<div class="form-group fontsize-smaller">
									<label>Deskripsi Properti</label>
									<div id="editor" style="min-height: 100px;"><?php echo $news_detail->news_content; ?></div>
									<input type="hidden" class="editor w-100" name="description" value="<?php echo $news_detail->news_content; ?>">
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