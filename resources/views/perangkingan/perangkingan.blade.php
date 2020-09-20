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

<br />

<!-- <a href="/addtender" class="btn btn-primary ml-3">
    <i class="fa fa-plus nav-icon">
    Tambah Tender
    </i>
</a> -->

<div class="card m-3" style="border-top: 2px solid">

    <div class="card-header ">
        <h4>Perangkingan</h4>
        <div class="card-tools mr-1">
            <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body ">
        <table class="table table-striped table-bordered" id="myTable">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Tender</th>
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
                    <td>{{$s->nama_tender}}</td>
                    <td>{{$s->nama_proyek}}</td>
                    <td>{{$s->nama_pelanggan}}</td>
                    <td>{{$s->batas_waktu}}</td>
                    <td>
                        <div class="btn-group">

                            <!-- URL::to('/admin/category/detail.id='.$cate-id -->


                            <a href="/hitungperangkingan/{{$s->id}}" class="btn btn-warning  btn-sm" data-toggle="tootip" data-placement="bottom" title="Perangkingan">
                                <i class="">Perangkingan</i>
                            </a>

                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
            {{$tender->links()}}
        </ul>
    </div>
</div>


@endsection