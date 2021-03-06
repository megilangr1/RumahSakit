<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Printout Laporan Dokter</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
    <style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
    <center>
        <h4 class="mt-3">Laporan Pemeriksaan</h4>
    </center>
    <hr>
    <p>Tanggal Dibuat : {{ date('d-m-Y') }}</p>
    <p>Waktu Dibuat : </p>
    <hr>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Poli</th>
                <th>Tgl Lahir</th>
                <th>Telfon</th>
                <th>E-Mail Dokter</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @forelse ($doctor as $d)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $d->nip }}</td>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->service->name }}</td>
                    <td>{{ $d->date_of_birth }}</td>
                    <td>{{ $d->phone }}</td>
                    <td>{{ $d->login->email }}</td>
                    <td>{{ $d->address }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="alert alert-danger text-center"><i>Belum Ada Data Dokter</i></td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>