@extends('home')
@section('report_nilai')
  @if(Auth::user()->level == 'admin')
  <div class="card" style="width: 100%;">
    <div class="card-header">
      <h3 class="card-title">Hasil penilaian</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID NIP</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Kedisiplinan</th>
                    <th>Kerja sama </th>
                    <th>Kode Etik</th>
                    <th>KPL</th>
                    <th>Pembuatan KKa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penilaian_pegawai as $item)
                    <tr>
                        <td>{{ $item->id_nip }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jabatan }}</td>
                        <td>{{ $item->kedisiplinan }}</td>
                        <td>{{ $item->kerja_sama }}</td>
                        <td>{{ $item->kode_etik }}</td>
                        <td>{{ $item->ketepatan_membuat_laporan }}</td>
                        <td>{{ $item->pembuatan_kka }}</td>
                    </tr>
                @endforeach
            </tbody>
            
          </table>
    </div>
    <!-- /.card-body -->
  </div>
  @endif
@endsection