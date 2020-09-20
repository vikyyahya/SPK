@extends('home')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/updatebobot/{{ $bobot->id}}" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid">
				<div class="card-header">
					<h3 class="card-title">Edit Data Bobot</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

					<div class="form-group">
						<label>Nama Tender</label>
						{{ Form::select('tender', $tender, $bobot->id_tender, ['placeholder' => 'Pilih tender...', 'required', 'class' => 'form-control']) }}
					</div>

					<div class="form-group">
						<label>Kriteria</label>
						{{ Form::select('id_kriteria', $kriteria, $bobot->id_kriteria, ['placeholder' => 'Pilih deskripsi...', 'required', 'class' => 'form-control']) }}
					</div>

					<div class="form-group">
						<label>Nilai Bobot</label>
						{{ Form::select('nilai', $nilai, $bobot->nilai, ['placeholder' => 'Pilih Nilai...', 'required', 'class' => 'form-control']) }}
					</div>

					<div class="form-group">
						<label>Kategori</label>
						{{ Form::select('kategori', $kategori, $bobot->kategori, ['placeholder' => 'Pilih Kategori...', 'required', 'class' => 'form-control']) }}
					</div>


					<div class="card-footer">

						<a href="/" class="btn btn-default">Back</a>
						&nbsp;&nbsp;
						<input type="submit" value="Save" class="pull-right btn btn-primary">

					</div>

				</div>
			</div>
		</form>

	</div>
</div>



@endsection