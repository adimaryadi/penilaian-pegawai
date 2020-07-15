@extends('home')
@section('list_pegawai')
    <div class="card" style="width: 100%;">
        <div class="card-header">
            <div class="btn-add">
                <a href="{{ url('pegawai/create') }}" class="btn btn-primary">Tambah Pegawai</a>
            </div>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jabatan</th>
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
                                <td>
                                    <a href="{{ url('pegawai/'.$item->id.'/edit') }}"><i class="far fa-edit"></i></a>
                                    <a href="#" onclick="DeletePegawai('{{ $item->id }}')"><i class="fa fa-eraser" style="color: tomato;"></i></a>
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
                            <th>Action</th>
                        </tr>
                    </tfoot>
                  </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function DeletePegawai(id) {
            swal({
                title: "Apakah Anda Yakin ?",
                text: "Pegawai ini akan di hapus!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    // swal("Poof! Your imaginary file has been deleted!", {
                    //     icon: "success",
                    // });
                    $.ajax({
                        type: "POST",
                        url: "{{ url('pegawai') }}"+'/'+id,
                        data: {
                            _method: 'DELETE',
                            _token:  '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            console.log(response);
                            swal("Pegawai Berhasil di hapus!", {
                                icon: "success",
                            });
                            setTimeout(() => {
                                return window.location.href     =   '{{ url('pegawai') }}';
                            }, 3000);
                        },
                        error: function (error) {
                            console.log(error);
                            swal("Gagal Menghapus Karyawan !", {
                                icon: "error",
                            }); 
                        }
                    });
                } else {
                    swal("Batal Dihapus!");
                }
            });
        }
    </script>
@endsection