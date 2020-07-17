@extends('home')
@section('pilih_pegawai')
    <div class="card" style="width: 100%;">
        <div class="card-header">
            <h3>Pilih Pegawai</h3>
        </div>
        <div class="card-body">
        	<table id="example2" class="table table-bordered table-hover">
        		<thead>
        			<tr>
        				<th>Nama</th>
        				<th>email</th>
        				<th>No Surat</th>
        			</tr>
        		</thead>

        		<tbody>
        			@foreach($pagawai as $list)
        				<tr>
        					<td><a href="{{ url('Report_penilaian?id_pegawai='.$list->id.'&no_surat='.$list->no_surat) }}">{{ $list->name }}</a></td>
        					<td>{{ $list->email }}</td>
        					<td>{{ $list->no_surat }}</td>
        				</tr>
        			@endforeach
        		</tbody>
        	</table>
        </div>
    </div>
@endsection