@extends('nav/nav')

@section('container')
    @if(count($kelas) === 0)
        <p>Belum masuk kelas.</p>
    @else
        <div class="row row-cols-2 row-cols-md-4 g-1">
            @foreach($kelas as $kelasItem)
                <div class="card ms-1">
                    <div class="card-header">
                    {{ $kelasItem->nama }}
                    </div>
                    <div class="card-body">
                    <p class="card-text">{{ $kelasItem->deskripsi }}</p>
                    <a href="{{ route('kelas.show', $kelasItem->id) }}" class="btn stretched-link"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0m-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707z"/>
                      </svg></a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
