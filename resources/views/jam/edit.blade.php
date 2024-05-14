@extends('layouts.app')

@section('title', 'Mengatur Jam Kerja')

@section('contents')
  <form id="formJam" action="/jam/update" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Mengatur Jam Kerja</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="jam">Jam Kerja Forma 24</label>
              <input type="text" class="form-control" id="jam" name="jam" value="{{ $data->jam_kerja }}">
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary" id="ubahButton">Ubah</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection

