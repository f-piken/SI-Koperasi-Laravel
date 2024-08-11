<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Data Pinjaman Koperasi</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      line-height: 1.6;
      color: #333;
    }

    .header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 0; /* Kurangi padding */
      border-bottom: 1px solid #2c3e50; /* Kurangi tebal border */
    }
  
    .header img {
      height: 60px; /* Kurangi ukuran gambar */
    }
  
    .header h3 {
      margin: 0;
      font-size: 14pt; /* Kurangi ukuran font */
      color: #2c3e50;
    }
  
    .header .koperasi-info {
      font-size: 8pt; /* Kurangi ukuran font */
      color: #555;
    }

    .title {
      text-align: center;
      margin-top: 20px;
      margin-bottom: 20px;
      font-size: 24pt;
      color: #2c3e50;
    }

    .title .subtitle {
      font-size: 14pt;
      color: #777;
    }

    .title::after {
      content: "";
      display: block;
      width: 200px;
      margin: 10px auto;
      border-bottom: 2px solid #2c3e50;
    }

    .table-data {
      border-collapse: collapse;
      width: 100%;
      margin-bottom: 20px;
    }

    .table-data tr th,
    .table-data tr td {
      border: 1px solid black;
      font-size: 11pt;
      padding: 10px 20px;
      text-align: center;
    }

    .table-data tr th {
      background-color: #2c3e50;
      color: white;
    }

    .table-data tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .table-data tr:hover {
      background-color: #f5f5f5;
    }

    .footer {
      text-align: center;
      font-size: 10pt;
      margin-top: 20px;
      color: #777;
    }
  </style>
</head>

<body>
  <div class="header">
    <img src="{{ public_path('tamplate/assets/img/logo-koperasi.png')}}" alt="Logo Koperasi">
    <div class="header-details">
      <h3>Koperasi XYZ</h3>
      <div class="koperasi-info">
        Jl. Contoh Alamat No. 123, Kota ABC, Telp: (021) 123-4567<br>
        Email: info@koperasixyz.com | Website: www.koperasixyz.com
      </div>
    </div>
</div>
<div class="title">
  Laporan Pinjaman Koperasi
  <div class="subtitle">
    Periode: 01 Januari 2024 - 31 Desember 2024
  </div>
</div>


  <table class="table-data">
    <thead>
      <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>Jumlah Pinjaman</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Jatuh Tempo</th>
        <th>Tenor</th>
        <th>Jumlah Bayar</th>
        <th>Status Pinjaman</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($pinjaman as $pjm)
          <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $pjm->anggota->nama }}</td>
              <td>{{ $pjm->jumlah_pinjaman }}</td>
              <td>{{ $pjm->tgl_pinjam }}</td>
              <td>{{ $pjm->tgl_jatuh_tempo }}</td>
              <td>{{ $pjm->tenor }}</td>
              <td>{{ $pjm->jumlah_bayar }}</td>
              <td>{{ $pjm->status_pinjaman }}</td>
          </tr>
      @empty
          <tr>
              <td colspan="8" align="center">Tidak ada data</td>
          </tr>
      @endforelse
    </tbody>
  </table>

  <div class="footer">
    Dicetak pada: {{ \Carbon\Carbon::now()->format('d M Y') }}
  </div>
</body>

</html>
