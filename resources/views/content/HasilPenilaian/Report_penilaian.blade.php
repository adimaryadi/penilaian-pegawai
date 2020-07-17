@extends('home')
@section('Report_penilaian')
    <div class="print_out">
        <div class="judul">
            <h3>Hasil Penilaian</h3>
            <?php $no = 1; ?>
            <div class="nilai">
                <table>
                    <tr class="report">
                        <th>Surat:</th>
                        <th>{{ $no_surat }}</th>
                    </tr>

                    <tr class="report">
                        <th>No</th>
                        <th>NIP</th>
                        <th>Kedisiplinan</th>
                        <th>Kerja Sama</th>
                        <th>Kode Etik</th>
                        <th>Ketepatan Membuat Laporan</th>
                        <th>Pembuatan KKA</th>
                        <th>Ditilah Oleh</th>
                        <th>Hasil Akhir</th>
                    </tr>
                    <?php $no  =  1; ?>
                    @foreach($find_penilaian as $list)
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td>{{ $list->id_nip }}</td>
                            <td>
                                <?php
                                    $kedisiplinan       =        0;

                                    if ($list->kedisiplinan == 'sangat_kurang') {
                                        $kedisiplinan   =        4;
                                    }  else if($list->kedisiplinan == 'kurang') {
                                        $kedisiplinan   =        8;
                                    }  else if($list->kedisiplinan == 'cukup') {
                                        $kedisiplinan   =        12;
                                    }  else if($list->kedisiplinan == 'baik') {
                                        $kedisiplinan   =        16;
                                    }  else if($list->kedisiplinan == 'sangat_baik') {
                                        $kedisiplinan   =        20;
                                    }

                                    echo $kedisiplinan;
                                ?>
                            </td>
                            <td>
                                <?php
                                    $kerja_sama       =        0;

                                    if ($list->kerja_sama == 'sangat_kurang') {
                                        $kerja_sama   =        4;
                                    }  else if($list->kerja_sama == 'kurang') {
                                        $kerja_sama   =        8;
                                    }  else if($list->kerja_sama == 'cukup') {
                                        $kerja_sama   =        12;
                                    }  else if($list->kerja_sama == 'baik') {
                                        $kerja_sama   =        16;
                                    }  else if($list->kerja_sama == 'sangat_baik') {
                                        $kerja_sama   =        20;
                                    }
                                    echo $kerja_sama;
                                ?>   
                            </td>
                            <td>
                                <?php
                                    $kode_etik       =        0;

                                    if ($list->kode_etik == 'sangat_kurang') {
                                        $kode_etik   =        4;
                                    }  else if($list->kode_etik == 'kurang') {
                                        $kode_etik   =        8;
                                    }  else if($list->kode_etik == 'cukup') {
                                        $kode_etik   =        12;
                                    }  else if($list->kode_etik == 'baik') {
                                        $kode_etik   =        16;
                                    }  else if($list->kode_etik == 'sangat_baik') {
                                        $kode_etik   =        20;
                                    }
                                    echo $kode_etik;
                                ?>   
                            </td>
                            <td>
                                <?php
                                    $ketepatan_membuat_laporan       =        0;

                                    if ($list->ketepatan_membuat_laporan == 'sangat_kurang') {
                                        $ketepatan_membuat_laporan   =        4;
                                    }  else if($list->ketepatan_membuat_laporan == 'kurang') {
                                        $ketepatan_membuat_laporan   =        8;
                                    }  else if($list->ketepatan_membuat_laporan == 'cukup') {
                                        $ketepatan_membuat_laporan   =        12;
                                    }  else if($list->ketepatan_membuat_laporan == 'baik') {
                                        $ketepatan_membuat_laporan   =        16;
                                    }  else if($list->ketepatan_membuat_laporan == 'sangat_baik') {
                                        $ketepatan_membuat_laporan   =        20;
                                    }
                                    echo $ketepatan_membuat_laporan;
                                ?>   
                            </td>
                            <td>
                                <?php
                                    $pembuatan_kka       =        0;

                                    if ($list->pembuatan_kka == 'sangat_kurang') {
                                        $pembuatan_kka   =        4;
                                    }  else if($list->pembuatan_kka == 'kurang') {
                                        $pembuatan_kka   =        8;
                                    }  else if($list->pembuatan_kka == 'cukup') {
                                        $pembuatan_kka   =        12;
                                    }  else if($list->pembuatan_kka == 'baik') {
                                        $pembuatan_kka   =        16;
                                    }  else if($list->pembuatan_kka == 'sangat_baik') {
                                        $pembuatan_kka   =        20;
                                    }
                                    echo $pembuatan_kka;
                                ?>   
                            </td>
                            <td>{{ $list->dinilai }}</td>
                            <td>
                                <?php 
                                    $hasil_akhir            =        $kedisiplinan + $kerja_sama + $kode_etik + $ketepatan_membuat_laporan + $pembuatan_kka;
                                    if ($hasil_akhir >= 89) {
                                        echo "A";
                                    } else if ($hasil_akhir >= 76) {
                                        echo "B";
                                    } else if ($hasil_akhir >= 61) {
                                        echo "C";
                                    } else if ($hasil_akhir <= 59) {
                                        echo "D";
                                    } else {
                                        echo "E";
                                    }
                                    // echo $hasil_akhir;
                                ?>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
@endsection