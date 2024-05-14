@extends('layouts.app')

@section('title', 'Form Kelas')

@section('contents')
  <form action="/kelas/{{ $data->id }}" method="post">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit data</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="nama">Nama Kelas</label>
              <input type="text" class="form-control" id="nama" name="name" value="{{ $data->name }}">
              @error('name')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection