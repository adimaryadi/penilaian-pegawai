@extends('home')
@section('tambah_karyawan')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Tambah Pegawai</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ url('pegawai') }}" method="POST">
            @csrf
          <div class="card-body">

            <div class="form-group">
              <label for="exampleInputEmail1">NIP</label>
              <input type="number" class="form-control" name="nip" id="exampleInputEmail1" placeholder="NIP" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" class="form-control" name="nama" id="exampleInputEmail1" placeholder="Nama..." required>
            </div>
            
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email..." required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Jabatan</label>
                <input type="text" class="form-control" name="jabatan" id="exampleInputEmail1" placeholder="Jabatan..." required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="Password..." required>
            </div>

            <div class="form-group">
                <label for="">Level</label>
                <select name="level" id="" class="form-control">
                    <option value="admin">Admin</option>
                    <option value="pegawai">Pegawai</option>
                </select>
            </div>
            <div class="form-group" id="no_surat" style="display: none">
              <label for="exampleInputEmail1">No Surat</label>
              <select class="form-control" name="no_surat" >
                  <option value="">Pilih Surat</option>
                  @if(!empty($surat))
                    @foreach($surat as $list)
                        <option value="{{ $list->no_surat }}">{{ $list->no_surat }}</option>
                    @endforeach
                  @endif
              </select>
            </div>
            <div class="form-group">
              <label for="">Status Dinas</label>
            </div>
            <div class="form-group">
               <input type="radio" name="dinas" class="radio" value="sedang_dinas" onclick="Dinas('sedang_dinas')">
               <label for="">Sedang Dinas</label>
            </div>
            <div class="form-group">
               <input type="radio" name="dinas" class="radio" value="tidak_dinas" checked onclick="Dinas('tidak_dinas')">
               <label for="">Tidak Sedang Dinas</label>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
</div> 

<script>
   function Dinas(status) {
      if (status == 'sedang_dinas') {
         $('#no_surat').css('display','block');
      }
      if (status == 'tidak_dinas') {
         $('#no_surat').css('display','none');
      }
   }
</script>
@endsection