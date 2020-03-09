@extends('home')
@section('edit_surat')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit Surat</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{ url('surat/'.$edit->id) }}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PATCH">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">No Surat</label>
              <input type="text" class="form-control" name="no_surat" id="exampleInputEmail1" value="{{ $edit->no_surat }}" placeholder="No Surat" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Tanggal</label>
              <input type="date" class="form-control" name="tanggal" value="{{ $edit->tanggal }}" id="exampleInputPassword1" required>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Updated</button>
          </div>
        </form>
      </div>
</div>

@endsection