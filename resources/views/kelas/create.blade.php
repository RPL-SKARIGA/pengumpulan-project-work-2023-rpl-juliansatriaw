@extends('nav/nav')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-dark text-white">Create Kelas</div>
                <div class="card-body">
                    <form action="{{ route('kelas.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Kelas:</label>
                            <input type="text" class="form-control" name="nama" id="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Deskripsi Kelas:</label>
                            <textarea type="text" class="form-control" name="deskripsi" id="deskripsi" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection