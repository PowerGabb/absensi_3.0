@extends('layouts.app')

@section('title', 'Data Absensi Sakit')

@section('contents')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Absensi Sakit</h6>
    </div>
    <div class="card-body">
      <a href="/absensi/create" class="btn btn-primary mb-3">Tambah Absensi</a>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>User ID</th>
              <th>Jam Masuk</th>
              <th>Jam Keluar</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            
            @foreach ($data as $item)
              <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $item->user_id }}</td>
                <td>{{ $item->jam_masuk }}</td>
                <td>{{ $item->jam_pulang }}</td>
                <td>{{ $item->status }}</td>
                <td>
                  <a href="/detail/{{ $item->id }}" class="btn btn-info">Detail</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection