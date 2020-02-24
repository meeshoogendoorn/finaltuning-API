@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card dark-card">
                    <div class="card-header">
                        <h2><strong>Gebruikers</strong></h2>
                    </div>

                    <div class="card-body">
                        <table class="table main-table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Naam</th>
                                <th scope="col">Email</th>
                                <th class="hideOnMobile" scope="col">Opties</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr onclick="window.location = '{{route("users.show", $user->id)}}'">
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="hideOnMobile">
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
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
