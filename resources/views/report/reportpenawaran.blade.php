<!DOCTYPE html>
<html>

<head>
    <title>Data Penawaran</title>
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
        <h5>DATA PENAWARAN</h4>
            <!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">www.malasngoding.com</a> -->
        </h5>
    </center>

    <table class="table table-striped table-bordered" id="myTable">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Perusahaan</th>
                <th class="text-center">Nama Tender</th>
                <th class="text-center">Nama Barang</th>
                <th class="text-center">Harga</th>
                <th class="text-center">Stock</th>
                <th class="text-center">Pembayaran</th>
                <th class="text-center">Kualitas</th>
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
                <td>{{$s->kualitas}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>


</body>

</html>