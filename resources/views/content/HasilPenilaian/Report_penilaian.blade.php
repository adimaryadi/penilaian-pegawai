@extends('home')
@section('Report_penilaian')
    <div class="print_out" id="print_now">
        <div class="judul">
            <h3>Hasil Penilaian</h3>
            <?php $no = 1; ?>
            <div class="nilai">
                <table>
                    <tr class="report">
                            <th>Surat:</th>
                            <th>{{ $no_surat }}</th>
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
                        <th>Ketepatan Membuat Laporan</th>
                        <th>Pembuatan KKP</th>
                        <th>Dinilai Oleh</th>
                        <th>Hasil Akhir</th>
                    </tr>
                    <?php $no  =  1; ?>
                    @foreach($find_penilaian as $list)
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td>{{ $list->id_nip }}</td>
                            <td>{{ $list->nama }}</td>
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
                            <td>{{ $list->dinilai }}</td>
                            <td>
                                <?php 
                                    $hasil_akhir            =        $kedisiplinan + $kerja_sama + $kode_etik + $ketepatan_membuat_laporan + $pembuatan_kka;
                                    if ($hasil_akhir >= 90) {
                                        echo "Sangat Baik";
                                    } else if ($hasil_akhir >= 80) {
                                        echo "Baik";
                                    } else if ($hasil_akhir >= 60) {
                                        echo "Cukup";
                                    } else if ($hasil_akhir >= 40) {
                                        echo "Kurang ";
                                    } else if ($hasil_akhir <= 20) {
                                        echo "Sangat Kurang";
                                    }
                                    // echo $hasil_akhir
                                ?>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
    <div class="print-btn">
        <button class="btn btn-primary" onclick="printJS('print_now', 'html')"><i class="fa fa-print" aria-hidden="true"></i></button>
        <a href="{{ url('pdf?no_surat='.$no_surat) }}" class="btn btn-primary"><i class="fa fa fa-file" aria-hidden="true"></i></a>
    </div>
@endsection