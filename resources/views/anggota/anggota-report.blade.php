<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Data Anggota Koperasi</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      line-height: 1.4; /* Kurangi line-height untuk lebih banyak data */
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
      margin: 10px 0; /* Kurangi margin */
      font-size: 18pt; /* Kurangi ukuran font */
      color: #2c3e50;
    }
  
    .table-data {
      border-collapse: collapse;
      width: 100%;
      margin-bottom: 10px; /* Kurangi margin */
    }
  
    .table-data tr th,
    .table-data tr td {
      border: 1px solid black;
      font-size: 8pt; /* Kurangi ukuran font */
      padding: 5px 10px; /* Kurangi padding */
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
      font-size: 8pt; /* Kurangi ukuran font */
      margin-top: 10px; /* Kurangi margin */
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
  Laporan Anggota Koperasi
  <div class="subtitle">
    Periode: 01 Januari 2024 - 31 Desember 2024
  </div>
</div>


  <table class="table-data">
    <thead>
      <tr>
        <th>No.</th>
        <th>NIK</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Tgl lahir</th>
        <th>Alamat</th>
        <th>No Telepon</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($anggota as $agg)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $agg->nik }}</td>
            <td>{{ $agg->nama }}</td>
            <td>{{ $agg->jenis_kelamin }}</td>
            <td>{{ $agg->tgl_lahir }}</td>
            <td>{{ $agg->alamat }}</td>
            <td>{{ $agg->email }}</td>
            <td>{{ $agg->no_tlp }}</td>
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
