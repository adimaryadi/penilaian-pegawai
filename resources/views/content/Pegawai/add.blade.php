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
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
</div>   
@endsection