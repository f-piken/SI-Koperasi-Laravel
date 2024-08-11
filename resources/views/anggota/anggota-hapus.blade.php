@extends('layouts.app')

@section('title')
    Data | Anggota
@endsection

@section('page')
  Hapus Data Anggota
@endsection

@section('anggota')
  "nav-link active"
@endsection
@section('normal')
  "nav-link"
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0 d-flex">
          <h6 class="flex-grow-1">@yield('page')</h6>
          <a href="{{ route('anggota.index') }}" class="btn btn-primary d-flex"  style="margin-left: 8px">
            <i class="material-icons">undo</i>
            <p style="margin: 0 0 0 5px;">Kembali</p>
          </a>
        </div>
        <div class="p-4">
            <h4>Ingin Menghapus Data ?</h4>
            <form action="{{ route('anggota.destroy', $anggota->id_member) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-success btn-sm" name="hapus">Yes</button>
                <a class="btn btn-danger btn-sm " href="{{ route('anggota.index') }}">No</a>
            </form>
          </div>
      </div>
    </div>
</div>
@endsection