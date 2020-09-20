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

<a href="/export_perangkingan/{{$vektor[0]->id_tender}}" class="btn btn-success ml-3">
    <i class="fa fa-print nav-icon">
        Cetak
    </i>
</a>

<div class="card m-3" style="border-top: 2px solid">

    <div class="card-header ">
        <h4>Hasil Perangkingan Pada Tender : {{$vektor[0]->tender->nama_tender}} </h4>
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
                    <th class="text-center">Nama Perusahaan</th>
                    <th class="text-center">Nilai</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vektor ?? '' as $s)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$s->users->nama_perusahaan}}</td>
                    <td>{{$s->nilai}}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
            {{$vektor->links()}}
        </ul>
    </div>
</div>


@endsection