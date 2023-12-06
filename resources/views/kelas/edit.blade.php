@extends('nav/nav')

@section('container')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-warning text-white">Edit Kelas - {{ $kelas->nama }}</div>
                    <div class="card-body">
                        <form action="{{ route('kelas.update', $kelas->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama">Nama Kelas:</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="{{ $kelas->nama }}" required>
                            </div>

                            <!-- Tambahkan input untuk deskripsi jika diperlukan -->
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi:</label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3">{{ $kelas->deskripsi }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-success mt-2">Perbarui</button>
                        </form>

                        <!-- Tombol untuk menampilkan modal -->
                        <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                            Hapus Kelas
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Penghapusan -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Penghapusan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus kelas ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <!-- Formulir untuk penghapusan -->
                    <form action="{{ route('kelas.destroy', $kelas->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection