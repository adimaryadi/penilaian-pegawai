@extends('home')
@section('pilih_surat_pegawai')
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
	                    <th>Nama</th>
	                </tr>
	            </thead>

	            <tbody>
	                @foreach ($pegawai as $item)
	                    <tr>
	                        <td>
	                        	<a href="{{ url('cari_surat_nilai?cari_surat='.$item->no_surat) }}">{{$item->no_surat }}
	                        	</a>
	                        </td>
	                        <td>
	                        	{{ $item->name }}
	                        </td>
	                    </tr>
	                @endforeach
	            </tbody>
	          </table>
	    </div>
	    <!-- /.card-body -->
	  </div>
@endsection