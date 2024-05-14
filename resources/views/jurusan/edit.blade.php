@extends('layouts.app')

@section('title', 'Form Jurusan')

@section('contents')
  <form action="/jurusan/{{ $data->id }}" method="post">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Jurusan</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="nama">Nama Jurusan</label>
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