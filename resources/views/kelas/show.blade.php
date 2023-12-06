@extends('nav/kelasdown')

@section('tugas')
@if($kelas->tugas->count() === 0)
<br>
    <p>Belum ada tugas.</p>
@else
<div class="row ">
@foreach ($kelas->tugas as $tugasItem)
    <div class="card mt-3 mb-3">
        <div class="card-header">
            {{ $tugasItem->nama }}
        </div>
        <div class="card-body">
          <blockquote class="blockquote ">
            <p>{{ $tugasItem->deskripsi }}</p>
            <a href="{{ route('tugas.show', ['kelas' => $kelas, 'tugas' => $tugasItem]) }}" class="btn stretched-link mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5"/>
                </svg>
            </a>
            <footer class="blockquote-footer">Dipost pada : {{ $tugasItem->created_at->format('d M Y H:i') }}</cite></footer>
          </blockquote>
        </div>
      </div>
@endforeach
@endif
@endsection