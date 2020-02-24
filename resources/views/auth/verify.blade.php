@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="dark-card card">
                <div class="card-header">{{ __('Verifieer jouw emailadres') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Er is een nieuwe verificatie link naar jouw email toegestuurd.') }}
                        </div>
                    @endif

                    {{ __('Voordat je verder gaat kijk of je de verificatie email hebt ontvangen.') }}
                    {{ __('Heb je geen verificatie mail ontvangen') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Klik hier om een nieuwe aan te vragen') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
