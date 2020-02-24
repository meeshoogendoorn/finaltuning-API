@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card dark-card">
                    <div class="card-header">API Key</div>

                    <div class="card-body">
                        <a href="{{ route("token.update") }}" class="btn btn-outline-primary">API Key aanmaken</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
