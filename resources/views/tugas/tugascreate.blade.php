@extends('nav/kelasdown')

@section('tugas')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-warning text-white">Membuat Tugas Baru - {{ $kelas->nama }}</div>
                <div class="card-body">
                    <form action="{{ route('tugas.store', $kelas->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="nama">Nama Tugas</label>
                            <input type="text" name="nama" id="nama" class="form-control mt-2" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Tugas</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control mt-2" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="file">File (Opsional)</label>
                            <input type="file" name="file" id="file" class="form-control-file mt-2">
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Buat Tugas</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
