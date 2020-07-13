@extends('home')
@section('pilih_surat')
	<div class="card" style="width: 100%;">
		<div class="card-header">
			<h3 class="card-title">Pilih Surat</h3>
		</div>

		<div class="card-body">
			<form action="{{ url('pilih_penilai_pegawai') }}" method="POST">
				@csrf
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Pilih Surat</label>
							<select class="form-control" name="no_surat">
								@foreach($data_surat as $data)
									<option value="{{ $data->no_surat }}">{{ $data->no_surat }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<button class="btn btn-primary">Pilih</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection