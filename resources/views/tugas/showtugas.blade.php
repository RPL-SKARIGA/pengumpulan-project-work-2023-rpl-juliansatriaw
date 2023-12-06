@extends('nav/kelasdown')

@section('tugas')

<h2>{{ $tugas->nama }}</h2>
<br>
<h4>{{ $tugas->deskripsi }}</h4>
<hr>
    @if($tugas->file)
        <p>File: <a href="{{ asset('public/storage/' . $tugas->file) }}" target="_blank">{{ $tugas->file }}</a></p>
    @else
        <p>No file attached.</p>
    @endif

<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Kumpulkan Tugas</button>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasRightLabel">Form Pengumpulan Tugas</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    ...
  </div>
</div>
@endsection