@extends('layouts.app')

@section('title', 'Form Kelas')

@section('contents')
  <form action="/kelas" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Kelas</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="nama">Nama Kelas</label>
              <input type="text" class="form-control" id="nama" name="name" value="">
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