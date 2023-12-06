@extends('nav/regnav')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if(session()->has('failed'))          
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                {{ session('failed') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @elseif(session()->has('invalidpass'))    
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                {{ session('invalidpass') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="card">
                <div class="card-header bg-dark text-white">
                    {{ __('Register Akun') }}
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.submit') }}">
                        @csrf

                        <div class="form-group">
                            <label for="username">{{ __('Username') }}</label>
                            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Masukkan username..." pattern="^\S*$" title="Username tidak boleh mengandung spasi">
                        </div>

                        <div class="form-group mt-2">
                            <label for="name">{{ __('Nama Lengkap') }}</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Ex : Yudi Santoso">
                        </div>

                        <div class="form-group mt-2">
                            <label for="email">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Ex : yudi@gmail.com">
                        </div>

                        <div class="form-group mt-2">
                            <label for="role">{{ __('Role') }}</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="role" id="siswa" value="1" {{ old('role', 1) == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="siswa">Siswa</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="role" id="guru" value="2" {{ old('role') == 2 ? 'checked' : '' }}>
                                <label class="form-check-label" for="guru">Guru</label>
                            </div>
                        </div>

                        <div class="form-group mt-2">
                            <label for="mapel">{{ __('Kelas / Mapel') }}</label>
                            <input id="mapel" type="text" class="form-control" name="mapel" value="{{ old('mapel') }}" required autocomplete="mapel" placeholder="Ex : RPL">
                        </div>

                        <div class="form-group mt-2">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="Masukkan Password" >
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-secondary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

