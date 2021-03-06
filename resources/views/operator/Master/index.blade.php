<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Manajemen Pendaftaran Pasien</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <center>
            <h4 class="mt-3">Laporan Data Pendaftaran Pasien Rumah Sakit Bhayangkara</h4>
        </center>
        <hr>
        <p>Tanggal Dibuat : {{ date('d-m-Y') }}</p>
        <p>Waktu Dibuat : {{ date('H:i:s') }}</p>
        <div class="row">
            <div class="col-md-10 offset-1">
                <a href="{{ route('printsO.create') }}" class="col-md-2 btn btn-success">Printout PDF</a>
                <a href="{{ route('operator.index') }}" class="col-md-4 btn btn-danger" style="float: right;">Kembali Ke Halaman Sebelumnya</a>
                <hr>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                @foreach ($regis as $r)
                                <tr>
                                    <th width="20%">NIK</th>
                                    <td>{{ $r->pasien->nik }}</td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $r->pasien->name }}</td>
                                </tr>
                                <tr>
                                    <th>Hasil Diagnosa</th>
                                    <td>{{ $r->pasien->name }}</td>
                                </tr>
                                <tr>
                                    <th>Terakhir Daftar Berobat</th>
                                    <td>{{ $r->pasien->updated_at }}</td>
                                </tr>
                                @endforeach
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>