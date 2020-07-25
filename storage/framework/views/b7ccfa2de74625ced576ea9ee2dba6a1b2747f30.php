<?php $__env->startSection('add_surat'); ?>
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Surat</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="<?php echo e(url('surat')); ?>" method="POST">
                <?php echo csrf_field(); ?>
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">No Surat</label>
                  <input type="text" class="form-control" name="no_surat" id="exampleInputEmail1" placeholder="No Surat" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal</label>
                  <input type="date" class="form-control" name="tanggal" id="exampleInputPassword1" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal Berakhir</label>
                  <input type="date" class="form-control" name="tanggal_berakhir" id="exampleInputPassword1" required>
                </div>
                <div class="form-group">
                  <label for="">Kota</label>
                  <input class="form-control" name="tujuan_kota">
                </div>
                <div class="form-group">
                  <label for="">Tujuan Dinas</label>
                  <input class="form-control" name="tujuan_luar_kota">
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Drivers\xampp\htdocs\penilaian-pegawai\resources\views/content/surat/add.blade.php ENDPATH**/ ?>