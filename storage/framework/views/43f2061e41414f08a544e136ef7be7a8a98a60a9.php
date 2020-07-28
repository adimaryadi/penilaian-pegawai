<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
        <style>
            .print_out {
                padding-left: 16px !important;
                width: 100%;
                height: 801px;
                padding: 45px;
                background-color: white;
            }
            .table-bordered th, .table-bordered td {
                font-size: 0.9em;
                border: 1px solid #dee2e6;
                padding: 5px;
            }
            .table th, .table td {
                padding: 3px !important; 
                vertical-align: top;
                border-top: 1px solid #dee2e6;
            }
        </style>
        <link rel="stylesheet" href="<?php echo e(asset('css/dist/css/adminlte.css')); ?>">
        <div class="print_out" id="print_now">
                <div class="judul">
                    <h3>Hasil Penilaian</h3>
                    <?php $no = 1; ?>
                    <div class="nilai">
                        <table>
                            <tr class="report">
                                    <th>Surat:</th>
                                    <th><?php echo e($no_surat); ?></th>
                            </tr>
                        </table>
                        <table id="example2" class="table table-bordered table-hover">
            
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Kedisiplinan</th>
                                <th>Kerja Sama</th>
                                <th>Kode Etik</th>
                                <th>KPL</th>
                                <th>Pembuatan KKP</th>
                                <th>Dinilai Oleh</th>
                                <th>Hasil Akhir</th>
                            </tr>
                            <?php $no  =  1; ?>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo e($list->id_nip); ?></td>
                                    <td><?php echo e($list->nama); ?></td>
                                    <td>
                                        <?php
                                            $kedisiplinan       =        0;
            
                                            if ($list->kedisiplinan == 'sangat_kurang') {
                                                $kedisiplinan   =        4;
                                                echo "Sangat Kurang";
                                            }  else if($list->kedisiplinan == 'kurang') {
                                                $kedisiplinan   =        8;
                                                echo "Kurang";
                                            }  else if($list->kedisiplinan == 'cukup') {
                                                $kedisiplinan   =        12;
                                                echo "Cukup";
                                            }  else if($list->kedisiplinan == 'baik') {
                                                $kedisiplinan   =        16;
                                                echo "baik";
                                            }  else if($list->kedisiplinan == 'sangat_baik') {
                                                $kedisiplinan   =        20;
                                                echo "Sangat Baik";
                                            }
            
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $kerja_sama       =        0;
            
                                            if ($list->kerja_sama == 'sangat_kurang') {
                                                $kerja_sama   =        4;
                                                echo "Sangat Kurang";
                                            }  else if($list->kerja_sama == 'kurang') {
                                                $kerja_sama   =        8;
                                                echo "Kurang";
                                            }  else if($list->kerja_sama == 'cukup') {
                                                $kerja_sama   =        12;
                                                echo "Cukup";
                                            }  else if($list->kerja_sama == 'baik') {
                                                $kerja_sama   =        16;
                                                echo "baik";
                                            }  else if($list->kerja_sama == 'sangat_baik') {
                                                $kerja_sama   =        20;
                                                echo "Sangat Baik";
                                            }
                                        ?>   
                                    </td>
                                    <td>
                                        <?php
                                            $kode_etik       =        0;
            
                                            if ($list->kode_etik == 'sangat_kurang') {
                                                $kode_etik   =        4;
                                                echo "Sangat Kurang";
                                            }  else if($list->kode_etik == 'kurang') {
                                                $kode_etik   =        8;
                                                echo "Kurang";
                                            }  else if($list->kode_etik == 'cukup') {
                                                $kode_etik   =        12;
                                                echo "Cukup";
                                            }  else if($list->kode_etik == 'baik') {
                                                $kode_etik   =        16;
                                                echo "baik";
                                            }  else if($list->kode_etik == 'sangat_baik') {
                                                $kode_etik   =        20;
                                                echo "Sangat Baik";
                                            }
                                        ?>   
                                    </td>
                                    <td>
                                        <?php
                                            $ketepatan_membuat_laporan       =        0;
            
                                            if ($list->ketepatan_membuat_laporan == 'sangat_kurang') {
                                                $ketepatan_membuat_laporan   =        4;
                                                echo "Sangat Kurang";
                                            }  else if($list->ketepatan_membuat_laporan == 'kurang') {
                                                $ketepatan_membuat_laporan   =        8;
                                                echo "Kurang";
                                            }  else if($list->ketepatan_membuat_laporan == 'cukup') {
                                                $ketepatan_membuat_laporan   =        12;
                                                echo "Cukup";
                                            }  else if($list->ketepatan_membuat_laporan == 'baik') {
                                                $ketepatan_membuat_laporan   =        16;
                                                echo "baik";
                                            }  else if($list->ketepatan_membuat_laporan == 'sangat_baik') {
                                                $ketepatan_membuat_laporan   =        20;
                                                echo "Sangat Baik";
                                            }
                                        ?>   
                                    </td>
                                    <td>
                                        <?php
                                            $pembuatan_kka       =        0;
            
                                            if ($list->pembuatan_kka == 'sangat_kurang') {
                                                $pembuatan_kka   =        4;
                                                echo "Sangat Kurang";
                                            }  else if($list->pembuatan_kka == 'kurang') {
                                                $pembuatan_kka   =        8;
                                                echo "Kurang";
                                            }  else if($list->pembuatan_kka == 'cukup') {
                                                $pembuatan_kka   =        12;
                                                echo "Cukup";
                                            }  else if($list->pembuatan_kka == 'baik') {
                                                $pembuatan_kka   =        16;
                                                echo "baik";
                                            }  else if($list->pembuatan_kka == 'sangat_baik') {
                                                $pembuatan_kka   =        20;
                                                echo "Sangat Baik";
                                            }
                                        ?>   
                                    </td>
                                    <td><?php echo e($list->dinilai); ?></td>
                                    <td>
                                        <?php 
                                            $hasil_akhir            =        $kedisiplinan + $kerja_sama + $kode_etik + $ketepatan_membuat_laporan + $pembuatan_kka;
                                            if ($hasil_akhir >= 81) {
                                                echo "Sangat Baik";
                                            } else if ($hasil_akhir >= 76) {
                                                echo "Baik";
                                            } else if ($hasil_akhir >= 61) {
                                                echo "Cukup";
                                            } else if ($hasil_akhir >= 49) {
                                                echo "Kurang ";
                                            } else if ($hasil_akhir <= 20) {
                                                echo "Sangat Kurang";
                                            }
                                            // echo $hasil_akhir
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
                        </table>
                    </div>
                </div>
            </div>
</body>
</html>
<?php /**PATH C:\Drivers\xampp\htdocs\penilaian-pegawai\resources\views/content/HasilPenilaian/cetak_pdf.blade.php ENDPATH**/ ?>