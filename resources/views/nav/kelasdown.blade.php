@extends('nav/nav')

@section('container')
    @if(auth()->user()->role == 2)
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Action
        </button>
        <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="{{ route('tugas.create', $kelas->id) }}">Buat Tugas</a></li>
            <li><a class="dropdown-item" href="#">List Siswa</a></li>
            <li><a class="dropdown-item" href="{{ route('kelas.pengaturankelas', $kelas->id) }}">Pengaturan Kelas</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('kelas.show', $kelas->id) }}">Kembali</a></li>
        </ul>
    </div>
    @endif
    @yield('tugas')
@endsection