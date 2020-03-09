@extends('home')
@section('penilaian')
<div class="card" style="width: 100%;">
    <div class="card-header">
      <h3 class="card-title">Penilaian</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jabatan</th>
                    <th>No Surat </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pegawai as $item)
                    <tr>
                        <td>{{ $item->id_nip }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->jabatan }}</td>
                        <td>{{ $item->no_surat }}</td>
                        <td>
                            <a href="{{ url('penilaian/create') }}"><i class="fas fa-check"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jabatan</th>
                    <th>No Surat </th>
                    <th>Action</th>
                </tr>
            </tfoot>
          </table>
    </div>
    <!-- /.card-body -->
  </div>
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
                    <th>action</th>
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
                        <td>
                            <div>
                                <a href="{{ url('penilaian/'.$item->id.'/edit') }}"><i class="fas fa-edit"></i></a>
                                <a href="#delete" onclick="deletePenilaian('{{ $item->id }}')"><i class="fas fa-eraser" style="color: tomato;"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID NIP</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Kedisiplinan</th>
                    <th>Kerja sama </th>
                    <th>Kode Etik</th>
                    <th>KPL</th>
                    <th>Pembuatan KKa</th>
                    <th>action</th>
                </tr>
            </tfoot>
          </table>
    </div>
    <!-- /.card-body -->
  </div>
  @endif
  <script type="text/javascript">
     function deletePenilaian(id) {
         swal({
             title: 'Apakah Anda yakin?',
             text:  'Penilaian data ini akan di hapus',
             icon:  'warning',
             buttons: true,
             dangerMode: true,
         })
         .then((willdelete) => {
             if (willdelete) {
                 $.ajax({
                     type: "POST",
                     url: "{{ url('penilaian') }}"+'/'+id,
                     data: {
                         _method: 'DELETE',
                         _token:  '{{ csrf_token() }}'
                     },
                     success: function (response) {
                         console.log(response);
                         swal({
                             title: 'Berhasil dihapus',
                             icon:  'success'
                         });
                         setTimeout(() => {
                             return window.location.href    =   '{{ url('penilaian') }}';
                         }, 3000);
                         
                     },
                     error: function(error) {
                         console.log(error);
                         swal({
                             title: 'Error',
                             icon:  'error'
                         });
                     }
                 });
             } else {
                 swal('Cancel Delete');
             }
         });
     }
  </script>
@endsection