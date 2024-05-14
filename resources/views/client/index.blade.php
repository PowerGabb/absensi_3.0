@extends('layouts.app')

@section('title', '')

@section('contents')
  <form id="attendance-form" action="/absensi/masuk" method="post">
    @csrf
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Absensi</h6>
      </div>
      <div class="card-body text-center">
        <h5 id="current-time" class="mb-4"></h5>
        <div class="btn-group" role="group" aria-label="Absensi Options">
          <button id="attendance-button" class="btn btn-primary" type="submit">Jam Masuk</button>
          <a href="/pengajuan-izin" class="btn btn-success">Izin</a>
          <a href="/pengajuan-sakit" class="btn btn-danger">Sakit</a>
        </div>
      </div>
    </div>
  </form>
  <script>
    function updateTime() {
      const now = new Date();
      const hours = now.getHours();
      const minutes = now.getMinutes();
      const seconds = now.getSeconds();
      const formattedTime = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
      document.getElementById('current-time').innerText = formattedTime;

      const attendanceButton = document.getElementById('attendance-button');
      const attendanceForm = document.getElementById('attendance-form');
      if (hours >= {{ $jam_kerja->jam_kerja}}) {
        attendanceButton.innerText = 'Jam Keluar';
        attendanceForm.action = '/absensi/keluar';
      } else {
        attendanceButton.innerText = 'Jam Masuk';
        attendanceForm.action = '/absensi/masuk';
      }
    }

    setInterval(updateTime, 1000);
    updateTime();
  </script>
@endsection
