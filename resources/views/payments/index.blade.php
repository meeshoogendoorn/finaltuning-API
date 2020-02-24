@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card dark-card">
                    <div class="card-header">
                        <h2><strong>Betalingen</strong></h2>
                        @if(auth()->user()->admin)
                            <div class="float-right">
                                <a class="btn btn-outline-primary" href="{{route("payments.create")}}">Nieuwe
                                    Betaling</a>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <table class="table main-table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Naam gebruiker</th>
                                <th scope="col">IBAN</th>
                                <th scope="col">Prijs</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payments as $payment)
                                <tr>
                                    <td>{{ $payment->user->name }}</td>
                                    <td>{{ $payment->iban }}</td>
                                    <td>&euro; {{ $payment->total_price }}</td>
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
