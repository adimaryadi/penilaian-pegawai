<?php $__env->startSection('pilih_pegawai_surat'); ?>
<div class="card" style="width: 100%;">
        <div class="card-header">
            <div class="btn-add">
                <a href="<?php echo e(url('pilih_surat_pegawai/create')); ?>" class="btn btn-primary">Tambah Surat Pegawai</a>
            </div>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>nama</th>
                            <th>email</th>
                            <th>jabatan</th>
                            <th>no_surat</th>
                            <th>Dibuat tanggal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php $__currentLoopData = $data_surat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($list->nama); ?></td>
                                    <td><?php echo e($list->email); ?></td>
                                    <td><?php echo e($list->jabatan); ?></td>
                                    <td><?php echo e($list->no_surat); ?></td>
                                    <td><?php echo e($list->created_at); ?></td>
                                    <td>
                                        <a class="btn btn-primary" href="<?php echo e(url('pilih_surat_pegawai/'.$list->id.'/edit')); ?>">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button class="btn btn-danger" onclick="Hapus('<?php echo e($list->id); ?>')">
                                            <i class="fa fa-eraser"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div> 

    <script type="text/javascript">
        function Hapus(id) {
            console.log(id);
        swal({
            title: "Apakah Anda Yakin?",
            text: "Pegawai ini akan di hapus",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo e(url('pilih_surat_pegawai')); ?>"+'/'+id,
                    data: {
                        _method: 'DELETE',
                        _token:  '<?php echo e(csrf_token()); ?>'
                    },
                    success: function (response) {
                        // console.log(response);
                        swal("Surat Sudah di hapus!", {
                            icon: "success",
                        });
                        setTimeout(() => {
                            return window.location.href     =   '<?php echo e(url('pilih_surat_pegawai')); ?>';
                        }, 3000);
                    },
                    error: function(error) {
                        swal("Gagal Menghapus!", {
                            icon: "error",
                        });
                    }
                });
            // swal("Poof! Your imaginary file has been deleted!", {
            //   icon: "success",
            // });
            } else {
            swal("Batalkan");
            }
        });
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Drivers\xampp\htdocs\penilaian-pegawai\resources\views/content/pilih_surat_pegawai/list.blade.php ENDPATH**/ ?>