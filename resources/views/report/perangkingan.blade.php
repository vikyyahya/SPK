<!DOCTYPE html>
<html>

<head>
    <title>Hasil Perangkingan Pada Tender </title>
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
        <h5>Hasil Perangkingan Pada Tender {{$vektor[0]->tender->nama_tender}}</h4>
            <!-- <h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">www.malasngoding.com</a> -->
        </h5>
    </center>

    <table class="table table-striped table-bordered">
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


</body>

</html>