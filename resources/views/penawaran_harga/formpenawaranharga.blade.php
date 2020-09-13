@extends('home')

@section('content')

<div class="row">
	<div class="col-md-12">


		<div class="card" style="border-top: 3px solid">
			<div class="card-header">
				<h3 class="card-title">Penawaran harga</h3>
			</div>

			<div class="card-body">

				@if($errors->any())
				<div class="alert alert-danger">
					{{implode('', $errors->all(':message'))}}
				</div>
				@endif

				<div class="row">
					<div class="col-sm-2 invoice-col">
						Nama Perusahaan :
					</div>
					<div class="col-sm-2 invoice-col">
						{{$user->nama_perusahaan}}
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2 invoice-col">
						Alamat :
					</div>
					<div class="col-sm-2 invoice-col">
						{{$user->alamat_perusahaan}}
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-sm-2 invoice-col">
						NPWP :
					</div>
					<div class="col-sm-2 invoice-col">
						{{$user->npwp}}
					</div>
				</div>
				<form action="/creatpenawaran" method="POST" enctype="multipart/form-data">

					@csrf

					<div class="form-group">
						<label>Tender </label>
						{{ Form::select('id_tender', $tender, null, ['placeholder' => 'Pilih tender...', 'required', 'class' => 'form-control']) }}
					</div>

					<div class="form-group">
						<label>Nama Barang</label>
						<input type="text" name="nama_barang" placeholder="" class="form-control" required autofocus>
					</div>

					<div class="form-group">
						<label>Harga</label>
						<input type="text" name="harga" placeholder="" class="form-control">
					</div>

					<div class="form-group">
						<label>Stok</label>
						{{ Form::select('stock', $stock, null, ['placeholder' => 'Pilih stock...', 'required', 'class' => 'form-control']) }}
					</div>

					<div class="form-group">
						<label>Pembayaran</label>
						{{ Form::select('pembayaran', $pembayaran, null, ['placeholder' => 'Pilih pembayaran...', 'required', 'class' => 'form-control']) }}
					</div>

					<div class="form-group">
						<label>Kualitas</label>
						{{ Form::select('kualitas', $kualitas, null, ['placeholder' => 'Pilih Kualitas...', 'required', 'class' => 'form-control']) }}
					</div>

					<div class="form-group">
						<label>Upload dokumen</label>

						<div class="input-group">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="exampleInputFile" name="file">
								<label class="custom-file-label" for="exampleInputFile">Choose file</label>
							</div>

						</div>

					</div>

					<div class="card-footer">

						<a href="/user" class="btn btn-default">Batal</a>
						&nbsp;&nbsp;
						<input type="submit" value="Kirim" class="pull-right btn btn-primary">

					</div>
				</form>


			</div>
		</div>

	</div>
</div>



@endsection