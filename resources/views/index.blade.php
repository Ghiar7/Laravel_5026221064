<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Membuat Pencarian Pada Laravel - www.malasngoding.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<!-- Navbar -->
<nav>
    <div class="d-flex justify-content-center mt-3">
        @if (!request()->is(['pegawai/edit*', 'pegawai/tambah*', 'kertashvs/edit*', 'kertashvs/create*']))
            <a href="/pegawai"
                class="btn {{ request()->is('pegawai*') ? 'btn-primary' : 'btn-secondary' }} me-2">
                Data Pegawai
            </a>
            <a href="/"
                class="btn {{ request()->is('welcome*') ? 'btn-primary' : 'btn-secondary' }} me-2">
                Dashboard
            </a>
            <a href="/kertashvs"
                class="btn {{ request()->is('kertashvs*') ? 'btn-primary' : 'btn-secondary' }}">
                Data Kertas HVS
            </a>
        @endif
    </div>
</nav>

	<div class="container">
		<div class="card">
			<div class="card-body">


				<h2 class="text-center"><a href="https://www.malasngoding.com">www.malasngoding.com</a></h2>

				<h3>Data Pegawai</h3>

				<p>Cari Data Pegawai :</p>

				<div class="form-group">

				</div>
				<form action="/pegawai/cari" method="GET" class="form-inline">
					<input class="form-control" type="text" name="cari" placeholder="Cari Pegawai .." value="{{ old('cari') }}">
					<input class="btn btn-primary ml-3" type="submit" value="CARI">
				</form>

				<br/>

				<table class="table table-bordered">
					<tr>
						<th>Nama</th>
						<th>Jabatan</th>
						<th>Umur</th>
						<th>Alamat</th>
						<th>Opsi</th>
					</tr>
					@foreach($pegawai as $p)
					<tr>
						<td>{{ $p->pegawai_nama }}</td>
						<td>{{ $p->pegawai_jabatan }}</td>
						<td>{{ $p->pegawai_umur }}</td>
						<td>{{ $p->pegawai_alamat }}</td>
						<td>
							<a class="btn btn-warning btn-sm" href="/pegawai/edit/{{ $p->pegawai_id }}">Edit</a>
							<a class="btn btn-danger btn-sm" href="/pegawai/hapus/{{ $p->pegawai_id }}">Hapus</a>
						</td>
					</tr>
					@endforeach
				</table>

				<br/>
				Halaman : {{ $pegawai->currentPage() }} <br/>
				Jumlah Data : {{ $pegawai->total() }} <br/>
				Data Per Halaman : {{ $pegawai->perPage() }} <br/>
				<br/>

				{{ $pegawai->links() }}
			</div>
		</div>
	</div>


</body>
</html>
