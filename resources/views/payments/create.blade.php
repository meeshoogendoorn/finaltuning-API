@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card dark-card">
                    <div class="card-header">
                        <h2><strong>Betaling maken</strong></h2>
                        @if(auth()->user()->admin)
                            <div class="float-right">
                                <a class="btn btn-outline-primary" href="{{route("payments.create")}}">Nieuwe
                                    Betaling</a>
                            </div>
                        @endif
                    </div>

                    <div class="card-body">
                        {{Form::open(["route" => ["payments.store"]])}}
                        {{Form::label("Gebruikers", null, ['class' => 'control-label'])}}
                        {{Form::select('user_id', $users, null, ['placeholder' => 'Select user', "class" => "form-control"])}}
                        <br/>
                        {{Form::label("IBAN", null, ['class' => 'control-label'])}}
                        {{Form::text("iban", null, ["class" => "form-control"])}}
                        <br/>
                        {{Form::label("Prijs", null, ['class' => 'control-label'])}}
                        {{Form::number("total_price", null, ["class" => "form-control"])}}
                        <br/>
                        {{Form::submit("Opslaan", ["class" => "btn btn-outline-primary"])}}
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
