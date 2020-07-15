@extends('home')
@section('buat_surat_pegawai')
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Tambah Surat Pegawai</h3>
            </div>

            <form action="{{ url('pilih_surat_pegawai') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pegawai</label>
                        <select class="form-control" name="id_pegawai" id="pilih_user" onchange="Pilih_pegawai()">
                            <option value="">Pilih</option>
                            @foreach($data_user as $list)
                                <option value="{{ $list->id }}">{{ $list->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">No Surat</label>
                        <select class="form-control" name="no_surat">
                            <option value=""></option>
                            @foreach($data_surat as $list)
                                <option value="{{ $list->no_surat }}">{{ $list->no_surat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Simpan</button>
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

           console.log(find);
        }
    </script>
@endsection