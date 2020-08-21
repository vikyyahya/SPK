@extends('home')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/upadateuser/{{$user->id}}" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid">
				<div class="card-header">
					<h3 class="card-title">Edit User</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="name" value="{{$user->name}}" placeholder="" class="form-control" required autofocus>
					</div>

					<div class="form-group">
						<label>Email</label>
						<input type="email" value="{{$user->email}}" name="email" placeholder="" class="form-control">
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" required class="form-control">
                    </div>

					<div class="form-group">
						<label>Konfirmasi Password</label>
						<input type="password" value="" name="syncpassword" required placeholder="" class="form-control">
					</div>
                    
                    <div class="form-group">
						<label>Level</label>
						{{ Form::select('level', $level, $user->level, ['placeholder' => 'Pilih user level...', 'required', 'class' => 'form-control']) }}
					</div>

					<div class="form-group">
						<label>Nama Perusahaan</label>
						<input type="text" name="nama_perusahaan" value="{{$user->nama_perusahaan}}" placeholder="" class="form-control" required autofocus>
					</div>

					<div class="form-group">
						<label>Produk</label>
						<input type="text" name="produk" value="{{$user->produk}}" placeholder="" class="form-control" autofocus>
					</div>

					<div class="form-group">
						<label>No Telepon</label>
						<input type="text" name="no_telp" value="{{$user->no_telp}}" placeholder="" class="form-control"  autofocus>
					</div>

					<div class="form-group">
						<label>Alamat Perusahaan</label>
						<input type="text" name="alamat_perusahaan" value="{{$user->alamat_perusahaan}}" placeholder="" class="form-control" required autofocus>
					</div>

					<div class="form-group">
						<label>NPWP</label>
						<input type="text" name="npwp" value="{{$user->npwp}}" placeholder="" class="form-control" required autofocus>
					</div>

					<div class="card-footer">

						<a href="/user" class="btn btn-default">Back</a>
						&nbsp;&nbsp;
						<input type="submit" value="Save" class="pull-right btn btn-primary">

					</div>

				</div>
			</div>
		</form>

	</div>
</div>



@endsection