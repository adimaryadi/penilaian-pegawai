@extends('home')
@section('view_penilaian')
	<div class="card" style="width: 100%;">
		<div class="card-header">
			<h3 class="title-header">Pilih Penilaian</h3>
		</div>

		<div class="card-body">
			<table id="example1" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Nama</th>
						<th>No Surat</th>
					</tr>
				</thead>

				<tbody>
					@foreach($cari_data as $list)
						<tr>
							<td>{{ $list->name }}</td>
							<td>{{ $list->no_surat }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection