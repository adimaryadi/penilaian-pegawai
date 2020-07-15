@extends('home')
@section('pilih_pegawai_surat')
<div class="card" style="width: 100%;">
        <div class="card-header">
            <div class="btn-add">
                <a href="{{ url('pilih_surat_pegawai/create') }}" class="btn btn-primary">Tambah Surat Pegawai</a>
            </div>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>nama</th>
                            <th>email</th>
                            <th>jabatan</th>
                            <th>no_surat</th>
                            <th>Dibuat tanggal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach($data_surat as $list)
                                <tr>
                                    <td>{{ $list->nama }}</td>
                                    <td>{{ $list->email }}</td>
                                    <td>{{ $list->jabatan }}</td>
                                    <td>{{ $list->no_surat }}</td>
                                    <td>{{ $list->created_at }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ url('pilih_surat_pegawai/'.$list->id.'/edit') }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button class="btn btn-danger" onclick="Hapus('{{ $list->id }}')">
                                            <i class="fa fa-eraser"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div> 

    <script type="text/javascript">
        function Hapus(id) {
            console.log(id);
        swal({
            title: "Apakah Anda Yakin?",
            text: "Pegawai ini akan di hapus",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "{{ url('pilih_surat_pegawai') }}"+'/'+id,
                    data: {
                        _method: 'DELETE',
                        _token:  '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        // console.log(response);
                        swal("Surat Sudah di hapus!", {
                            icon: "success",
                        });
                        setTimeout(() => {
                            return window.location.href     =   '{{ url('pilih_surat_pegawai') }}';
                        }, 3000);
                    },
                    error: function(error) {
                        swal("Gagal Menghapus!", {
                            icon: "error",
                        });
                    }
                });
            // swal("Poof! Your imaginary file has been deleted!", {
            //   icon: "success",
            // });
            } else {
            swal("Batalkan");
            }
        });
        }
    </script>
@endsection