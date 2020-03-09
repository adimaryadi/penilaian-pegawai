@extends('home')
@section('edit_nilai')
<div class="penilaian-pegawai" style="width: 100%;">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Penilaian</h3>
          
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ url('penilaian/'.$edit->id) }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PATCH">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">ID</label>
              <select name="id_pegawai" id="pegawai_pilih" class="form-control" required onchange="ChangData()">
                  <option value="{{ $edit->id_nip }}">{{ $edit->id_nip }}</option>
                  @foreach ($pegawai as $item)
                      <option value="{{ $item->id_nip }}">{{ $item->id_nip }}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Nama</label>
              <input type="text" class="form-control" name="nama" id="nama" value="{{ $edit->nama }}" placeholder="Nama" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Jabatan</label>
                <input type="text" class="form-control" name="jabatan" id="jabatan" value="{{ $edit->jabatan }}" placeholder="Nama" required>
              </div>
            <div class="form-group">
                <label for="">Kedisiplinan</label>
                <div class="form-group clearfix">
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="radioPrimary1" name="kedisiplinan"  value="sangat_kurang"       >
                      <label for="radioPrimary1">
                          Sanggat Kurang
                      </label>
                    </div>
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="radioPrimary2" name="kedisiplinan" value="kurang"              >
                      <label for="radioPrimary2">
                          Kurang
                      </label>
                    </div>
                    <div class="icheck-primary d-inline">
                        <input type="radio" id="tes" name="kedisiplinan" value="cukup"   >
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
                        <input type="radio" id="tes2" name="kedisiplinan" value="sanggat_baik"                  >
                        <label for="tes2">
                            Sanggat Baik
                        </label>
                    </div>
                  </div>
            </div>
            <div class="form-group">
                <label for="">Kerja Sama</label>
                <div class="form-group clearfix">
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="kerja_sama1" name="kerja_sama"  value="sangat_kurang">
                      <label for="kerja_sama1">
                          Sanggat Kurang
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
                        <input type="radio" id="kerja_sama5" name="kerja_sama" value="sanggat_baik"  >
                        <label for="kerja_sama5">
                            Sanggat Baik
                        </label>
                    </div>
                  </div>
            </div>
            <div class="form-group">
                <label for="">Kode Etik</label>
                <div class="form-group clearfix">
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="kode_etik1" name="kode_etik"  value="sangat_kurang">
                      <label for="kode_etik1">
                          Sanggat Kurang
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
                        <input type="radio" id="kode_etik5" name="kode_etik" value="sanggat_baik"  >
                        <label for="kode_etik5">
                            Sanggat Baik
                        </label>
                    </div>
                  </div>
            </div>
            <div class="form-group">
                <label for="">Ketepatan Waktu Pembuatan Laporan</label>
                <div class="form-group clearfix">
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="ketepatan_waktu_laporan1" name="ketepatan_waktu_laporan"  value="sangat_kurang">
                      <label for="ketepatan_waktu_laporan1">
                          Sanggat Kurang
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
                        <input type="radio" id="ketepatan_waktu_laporan5" name="ketepatan_waktu_laporan" value="sanggat_baik"  >
                        <label for="ketepatan_waktu_laporan5">
                            Sanggat Baik
                        </label>
                    </div>
                  </div>
            </div>
            <div class="form-group">
                <label for="">Pembuatan KKA</label>
                <div class="form-group clearfix">
                    <div class="icheck-primary d-inline">
                      <input type="radio" id="pembuatan_kka1" name="pembuatan_kka"  value="sangat_kurang">
                      <label for="pembuatan_kka1">
                          Sanggat Kurang
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
                        <input type="radio" id="pembuatan_kka5" name="pembuatan_kka" value="sanggat_baik"  >
                        <label for="pembuatan_kka5">
                            Sanggat Baik
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
    $(document).ready(function () {
        let kedisiplinan          =     '{{ $edit->kedisiplinan }}';
        if (kedisiplinan == 'sangat_kurang') {
            $('#radioPrimary1').attr('checked','ckecked');
        } else if (kedisiplinan == 'kurang') {
            $('#radioPrimary2').attr('checked','ckecked');
        } else if (kedisiplinan == 'cukup') {
            $('#tes').attr('checked','checked');
        } else if (kedisiplinan == 'baik') {
            $('#tes1').attr('checked','checked');
        } else if (kedisiplinan == 'sanggat_baik') {
            $('#tes2').attr('checked','checked');
        }

        let kerja_sama      =       '{{ $edit->kerja_sama }}';
        switch (kerja_sama) {
            case 'sangat_kurang':
                $('#kerja_sama1').attr('checked','checked');
                break;
            case 'kurang': 
                $('#kerja_sama2').attr('checked','checked');
                break;
            case 'cukup': 
                $('#kerja_sama3').attr('checked','checked');
                break;
            case 'baik':
                $('#kerja_sama4').attr('checked','checked');
                break;
            case 'sanggat_baik':
                $('#kerja_sama5').attr('checked','checked');
                break;
            default:
                return kerja_sama   = '';
                break;
        }

        let kode_etik      =       '{{ $edit->kode_etik }}';
        switch (kode_etik) {
            case 'sangat_kurang':
                $('#kode_etik1').attr('checked','checked');
                break;
            case 'kurang': 
                $('#kode_etik2').attr('checked','checked');
                break;
            case 'cukup': 
                $('#kode_etik3').attr('checked','checked');
                break;
            case 'baik':
                $('#kode_etik4').attr('checked','checked');
                break;
            case 'sanggat_baik':
                $('#kode_etik5').attr('checked','checked');
                break;
            default:
                return kode_etik   = '';
                break;
        }

        let ketepatan_membuat_laporan      =       '{{ $edit->ketepatan_membuat_laporan }}';
        console.log(ketepatan_membuat_laporan);
        switch (ketepatan_membuat_laporan) {
            case 'sangat_kurang':
                $('#ketepatan_waktu_laporan1').attr('checked','checked');
                break;
            case 'kurang': 
                $('#ketepatan_waktu_laporan2').attr('checked','checked');
                break;
            case 'cukup': 
                $('#ketepatan_waktu_laporan3').attr('checked','checked');
                break;
            case 'baik':
                $('#ketepatan_waktu_laporan4').attr('checked','checked');
                break;
            case 'sanggat_baik':
                $('#ketepatan_waktu_laporan5').attr('checked','checked');
                break;
            default:
                return ketepatan_membuat_laporan   = 'kosong';
                break;
        }

        let pembuatan_kka      =       '{{ $edit->pembuatan_kka }}';
        console.log(pembuatan_kka);
        switch (pembuatan_kka) {
            case 'sangat_kurang':
                $('#pembuatan_kka1').attr('checked','checked');
                break;
            case 'kurang': 
                $('#pembuatan_kka2').attr('checked','checked');
                break;
            case 'cukup': 
                $('#pembuatan_kka3').attr('checked','checked');
                break;
            case 'baik':
                $('#pembuatan_kka4').attr('checked','checked');
                break;
            case 'sanggat_baik':
                $('#pembuatan_kka5').attr('checked','checked');
                break;
            default:
                return pembuatan_kka   = '';
                break;
        }
        
    });
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
        }
        // console.log(find);
    }
</script>
@endsection