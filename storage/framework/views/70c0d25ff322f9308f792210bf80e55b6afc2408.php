<?php $__env->startSection('filter_nomor'); ?>
<div class="card" style="width: 100%">
    <div class="card-header">
      <h3 class="card-title">Surat</h3>
      <div class="btn-add">
        <a href="<?php echo e(url('surat/create')); ?>" class="btn btn-primary">Tambah Surat</a>
      </div>
      <div class="filter-surat">
        <form action="<?php echo e(url('filter')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-md-6">
                    <input type="date" class="form-control" name="filter_surat" value="<?php echo e($bulan); ?>" required="required">
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
                </div>
            </div>
        </form>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body" >
      <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Surat</th>
                <th>tanggal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $data_surat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->no_surat); ?></td>
                    <td><?php echo e($item->tanggal); ?></td>
                    <td>
                        <a href="<?php echo e(url('surat/'.$item->id.'/edit')); ?>"><i class="fas fa-edit"></i></a>
                        <a href="#" onclick="deleteSurat('<?php echo e($item->id); ?>')"><i class="fas fa-eraser" style="color: tomato;"></i></a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Surat</th>
                <th>Tanggal</th>
                <th>Action</th>
            </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

  <script type="text/javascript">
        function deleteSurat(id) {
            swal({
                title: "Apakah anda yakin ?",
                text: "no surat ini akan di hapus",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo e(url('surat')); ?>"+'/'+id,
                        data: {
                            _method: 'DELETE',
                            _token:  '<?php echo e(csrf_token()); ?>'
                        },
                        dataType: "JSON",
                        success: function (response) {
                            swal("Surat Sudah di hapus!", {
                                icon: "success",
                            });
                            setTimeout(() => {
                                return window.location.href     =   '<?php echo e(url('surat')); ?>';
                            }, 3000);
                        },
                        error: function(error) {
                            swal("Gagal Menghapus!", {
                                icon: "error",
                            });
                        }
                    });
                } else {
                    swal("dibatalkan!");
                }
            });
        }
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Drivers\xampp\htdocs\penilaian-pegawai\resources\views/content/surat/filter.blade.php ENDPATH**/ ?>