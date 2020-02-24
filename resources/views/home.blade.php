@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card dark-card">
                <div class="card-header">
                    <h2><strong>Dashboard</strong></h2>
                    @if(auth()->user()->admin)
                        <a class="btn btn-outline-primary" href="{{route("payments.index")}}">Betalingen</a>
                        <a class="btn btn-outline-primary" href="{{route("users.index")}}">Gebruikers</a>
                    @endif
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(! empty(auth()->user()->api_token))
                        <a href="{{ route("token.show") }}" class="btn btn-outline-primary">Api key bekijken</a>
                    @else
                        <p>Je hebt nog geen Api Key</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
