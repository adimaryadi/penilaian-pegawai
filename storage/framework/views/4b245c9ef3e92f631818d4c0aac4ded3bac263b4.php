<?php $__env->startSection('pilih'); ?>
    <div class="card" style="width: 100%;">
        <div class="card-header">
            <h3>Pilih Surat</h3>
        </div>
        <div class="card-body">
        	<form action="<?php echo e(url('Report_penilaian')); ?>" method="POST">
        		<?php echo csrf_field(); ?>
	        	<div class="row">
	        		<div class="col-md-6">
	        			<div class="form-group">
	        				<label>Pilih surat</label>
	        				<select class="form-control" name="no_surat">
	        					<option value="">pilih</option>
	        					<?php $__currentLoopData = $data_surat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	        						<option value="<?php echo e($list->no_surat); ?>"><?php echo e($list->no_surat); ?></option>
	        					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	        				</select>
	        				<br>
	        				<button type="submit" class="btn btn-primary">
	        					Pilih
	        				</button>
	        			</div>
	        		</div>
	        	</div>
	        </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Drivers\xampp\htdocs\penilaian-pegawai\resources\views/content/HasilPenilaian/pilih.blade.php ENDPATH**/ ?>