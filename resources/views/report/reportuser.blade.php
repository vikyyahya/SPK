<!DOCTYPE html>
<html>

<head>
    <title>Data User</title>
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
        <h5>DATA USER</h4>
            <!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">www.malasngoding.com</a> -->
        </h5>
    </center>

    <table class="table table-striped table-bordered" id="myTable">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Email</th>
                <th class="text-center">Level</th>
                <th class="text-center">Nama Perusahaan</th>
                <th class="text-center">Produk</th>
                <th class="text-center">Alamat Perusahaan</th>
                <th class="text-center">No Telepon</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users ?? '' as $s)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$s->name}}</td>
                <td>{{$s->email}}</td>
                <td>{{$s->levels->nama_level ?? '' }}</td>
                <td>{{$s->nama_perusahaan}}</td>
                <td>{{$s->produk}}</td>
                <td>{{$s->alamat_perusahaan}}</td>
                <td>{{$s->no_telp}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>


</body>

</html>