@extends('home')

@section('content')

<!-- 
<a href="/penawaranharga" class="btn btn-primary ml-3">
    <i class="fa fa-plus nav-icon">Buat Penawaran {{$penawaran}}</i>
</a> -->


<div class="embed-responsive embed-responsive-1by1">
    <!-- <iframe class="embed-responsive-item" src="https://docs.google.com/gview?url=http://localhost:8000/uploads/{{$penawaran}}&embedded=true"></iframe> -->
    <iframe class="embed-responsive-item" src="http://localhost:8001/uploads/{{$penawaran}}" frameborder="0" style="width:100%;min-height:740px;"></iframe>
</div>


@endsection