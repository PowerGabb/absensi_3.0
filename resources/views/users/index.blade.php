@extends('layouts.app')

@section('title', 'Data Siswa')

@section('contents')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
        </div>
        <div class="card-body">
            @if (auth()->user()->level == 'admin')
                <a href="/siswa/create" class="btn btn-primary mb-3">Tambah Data</a>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>Nama Kelas</th>
                            <th>Nama Jurusan</th>
                            @if (auth()->user()->level == 'admin')
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @php($no = 1)
                        @foreach ($data as $item)
                            <tr>
                                <th>{{ $no++ }}</th>
                                <td>{{ $item->nisn }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->kelas->name }}</td>
                                <td>{{ $item->jurusan->name }}</td>
                                @if (auth()->user()->level == 'admin')
                                <form method="POST" action="/siswa/{{$item->id}}">
                                    <td>
                                        <a href="/siswa/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </td>
                                    </form>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
