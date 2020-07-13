@extends('home')
@section('hasil_keseluruhan')
	  <div class="card" style="width: 100%;">
	    <div class="card-header">
	      <h3 class="card-title">No NIP</h3>
	    </div>
	    <!-- /.card-header -->
	    <div class="card-body">
	        <table id="example1" class="table table-bordered table-hover">
	            <thead>
	                <tr>
	                    <th>No NIP</th>
	                    <th>Nama</th>
	                </tr>
	            </thead>

	            <tbody>
	                @foreach ($pegawai as $item)
	                    <tr>
	                        <td>
	                        	<a href="{{ url('hasil_nilai?cari_surat='.$item->id_nip) }}">{{$item->id_nip }}
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