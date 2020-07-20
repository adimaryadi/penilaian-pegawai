@extends('home')
@section('pilih')
    <div class="card" style="width: 100%;">
        <div class="card-header">
            <h3>Pilih Surat</h3>
        </div>
        <div class="card-body">
        	<form action="{{ url('Report_penilaian') }}" method="POST">
        		@csrf
	        	<div class="row">
	        		<div class="col-md-6">
	        			<div class="form-group">
	        				<label>Pilih surat</label>
	        				<select class="form-control" name="no_surat">
	        					<option value="">pilih</option>
	        					@foreach($data_surat as $list)
	        						<option value="{{ $list->no_surat }}">{{ $list->no_surat }}</option>
	        					@endforeach
	        				</select>
	        				<br>
	        				<button type="submit" class="btn btn-primary">
	        					Pilih
	        				</button>
	        			</div>
	        		</div>
	        	</div>
	        </form>
        </div>
    </div>
@endsection