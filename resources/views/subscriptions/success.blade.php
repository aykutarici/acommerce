@extends('subscriptions.layouts.app')
@section('content')
    <div  id="thank-you" class="column has-text-centered">
        <h1 class="title is-3">
            Thank You
        </h1>
        <p>
            {{ Auth::user()->email }}
        </p>
    </div>
    <div class="column has-text-centered">
        <i class="fa fa-check-circle-o big"></i>
        <p class="sub-title">
            Succesful Payment
        </p>
    </div>
    <div id="message" class="column has-text-centered">
        <p>
            You have been successfully charged for this transaction. A receipt for this purchase has been sent to your email.
        </p>
    </div>
@endsection('content')