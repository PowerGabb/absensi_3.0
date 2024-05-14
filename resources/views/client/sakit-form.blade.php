@extends('layouts.app')

@section('title', 'Form Pengajuan Absen Sakit')

@section('contents')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Form Pengajuan Absen Sakit</h6>
    </div>
    <div class="card-body">
      <form action="/pengajuan-sakit" method="POST">
        @csrf
        <div class="form-group">
          <label for="catatan">Catatan:</label>
          <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Ajukan Absen Sakit</button>
      </form>
    </div>
  </div>
@endsection
