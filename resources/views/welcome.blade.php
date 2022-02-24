@extends('layouts.app')

@section('content') 
    <div id="welcome-bg">
        <div id="welcome-container">
            <div id="welcome-text">
                {{-- <h1 class="section-title"><span class="section-title-line">Candidaturas</span></h1> --}}
                <h1 class="section-title">Candidaturas</h1>
                <p>Gestiona de forma sencilla todas tus candidaturas</p>
                <div class="welcome-btns">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                </div>
            </div>
            <div id="welcome-img">
                <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </div>
        </div>
    </div>
@endsection