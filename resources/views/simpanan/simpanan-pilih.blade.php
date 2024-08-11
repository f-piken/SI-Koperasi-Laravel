@extends('layouts.app')

@section('title')
    Data | Simpanan
@endsection

@section('page')
  Pilih Data Simpanan
@endsection

@section('simpanan')
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
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <form action="{{ route('simpanan.store') }}" method="POST" class="p-4">
              @csrf
              <div class=" form-group">
                  <label for="nama">Nama Anggota</label>
                  <select name="nama" id="nama" class="form-select">
                    <option value="">Pilih Anggota</option>
                    @foreach($agg as $agg)
                        <option value="{{ $agg->id_member }}" data-additional="{{ $agg->nama }}">{{ $agg->nama }}</option>
                    @endforeach
                  </select>
              </div>
          
              <div class="form-group">
                <label for="jenis">Jenis Simpanan</label>
                <select class="form-control" id="jenis" name="jenis">
                    <option value="">Pilih Jenis Simpanan</option>
                    <option value="pokok">Pokok</option>
                    <option value="wajib">Wajib</option>
                    <option value="sukarela">Sukarela</option>
                </select>
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection