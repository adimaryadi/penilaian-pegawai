@extends('home')
@section('edit_surat_pegawai')
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Edit Surat Pegawai</h3>
            </div>

            <form action="{{ url('pilih_surat_pegawai/'.$data_edit->id) }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pegawai</label>
                        <select class="form-control" name="id_pegawai" id="pilih_user" onchange="Pilih_pegawai()">
                            <option value="{{ $data_edit->id_users }}">tidak ada perubahan</option>
                            @foreach($data_user as $list)
                                <option value="{{ $list->id }}">{{ $list->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{ $data_edit->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $data_edit->email }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" class="form-control" value="{{ $data_edit->jabatan }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">No Surat</label>
                        <select class="form-control" name="no_surat">
                            <option value="{{ $data_edit->no_surat }}">{{ $data_edit->no_surat }}</option>
                            @foreach($data_surat as $list)
                                <option value="{{ $list->no_surat }}">{{ $list->no_surat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">perubahan</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <script type="text/javascript">
        function Pilih_pegawai() {
           var data          =       '<?php echo $data_json_user; ?>';
           var JsonTodata    =       JSON.parse(data);
           var pilih_pegawai =       $('#pilih_user').val();

           var find          =        JsonTodata.find(function (item) {
               return item.id == pilih_pegawai;
           });
           $('#nama').val(find.name);
           $('#email').val(find.email);
           $('#jabatan').val(find.jabatan);

        //    console.log(find);
        }
    </script>
@endsection