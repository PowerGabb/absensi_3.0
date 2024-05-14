@extends('layouts.app')

@section('title', 'Detail Catatan Absen Izin')

@section('contents')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Detail Catatan Absen Izin</h6>
    </div>
    <div class="card-body">
      <div class="form-group">
        <label for="catatan">Catatan:</label>
        <textarea class="form-control" id="catatan" name="catatan" rows="3" readonly>{{ $data->catatan }}</textarea>
      </div>
    </div>
  </div>
@endsection
