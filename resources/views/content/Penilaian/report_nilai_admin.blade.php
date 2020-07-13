@extends('home')
@section('report_nilai_admin')
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
                    <th>Kedisiplinan</th>
                    <th>Kerja sama </th>
                    <th>Kode Etik</th>
                    <th>KPL</th>
                    <th>Pembuatan KKa</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cari_data as $item)
                    <tr>
                        <td>{{ $item->id_nip }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jabatan }}</td>
                        <td>{{ $item->kedisiplinan }}</td>
                        <td>{{ $item->kerja_sama }}</td>
                        <td>{{ $item->kode_etik }}</td>
                        <td>{{ $item->ketepatan_membuat_laporan }}</td>
                        <td>{{ $item->pembuatan_kka }}</td>
                        <td>
                        	<div class="options">
                        		<button class="btn btn-danger"  onclick="hapus('{{ $item->id }}')">
                        			<i class="fa fa-eraser"></i>
                        		</button>
                        	</div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            
          </table>
    </div>
    <!-- /.card-body -->
  </div>

  <script type="text/javascript">
  		function hapus(id) {
			swal({
			  title: "Apakah Anda yakin ?",
			  text: "penilaian akan dihapus!",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
				$.ajax({
				  type: "POST",
				  url: '{{ url('penilaian') }}'+'/'+id,
				  data: {
				  	 _token: 	'{{ csrf_token() }}',
				  	 _method:    'DELETE'
				  },
				  dataType: 'json'
				})
				.done(function(data) {
					setTimeout(function(){ 
						return location.reload();
					},3000);
					console.log(data);
				});
			  } else {
			    swal("batal!");
			  }
			});
  		}
  </script>
@endsection