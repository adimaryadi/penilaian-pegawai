@extends('home')
@section('view_penilaian')
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
                </tr>
            </thead>
            <tbody>
                <!-- {{ $cari_data }} -->
                @foreach($cari_data as $item)
                	<tr>
                		<td><a href="{{ url('car_nip?no_nip='.$item->id_nip) }}">{{ $item->id_nip }}</a></td>
                		<td>{{ $item->name }}</td>
                		<td>{{ $item->jabatan }}</td>
                	</tr>
                @endforeach
            </tbody>

          </table>
    </div>
    <!-- /.card-body -->
  </div>
  @endif
@endsection