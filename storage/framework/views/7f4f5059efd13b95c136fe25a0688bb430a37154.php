<?php $__env->startSection('list_pegawai'); ?>
    <div class="card" style="width: 100%;">
        <div class="card-header">
            <div class="btn-add">
                <a href="<?php echo e(url('pegawai/create')); ?>" class="btn btn-primary">Tambah Pegawai</a>
            </div>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jabatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($item->id_nip); ?></td>
                                <td><?php echo e($item->name); ?></td>
                                <td><?php echo e($item->email); ?></td>
                                <td><?php echo e($item->jabatan); ?></td>
                                <td>
                                    <a href="<?php echo e(url('pegawai/'.$item->id.'/edit')); ?>"><i class="far fa-edit"></i></a>
                                    <a href="#" onclick="DeletePegawai('<?php echo e($item->id); ?>')"><i class="fa fa-eraser" style="color: tomato;"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jabatan</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                  </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function DeletePegawai(id) {
            swal({
                title: "Apakah Anda Yakin ?",
                text: "Pegawai ini akan di hapus!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    // swal("Poof! Your imaginary file has been deleted!", {
                    //     icon: "success",
                    // });
                    $.ajax({
                        type: "POST",
                        url: "<?php echo e(url('pegawai')); ?>"+'/'+id,
                        data: {
                            _method: 'DELETE',
                            _token:  '<?php echo e(csrf_token()); ?>'
                        },
                        success: function (response) {
                            console.log(response);
                            swal("Pegawai Berhasil di hapus!", {
                                icon: "success",
                            });
                            setTimeout(() => {
                                return window.location.href     =   '<?php echo e(url('pegawai')); ?>';
                            }, 3000);
                        },
                        error: function (error) {
                            console.log(error);
                            swal("Gagal Menghapus Karyawan !", {
                                icon: "error",
                            }); 
                        }
                    });
                } else {
                    swal("Batal Dihapus!");
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Drivers\xampp\htdocs\penilaian-pegawai\resources\views/content/Pegawai/list.blade.php ENDPATH**/ ?>