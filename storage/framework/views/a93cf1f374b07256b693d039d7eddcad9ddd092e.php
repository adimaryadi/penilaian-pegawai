<?php $__env->startSection('edit_karyawan'); ?>
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit Pegawai</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="<?php echo e(url('pegawai/'.$edit->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="_method" value="PATCH">
          <div class="card-body">

            <div class="form-group">
              <label for="exampleInputEmail1">NIP</label>
              <input type="number" class="form-control" name="nip" id="exampleInputEmail1" placeholder="NIP" value="<?php echo e($edit->id_nip); ?>" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" class="form-control" name="nama" id="exampleInputEmail1" placeholder="Nama..." value="<?php echo e($edit->name); ?>" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email..." value="<?php echo e($edit->email); ?>" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Jabatan</label>
                <input type="text" class="form-control" name="jabatan" id="exampleInputEmail1" placeholder="Jabatan..." value="<?php echo e($edit->jabatan); ?>" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="Password...">
            </div>

            <div class="form-group">
                <label for="">Level</label>
                <select name="level" id="" class="form-control">
                    <option value="<?php echo e($edit->level); ?>" selected><?php echo e($edit->level); ?></option>
                    <option value="admin">Admin</option>
                    <option value="pegawai">Pegawai</option>
                </select>
            </div>
            <?php if($edit->status_dinas == 'sedang_dinas'): ?>
            <div class="form-group" id="no_surat" style="display: block">
              <label for="exampleInputEmail1">No Surat</label>
              <select class="form-control" name="no_surat" >
                  <option value="<?php echo e($edit->no_surat); ?>">Perbaharui Surat</option>
                  <?php if(!empty($surat)): ?>
                    <?php $__currentLoopData = $surat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($list->no_surat); ?>"><?php echo e($list->no_surat); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="">Status Dinas</label>
            </div>
            <div class="form-group">
               <input type="radio" name="dinas" class="radio" value="sedang_dinas" checked onclick="Dinas('sedang_dinas')">
               <label for="">Sedang Dinas</label>
            </div>
            <div class="form-group">
               <input type="radio" name="dinas" class="radio" value="tidak_dinas"  onclick="Dinas('tidak_dinas')">
               <label for="">Tidak Sedang Dinas</label>
            </div>
            <?php else: ?>
            <div class="form-group" id="no_surat" style="display: none">
              <label for="exampleInputEmail1">No Surat</label>
              <select class="form-control" name="no_surat" >
                  <option value="">Pilih Surat</option>
                  <?php if(!empty($surat)): ?>
                    <?php $__currentLoopData = $surat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($list->no_surat); ?>"><?php echo e($list->no_surat); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="">Status Dinas</label>
            </div>
            <div class="form-group">
               <input type="radio" name="dinas" class="radio" value="sedang_dinas"  onclick="Dinas('sedang_dinas')">
               <label for="">Sedang Dinas</label>
            </div>
            <div class="form-group">
               <input type="radio" name="dinas" class="radio" value="tidak_dinas" checked onclick="Dinas('tidak_dinas')">
               <label for="">Tidak Sedang Dinas</label>
            </div>
            <?php endif; ?>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Perbaharui</button>
          </div>
        </form>
      </div>
</div>
<script>
  function Dinas(status) {
     if (status == 'sedang_dinas') {
        $('#no_surat').css('display','block');
     }
     if (status == 'tidak_dinas') {
        $('#no_surat').css('display','none');
     }
  }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Drivers\xampp\htdocs\penilaian-pegawai\resources\views/content/Pegawai/edit.blade.php ENDPATH**/ ?>