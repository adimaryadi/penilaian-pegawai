@extends('home')
@section('edit_karyawan')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit Pegawai</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ url('pegawai/'.$edit->id) }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PATCH">
          <div class="card-body">

            <div class="form-group">
              <label for="exampleInputEmail1">NIP</label>
              <input type="number" class="form-control" name="nip" id="exampleInputEmail1" placeholder="NIP" value="{{ $edit->id_nip }}" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" class="form-control" name="nama" id="exampleInputEmail1" placeholder="Nama..." value="{{ $edit->name }}" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email..." value="{{ $edit->email }}" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Jabatan</label>
                <input type="text" class="form-control" name="jabatan" id="exampleInputEmail1" placeholder="Jabatan..." value="{{ $edit->jabatan }}" required>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="Password...">
            </div>

            <div class="form-group">
                <label for="">No Surat</label>
                <select name="no_surat" id="" class="form-control">
                    <option value="{{ $edit->no_surat }}" selected>{{ $edit->no_surat }}</option>
                    @foreach ($surat as $item)
                        <option value="{{ $item->no_surat }}">{{ $item->no_surat }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="">Level</label>
                <select name="level" id="" class="form-control">
                    <option value="{{ $edit->level }}" selected>{{ $edit->level }}</option>
                    <option value="admin">Admin</option>
                    <option value="pegawai">Pegawai</option>
                </select>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Perbaharui</button>
          </div>
        </form>
      </div>
</div>
@endsection
