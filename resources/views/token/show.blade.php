@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card dark-card">
                    <div class="card-header">API KEY</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-responsive main-table table-striped">
                            <thead>
                                <th>API Key</th>
                            </thead>
                            <tbody>
                            @if(! empty($token))
                                <td>{{$token}}</td>
                            @else
                                <td>Je hebt nog geen API Key. Klik <a href="{{ route("token.update") }}">hier</a> om er een aan te maken.</td>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
