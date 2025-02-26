@extends('layouts.app')

@section('title')
    Data | Karyawan
@endsection

@section('page')
  Data Karyawan
@endsection

@section('formcari')
<form action="{{ route('karyawan.index') }}" method="get">
  <div class="input-group">
    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
    <input type="search" name="search" class="form-control" placeholder="Type here...">
  </div>
</form>
@endsection

@section('karyawan')
  "nav-link active"
@endsection
@section('normal')
  "nav-link"
@endsection

@section('content')
<div class="row">
  @if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0 d-flex">
          <h6 class="flex-grow-1">@yield('page')</h6>
          <a href="{{ route('karyawan.create') }}" class="btn btn-primary d-flex"  style="margin-left: 8px">
            <i class="material-icons">save</i>
            <p style="margin: 0 0 0 5px;">Add</p>
          </a>
          <a href="{{ '/karyawan-report' }}" class="btn btn-primary d-flex"  style="margin-left: 8px">
            <i class="material-icons">download</i>
            <p style="margin: 0 0 0 5px;">Cetak</p>
          </a>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-center">No.</th>
                  <th class="text-center">Nama</th>
                  <th class="text-center">Alamat</th>
                  <th class="text-center">Jenis Kelamin</th>
                  <th class="text-center">Tgl lahir</th>
                  <th class="text-center">No Telepon</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($karyawan as $agg)
                    <tr>
                      <td class="text-center">{{ $loop->iteration }}</td>
                      <td>{{ $agg->karyawan->nama }}</td>
                      <td>{{ $agg->karyawan->alamat }}</td>
                      <td>{{ $agg->karyawan->jenis_kelamin }}</td>
                      <td>{{ $agg->karyawan->tgl_lahir }}</td>
                      <td>{{ $agg->karyawan->no_tlp }}</td>
                      <td>
                        <a class='btn btn-success btn-sm' href="{{ route('karyawan.edit',$agg->id) }}">Edit</a>
                        <a class='btn btn-danger btn-sm' href="/karyawan/hapus/{{ $agg->id_karyawan }}">Hapus</a>
                      </td>
                    </tr>
                @empty
                    <tr>
                      <td colspan="7" align="center">Tidak ada data</td>
                    </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{ $karyawan->links() }} 
@endsection