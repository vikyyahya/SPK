@extends('home')

@section('content')

{{-- Notifikasi form validasi --}}
@if ($errors->has('file'))
<span class="invalid-feedback" role="alert">
    <strong>{{$errors->first('file')}}</strong>
</span>
@endif

{{-- notifikasi sukses --}}
@if ($sukses = Session::get('sukses'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <i class="icon fas fa-check"></i> {{ $sukses }}
</div>
@endif
<br />


<!-- <a href="/adduser" class="btn btn-primary ml-3">
    <i class="fa fa-plus nav-icon">Tambah Suplier</i>
</a> -->

<br />
<br />

<div class="card m-3" style="border-top: 2px solid">

    <div class="card-header ">
        <h4>Suplier</h4>
    </div>

    <div class="card-body">
        <table class="table table-striped table-bordered" id="myTable">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Nama Perusahaan</th>
                    <th class="text-center">Produk</th>
                    <th class="text-center">Alamat Perusahaan</th>
                    <th class="text-center">No Telepon</th>
                    <!-- <th class="text-center" width="8%">Action</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach($users ?? '' as $s)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$s->name}}</td>
                    <td>{{$s->email}}</td>
                    <td>{{$s->nama_perusahaan}}</td>
                    <td>{{$s->produk}}</td>
                    <td>{{$s->alamat_perusahaan}}</td>
                    <td>{{$s->no_telp}}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection