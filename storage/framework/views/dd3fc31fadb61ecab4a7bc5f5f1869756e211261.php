<?php $__env->startSection('pilih_surat_pegawai'); ?>
	  <div class="card" style="width: 100%;">
	    <div class="card-header">
	      <h3 class="card-title">Pilih pegawai</h3>
	    </div>
	    <!-- /.card-header -->
	    <div class="card-body">
	        <table id="example1" class="table table-bordered table-hover">
	            <thead>
	                <tr>
	                    <th>No NIP</th>
	                    <th>Nama</th>
	                </tr>
	            </thead>

	            <tbody>
	                <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                    <tr>
	                        <td>
	                        	<a href="<?php echo e(url('cari_surat_nilai?cari_surat='.$item->id)); ?>"><?php echo e($item->id_nip); ?>

	                        	</a>
	                        </td>
	                        <td>
	                        	<?php echo e($item->name); ?>

	                        </td>
	                    </tr>
	                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	            </tbody>
	          </table>
	    </div>
	    <!-- /.card-body -->
	  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Drivers\xampp\htdocs\penilaian-pegawai\resources\views/content/Penilaian/pilih_surat_pegawai.blade.php ENDPATH**/ ?>