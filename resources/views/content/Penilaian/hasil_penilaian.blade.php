@extends('home')
@section('hasil_penilaian')
	@if(Auth::user()->level == 'admin')
	  <div class="card" style="width: 100%;">
	    <div class="card-header">
	      <h3 class="card-title">No Surat</h3>
	    </div>
	    <!-- /.card-header -->
	    <div class="card-body">
	        <table id="example1" class="table table-bordered table-hover">
	            <thead>
	                <tr>
	                    <th>No Surat</th>

	                </tr>
	            </thead>

	            <tbody>
	                @foreach ($data_surat as $item)
	                    <tr>
	                        <td> <a href="{{ url('cari_surat_nilai?cari_surat='.$item->no_surat) }}">{{ $item->no_surat }}</a></td>
	                    </tr>
	                @endforeach
	            </tbody>
	          </table>
	    </div>
	    <!-- /.card-body -->
	  </div>
	  @endif
@endsection