<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Printout Detail Pemeriskaan Dokter</title>

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
		<br>
    <table class="table">
			<tbody>
				<tr>
					<td colspan="3" width="25%" class="text-right">Tanggal Pemeriksaan :</td>
					<td width="25%">{{ date('d/m/Y', strtotime($check->check_date)) }}</td>
				</tr>
				<tr>
					<td width="25%" class="text-right">Nama Pasien :</td>
					<td width="25%">{{ $check->pasien->name }}</td>
					<td width="25%" class="text-right">Dokter Pemeriksa : </td>
					<td width="25%">{{ $check->dokter->name }}</td>
				</tr>
				<tr>
					<td colspan="4"></td>
				</tr>
				<tr>
					<td colspan="4" class="text-center" style="background-color: #343a40; color: #ffffff;">Hasil Diagnosa</td>
				</tr>
				<tr>
					<td colspan="4"></td>
				</tr>
				<tr>
					<td colspan="2" class="text-center" style="background-color: #343a40; color: #ffffff;">Hasil Diagnosa </td>
					<td colspan="2" class="text-center" style="background-color: #343a40; color: #ffffff;">Deskripsi</td>
				</tr>
				@foreach ($check->diagnosa as $item)
					<tr>
						<td colspan="2" class="text-center">{{ $item->result }}</td>
						<td colspan="2" class="text-center">{{ $item->description == null ? 'Tidak Ada Deskripsi' : $item->description }}</td>
					</tr>
				@endforeach
				<tr>
					<td class="text-center" style="background-color: #343a40; color: #ffffff;">Nama Obat </td>
					<td class="text-center" style="background-color: #343a40; color: #ffffff;">Aturan Minum</td>
					<td class="text-center" colspan="2" style="background-color: #343a40; color: #ffffff;">Deskripsi</td>
				</tr>
				@foreach ($check->obat as $item)
					<tr>
						<td class="text-center">{{ $item->medicine_name }}</td>
						<td class="text-center">{{ $item->rules }}</td>
						<td class="text-center" colspan="2">{{ $item->description == null ? 'Tidak Ada Deskripsi' : $item->description }}</td>
					</tr>
				@endforeach
			</tbody>
    </table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>