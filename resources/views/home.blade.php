@extends('layouts.app')

@section('content')
<div class="container">
    @if(! auth()->user()->user_api_info->payment_status)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h4 class="alert-heading">Payment status</h4>
            <strong>You haven't payed yet!</strong> Pay as soon as possible to get access to the API again.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
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
                    <div class="row">
                        <div class="col-md-4">
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
                        <div class="col-md-8">
                    @php
                            $request_info = auth()->user()->request;
                    @endphp
                    @if(! empty($request_info))
                            <table class="table main-table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Requests (Betaling)</th>
                                    <th scope="col">Maximale requests per betaling</th>
                                    <th scope="col">Requests (Altijd)</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            {{ ($request_info->requests == 0 || empty($request_info->requests)) ? 0 : $request_info->requests }}
                                        </td>
                                        <td>
                                            {{ ($request_info->max_requests == 0 || empty($request_info->max_requests)) ? "Unlimited" : $request_info->max_requests }}
                                        </td>
                                        <td>
                                            {{ ($request_info->all_time_requests == 0 || empty($request_info->all_time_requests)) ? 0 : $request_info->all_time_requests }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                    @endif
                </div>
                    </div></div>
            </div>
        </div>
    </div>
</div>
@endsection
