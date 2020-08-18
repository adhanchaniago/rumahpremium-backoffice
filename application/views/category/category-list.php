<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="col-12 pb-4 px-4 animate-up">
	<?php if($total_data > 0): ?>
	<div class="card">
		<div class="card-header bg-white border-0 pb-0">
			<div class="row">
				<div class="col-6">
					<h6 class="mt-1">Semua Kategori</h6>
				</div>
				<div class="col-6 text-right">
					<a href="<?php echo site_url(); ?>category/form/create">
						<button type="button" class="btn btn-outline-dark btn-sm mr-3">
							<i class="os-icon os-icon-plus position-relative border-right mr-2 pr-2" style="top: 1px;"></i> Tambah Kategori
						</button>
					</a>
				</div>
			</div>
		</div>
		<div class="card-body mt-0 pt-3">
			<table class="display table table-hover fontsize-smallest" id="table-data" data-order="[0,1,3]" data-text-center="[0]" data-text-right="[]" data-link="category/data">
				<thead>
					<tr style="border: none !important;">
						<td><input name="select_all" value="1" type="checkbox"></td>
						<td></td>
						<td><strong>Kategori <i class="fas fa-sort"></i></strong></td>
						<td><strong>Jumlah Produk</strong></td>
						<td><strong>Tanggal Dibuat <i class="fas fa-sort"></i></strong></td>
						<td><strong>Update Terakhir <i class="fas fa-sort"></i></strong></td>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
			<div class="modal fade" id="delete-form" role="dialog" data-backdrop="static" data-keyboard="false">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-body text-center">
							<img src="https://tokoadmin.tokotalk.com/images/empty_products.svg" width="250">
							<h6 class="py-2 mb-0">Hapus semua data yang dipilih?</h6>
							<hr>
							<?php echo form_open('category/action/delete'); ?>
								<input type="hidden" name="array_id">
								<button type="button" class="btn btn-outline-asgsagas fontsize-small" data-dismiss="modal">Batalkan</button>
								<button class="btn btn-outline-danger fontsize-small">Hapus</button>
							<?php echo form_close(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php else: ?>
		<div class="text-center">
			<img src="https://tokoadmin.tokotalk.com/images/empty_products.svg" width="400">
			<h4>Kamu belum punya data kategori</h4>
			<a href="<?php echo site_url(); ?>category/form/create">
				<button type="button" class="btn btn-outline-dark mr-3 mt-4">
					<i class="os-icon os-icon-plus position-relative border-right mr-2 pr-2" style="top: 1px;"></i> Tambah Kategori
				</button>
			</a>
		</div>
	<?php endif; ?>
</div>

</div>
</div>
</div>
</div>