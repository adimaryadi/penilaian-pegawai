<?php $__env->startSection('buat_surat_pegawai'); ?>
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Tambah Surat Pegawai</h3>
            </div>

            <form action="<?php echo e(url('pilih_surat_pegawai')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pegawai</label>
                        <select class="form-control" name="id_pegawai" id="pilih_user" onchange="Pilih_pegawai()">
                            <option value="">Pilih</option>
                            <?php $__currentLoopData = $data_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($list->id); ?>"><?php echo e($list->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">No Surat</label>
                        <select class="form-control" name="no_surat">
                            <option value=""></option>
                            <?php $__currentLoopData = $data_surat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($list->no_surat); ?>"><?php echo e($list->no_surat); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <script type="text/javascript">
        function Pilih_pegawai() {
           var data          =       '<?php echo $data_json_user; ?>';
           var JsonTodata    =       JSON.parse(data);
           var pilih_pegawai =       $('#pilih_user').val();

           var find          =        JsonTodata.find(function (item) {
               return item.id == pilih_pegawai;
           });
           $('#nama').val(find.name);
           $('#email').val(find.email);
           $('#jabatan').val(find.jabatan);

           console.log(find);
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Drivers\xampp\htdocs\penilaian-pegawai\resources\views/content/pilih_surat_pegawai/create.blade.php ENDPATH**/ ?>