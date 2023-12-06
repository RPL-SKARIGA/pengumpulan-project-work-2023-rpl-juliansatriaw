@extends('nav/kelasdown')

@section('tugas')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Detail Kelas - {{ $kelas->nama }}
                    </div>
                    <div class="card-body">
                        <p>ID Kelas: {{ $kelas->id }}</p>
                        <p>Deskripsi Kelas: {{ $kelas->deskripsi }}</p>
                        <p>Kode Akses Kelas: {{ $kelas->kode_akses }}</p>
                        <div class="mt-3">
                            <a href="{{ route('kelas.edit', $kelas->id) }}" class="btn btn-warning">Edit Kelas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection