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

{{-- <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#importExcel">
    <i class="fas fa-file-excel"></i> Import Excel
</button> --}}

<br/>

<a href="/penawaranharga" class="btn btn-primary ml-3">
    <i class="fa fa-plus nav-icon">Buat Penawaran</i>
</a>

<br/>
<br/>

<div class="card m-3" style="border-top: 2px solid">

    <div class="card-header ">
        <h4>User</h4>
    </div>

    <div class="card-body">
        <table class="table table-striped table-bordered" id="myTable">
            <thead >
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Perusahaan</th>
                    <th class="text-center">Nama Tender</th>
                    <th class="text-center">Nama Barang</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Stock</th>
                    <th class="text-center">Pembayaran</th>
                    <th class="text-center" width="8%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($p ?? '' as $s)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$s->user->nama_perusahaan}}</td>
                    <td>{{$s->tender->nama_tender}}</td>                 
                    <td>{{$s->nama_barang ?? '' }}</td>                 
                    <td>{{$s->harga}}</td>                 
                    <td>{{$s->stock}}</td> 
                    <td>{{$s->pembayaran}}</td>                 
                    <td>
                        <div class="btn-group">                    
                            <a href="#" class="btn btn-warning  btn-sm" data-toggle="tootip"
                                data-placement="bottom" title="Edit">
                                <i class="fa fa-edit nav-icon">lihat</i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection