    
<?php $__env->startSection('penilaian_pegawai'); ?>
    <div class="penilaian-pegawai" style="width: 100%;">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Penilaian </h3>
              
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="<?php echo e(url('penilaian')); ?>" method="POST">
                <?php echo csrf_field(); ?>
              <input type="hidden" name="id_pegawai" id="id_pegawai" value="">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">ID</label>
                  <select name="id_nip" id="pegawai_pilih" class="form-control" required onchange="ChangData()">
                      <option value="">Pilih Pegawai</option>
                      <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($item->id_nip); ?>"><?php echo e($item->id_nip); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
                <input type="hidden" name="nomor_surat" id="nomor_surat">
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama</label>
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Jabatan</label>
                    <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Nama" required>
                  </div>
                <div class="form-group">
                    <label for="">Kedisiplinan</label>
                    <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioPrimary1" name="kedisiplinan"  value="Sangat_kurang"       >
                          <label for="radioPrimary1">
                              Sangat Kurang
                          </label>
                        </div>
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="radioPrimary2" name="kedisiplinan" value="kurang"              >
                          <label for="radioPrimary2">
                              Kurang
                          </label>
                        </div>
                        <div class="icheck-primary d-inline">
                            <input type="radio" id="tes" name="kedisiplinan" value="cukup"               >
                            <label for="tes">
                                Cukup
                            </label>
                        </div>
                        <div class="icheck-primary d-inline">
                            <input type="radio" id="tes1" name="kedisiplinan" value="baik"                   >
                            <label for="tes1">
                                Baik
                            </label>
                        </div>
                        <div class="icheck-primary d-inline">
                            <input type="radio" id="tes2" name="kedisiplinan" value="Sangat_baik"                  >
                            <label for="tes2">
                                Sangat Baik
                            </label>
                        </div>
                      </div>
                </div>
                <div class="form-group">
                    <label for="">Kerja Sama</label>
                    <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="kerja_sama1" name="kerja_sama"  value="Sangat_kurang">
                          <label for="kerja_sama1">
                              Sangat Kurang
                          </label>
                        </div>
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="kerja_sama2" name="kerja_sama" value="kurang"        >
                          <label for="kerja_sama2">
                              Kurang
                          </label>
                        </div>
                        <div class="icheck-primary d-inline">
                            <input type="radio" id="kerja_sama3" name="kerja_sama" value="cukup"         >
                            <label for="kerja_sama3">
                                Cukup
                            </label>
                        </div>
                        <div class="icheck-primary d-inline">
                            <input type="radio" id="kerja_sama4" name="kerja_sama" value="baik"          >
                            <label for="kerja_sama4">
                                Baik
                            </label>
                        </div>
                        <div class="icheck-primary d-inline">
                            <input type="radio" id="kerja_sama5" name="kerja_sama" value="Sangat_baik"  >
                            <label for="kerja_sama5">
                                Sangat Baik
                            </label>
                        </div>
                      </div>
                </div>
                <div class="form-group">
                    <label for="">Kode Etik</label>
                    <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="kode_etik1" name="kode_etik"  value="Sangat_kurang">
                          <label for="kode_etik1">
                              Sangat Kurang
                          </label>
                        </div>
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="kode_etik2" name="kode_etik" value="kurang"        >
                          <label for="kode_etik2">
                              Kurang
                          </label>
                        </div>
                        <div class="icheck-primary d-inline">
                            <input type="radio" id="kode_etik3" name="kode_etik" value="cukup"         >
                            <label for="kode_etik3">
                                Cukup
                            </label>
                        </div>
                        <div class="icheck-primary d-inline">
                            <input type="radio" id="kode_etik4" name="kode_etik" value="baik"          >
                            <label for="kode_etik4">
                                Baik
                            </label>
                        </div>
                        <div class="icheck-primary d-inline">
                            <input type="radio" id="kode_etik5" name="kode_etik" value="Sangat_baik"  >
                            <label for="kode_etik5">
                                Sangat Baik
                            </label>
                        </div>
                      </div>
                </div>
                <div class="form-group">
                    <label for="">Ketepatan Waktu Pembuatan Laporan</label>
                    <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="ketepatan_waktu_laporan1" name="ketepatan_waktu_laporan"  value="Sangat_kurang">
                          <label for="ketepatan_waktu_laporan1">
                              Sangat Kurang
                          </label>
                        </div>
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="ketepatan_waktu_laporan2" name="ketepatan_waktu_laporan" value="kurang"        >
                          <label for="ketepatan_waktu_laporan2">
                              Kurang
                          </label>
                        </div>
                        <div class="icheck-primary d-inline">
                            <input type="radio" id="ketepatan_waktu_laporan3" name="ketepatan_waktu_laporan" value="cukup"         >
                            <label for="ketepatan_waktu_laporan3">
                                Cukup
                            </label>
                        </div>
                        <div class="icheck-primary d-inline">
                            <input type="radio" id="ketepatan_waktu_laporan4" name="ketepatan_waktu_laporan" value="baik"          >
                            <label for="ketepatan_waktu_laporan4">
                                Baik
                            </label>
                        </div>
                        <div class="icheck-primary d-inline">
                            <input type="radio" id="ketepatan_waktu_laporan5" name="ketepatan_waktu_laporan" value="Sangat_baik"  >
                            <label for="ketepatan_waktu_laporan5">
                                Sangat Baik
                            </label>
                        </div>
                      </div>
                </div>
                <div class="form-group">
                    <label for="">Pembuatan KKA</label>
                    <div class="form-group clearfix">
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="pembuatan_kka1" name="pembuatan_kka"  value="Sangat_kurang">
                          <label for="pembuatan_kka1">
                              Sangat Kurang
                          </label>
                        </div>
                        <div class="icheck-primary d-inline">
                          <input type="radio" id="pembuatan_kka2" name="pembuatan_kka" value="kurang"        >
                          <label for="pembuatan_kka2">
                              Kurang
                          </label>
                        </div>
                        <div class="icheck-primary d-inline">
                            <input type="radio" id="pembuatan_kka3" name="pembuatan_kka" value="cukup"         >
                            <label for="pembuatan_kka3">
                                Cukup
                            </label>
                        </div>
                        <div class="icheck-primary d-inline">
                            <input type="radio" id="pembuatan_kka4" name="pembuatan_kka" value="baik"          >
                            <label for="pembuatan_kka4">
                                Baik
                            </label>
                        </div>
                        <div class="icheck-primary d-inline">
                            <input type="radio" id="pembuatan_kka5" name="pembuatan_kka" value="Sangat_baik"  >
                            <label for="pembuatan_kka5">
                                Sangat Baik
                            </label>
                        </div>
                      </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
    </div>

    <script type="text/javascript">
        function ChangData() {
            let pilih       =       $('#pegawai_pilih').val();
            let data        =       '<?php echo $pegawai_json; ?>';
            let json_data   =       JSON.parse(data);
            let find        =       json_data.find(function (item) {
                return  item.id_nip == pilih;
            });
            if (find == undefined) {
                $('#nama').val('');
                $('#jabatan').val('');
                // return find = 'empty';
            } else {
                $('#nama').val(find.name);
                $('#jabatan').val(find.jabatan);
                $('#id_pegawai').val(find.id);
                $('#nomor_surat').val(find.no_surat);
            }
            console.log(find);
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Drivers\xampp\htdocs\penilaian-pegawai\resources\views/content/Penilaian/nilai.blade.php ENDPATH**/ ?>