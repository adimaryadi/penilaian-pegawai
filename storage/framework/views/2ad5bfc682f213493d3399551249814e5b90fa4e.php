<?php $__env->startSection('pilih_surat'); ?>
	<div class="card" style="width: 100%;">
		<div class="card-header">
			<h3 class="card-title">Pilih Surat</h3>
		</div>

		<div class="card-body">
			<form action="<?php echo e(url('pilih_penilai_pegawai')); ?>" method="POST">
				<?php echo csrf_field(); ?>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Pilih Surat</label>
							<select class="form-control" name="no_surat">
								<?php $__currentLoopData = $data_pilih; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($data->no_surat); ?>"><?php echo e($data->no_surat); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
						<div class="form-group">
							<button class="btn btn-primary">Pilih</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Drivers\xampp\htdocs\penilaian-pegawai\resources\views/content/Penilaian/pilih_surat.blade.php ENDPATH**/ ?>