

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PT Powertek Indonesia| Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('lte/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body >
<div>
  <div class="login-logo">
    <a href="#"><b>PT Powertek Indonesia</b></a>
  </div>
  <!-- /.login-logo -->

  <div class="card ml-5 mr-5">
    <div class="card-body">
        <div class="card card-info ml-5 mr-5">
              <div class="card-header">
                <h3 class="card-title">Form Daftar</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal"  method="POST" action="{{ route('register') }}" >
                @csrf
					      @if($errors->any())
                <div class="alert alert-danger">
						      {{implode('', $errors->all(':message'))}}
					      </div>
      					@endif

                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" value="{{ old('name')}}" require class="form-control" name="name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" value="{{ old('email')}}" require class="form-control" name="email" >
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" value="" require class="form-control" name="password" placeholder="Password">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Ulangi Password</label>
                    <div class="col-sm-10">
                      <input type="password" require class="form-control" name="password_confirmation" >
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                    <div class="col-sm-10">
                      <input type="text" value="{{ old('nama_perusahaan')}}" class="form-control" name="nama_perusahaan" placeholder="" require>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Produk</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="produk" value="{{ old('produk')}}"  placeholder="" require>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">No Telepon</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="no_telp" value="{{ old('no_telp')}}" placeholder="" require>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">NPWP</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="npwp" value="{{ old('npwp')}}" placeholder="" require>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Alamat Perusahaan</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="alamat_perusahaan" value="{{ old('alamat_perusahaan')}}" placeholder="" require>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info btn-block">Daftar</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            
        <div class="row ml-5 mr-5">
          <div class="col-8">
                      </div>
          <!-- /.col -->
          <!-- <div class="col-4">
            <button type="submit" class="btn btn-info btn-block">Daftar</button>
          </div> -->
          <!-- /.col -->
        </div> 
      <a href="/login" class="text-center ml-5">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('lte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('lte/dist/js/adminlte.min.js')}}"></script>

</body>
</html>
