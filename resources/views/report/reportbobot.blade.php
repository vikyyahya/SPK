<!DOCTYPE html>
<html>

<head>
    <title>Data Bobot</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>DATA BOBOT</h4>
            <!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">www.malasngoding.com</a> -->
        </h5>
    </center>

    <table class="table table-striped table-bordered" id="myTable">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Tender</th>
                <th class="text-center">Kriteria</th>
                <th class="text-center">Nilai Bobot</th>
                <th class="text-center">Kategori</th>

                <th class="text-center" width="8%">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bobot ?? '' as $s)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$s->tender->nama_tender ?? ''}}</td>
                <td>{{$s->deskripsi}}</td>
                <td>{{$s->nilai}}</td>
                <td>{{$s->kategori}}</td>

                <td>
                    <div class="btn-group">

                        <!-- URL::to('/admin/category/detail.id='.$cate-id -->


                        <a href="/editbobot/{{$s->id}}" class="btn btn-warning  btn-sm" data-toggle="tootip" data-placement="bottom" title="Edit">
                            <i class="fa fa-edit nav-icon"></i>
                        </a>

                        <a onClick="return confirm('Yakin ingin menghapus data?')" href="/bobot/{{$s->id}}/delete" class="btn btn btn-danger btn-sm">
                            <i class="fa fa-trash nav-icon"></i>
                        </a>

                    </div>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>


</body>

</html>