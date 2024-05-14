@extends('layouts.app')

@section('title', 'Data Kelas')

@section('contents')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
    </div>
    <div class="card-body">
      <a href="/kelas/create" class="btn btn-primary mb-3">Tambah Kelas</a>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Kelas</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            
            @foreach ($data as $item)
              <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $item->name }}</td>
                <form action="{{ route('kelas.destroy', $item->id) }}" method="POST" style="display:inline;">
                <td>
                  <a href="/kelas/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </td>
            </form>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection