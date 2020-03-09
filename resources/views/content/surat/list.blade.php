@extends('home')
@section('list_surat')
<div class="card" style="width: 100%">
    <div class="card-header">
      <h3 class="card-title">Surat</h3>
      <div class="btn-add">
        <a href="{{ url('surat/create') }}" class="btn btn-primary">Tambah Surat</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body" >
      <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Surat</th>
                <th>tanggal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_surat as $item)
                <tr>
                    <td>{{ $item->no_surat }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>
                        <a href="{{ url('surat/'.$item->id.'/edit') }}"><i class="fas fa-edit"></i></a>
                        <a href="#" onclick="deleteSurat('{{ $item->id }}')"><i class="fas fa-eraser" style="color: tomato;"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Surat</th>
                <th>Tanggal</th>
                <th>Action</th>
            </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

  <script type="text/javascript">
        function deleteSurat(id) {
            swal({
                title: "Apakah anda yakin ?",
                text: "no surat ini akan di hapus",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        url: "{{ url('surat') }}"+'/'+id,
                        data: {
                            _method: 'DELETE',
                            _token:  '{{ csrf_token() }}'
                        },
                        dataType: "JSON",
                        success: function (response) {
                            swal("Surat Sudah di hapus!", {
                                icon: "success",
                            });
                            setTimeout(() => {
                                return window.location.href     =   '{{ url('surat') }}';
                            }, 3000);
                        },
                        error: function(error) {
                            swal("Gagal Menghapus!", {
                                icon: "error",
                            });
                        }
                    });
                } else {
                    swal("dibatalkan!");
                }
            });
        }
  </script>
@endsection