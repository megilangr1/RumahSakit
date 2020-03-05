<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Manajemen Laporan</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <center>
            <h4 class="mt-3">Laporan Data Riwayat Pemeriksaan Dokter Rumah Sakit Bhayangkara</h4>
        </center>
        <hr>
        <p>Tanggal Dibuat : {{ date('d-m-Y') }}</p>
        <p>Waktu Dibuat : {{ date('H:i:s') }}</p>
        <div class="row">
            <div class="offset-1">
                <hr>
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
							<th>Tgl Check Up</th>
							<th>Nama Pasien</th>
                            <th>Nama Dokter</th>
                            <th>Hasil Diagnosa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @forelse ($cek as $c)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $c->check_date }}</td>
                            <td>{{ $c->pasien->name }}</td>
                            <td>{{ $c->dokter->name }}</td>
                            <td>{{ $c->diagnosa->result }}</td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="alert alert-danger text-center"><i>Belum Ada Data Dokter</i></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
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