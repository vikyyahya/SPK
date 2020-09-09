@extends('home')

@section('content')

<div class="row m-3">
	<div class="col-md-12">
		<form action="/createtender" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid">
				<div class="card-header">
					<h3 class="card-title">Tambah Tender</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

					<div class="form-group">
						<label>Nama Tender</label>
						<input type="text" name="nama_tender" value="{{ old('nama_tender')}}" placeholder="" class="form-control" required autofocus>
					</div>

					<div class="form-group">
						<label>Nama Proyek</label>
						<input type="text" name="nama_proyek" value="{{ old('nama_proyek')}}" placeholder="" class="form-control" required autofocus>
					</div>

					<div class="form-group">
						<label>Nama Pelanggan</label>
						<input type="text" name="nama_pelanggan" value="{{ old('nama_pelanggan')}}" placeholder="" class="form-control" autofocus>
					</div>

					<div class="form-group">
						<label>Batas Waktu</label>
						<div class="input-group">
							<input type="date" name="batas_waktu" value="{{ old('batas_waktu')}}" placeholder="" class="form-control" autofocus>
						</div>
					</div>


					<div class="card-footer">

						<a href="/user" class="btn btn-default">Kembali</a>
						&nbsp;&nbsp;
						<input type="submit" value="Simpan" class="pull-right btn btn-primary">

					</div>

				</div>
			</div>
		</form>

	</div>
</div>



@endsection