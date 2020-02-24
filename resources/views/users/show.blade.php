@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card dark-card">
                    <div class="card-header">
                        <h2><strong>{{ $user->name }}</strong></h2>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                        <table class="table table-responsive main-table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Email</th>
                                <th scope="col">Opties</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr onclick="window.location = '{{route("users.show", $user->id)}}'">
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="{{route("user.delete", $user->id)}}" class="btn btn-danger">Verwijder</a>
                                        @if($user->user_api_info->payment_status)
                                            <a href="{{route("user.payment", [$user->id, 0])}}" class="btn btn-success">Betaald</a>
                                        @else
                                            <a href="{{route("user.payment", [$user->id, 1])}}" class="btn btn-warning">Niet betaald</a>
                                        @endif
                                        @if(! $user->active)
                                            <a href="{{route("user.active", [$user->id, 1])}}" class="btn btn-danger">Inactief</a>
                                        @else
                                            <a href="{{route("user.active", [$user->id, 0])}}" class="btn btn-success">Actief</a>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        {{ Form::open(["route" => ["user.update.request", $user->id]]) }}
                        {{ Form::label('Domein (Leeg is geen beveiliging)', null, ["class" => "control-label"]) }}
                        {{ Form::text('referer_domain', $user->user_api_info->referer_domain, ["class" => "form-control"]) }}
                        <br />
                        {{ Form::label('Ip adres (Leeg is geen beveiliging)', null, ["class" => "control-label"]) }}
                        {{ Form::text('ip_address', $user->user_api_info->ip_address, ["class" => "form-control"]) }}
                        <br />
                        {{ Form::label('Maximale requests per betaling (0/Leeg is Onbeperkt)', null, ["class" => "control-label"]) }}
                        {{ Form::number('max_requests', $user->request->max_requests, ["class" => "form-control"]) }}
                        <br />
                        {{Form::submit("Opslaan", ["class" => "btn btn-outline-primary"])}}
                        {{ Form::close() }}
                    </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
