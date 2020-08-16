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

<a href="#" class="btn btn-success" data-toggle="tooltip" title="Print"
    onclick="">
    <i class="fas fa-print"></i>
</a>

<a href="/addtender" class="btn btn-primary">
    <i class="fa fa-plus nav-icon"></i>
</a>

<br/>
<br/>

<div class="card .mt-3" style="border-top: 2px solid">

    <div class="card-header ">
        <h4>User</h4>
    </div>

    <div class="card-body">
        <table class="table table-striped table-bordered" id="myTable">
            <thead >
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Proyek</th>
                    <th class="text-center">Nama Pelanggan</th>
                    <th class="text-center">Batas Waktu</th>
                 
                    <th class="text-center" width="8%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tender ?? '' as $s)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$s->nama_proyek}}</td>
                    <td>{{$s->nama_pelanggan}}</td>                 
                    <td>{{$s->batas_waktu}}</td>                 
                    <td>
                        <div class="btn-group">

                            <!-- URL::to('/admin/category/detail.id='.$cate-id -->
                           

                            <a href="#" class="btn btn-warning  btn-sm" data-toggle="tootip"
                                data-placement="bottom" title="Edit">
                                <i class="fa fa-edit nav-icon"></i>
                            </a>

                            <a onClick="return confirm('Yakin ingin menghapus data?')" href="/user/{{$s->id}}/delete"
                                class="btn btn btn-danger btn-sm">
                                <i class="fa fa-trash nav-icon"></i>
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