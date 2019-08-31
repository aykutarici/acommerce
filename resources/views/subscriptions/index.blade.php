@extends('subscriptions.layouts.app')
@section('content')
	<div id="img-column" class="column img-column">
		<img src="/products/grapes.jpg">
	</div>
	<div class="column has-text-centered product-info">
		<p>
			Our grape shop subscritption offers great service that enables you to get the maximum enjoyment from your choice fruit.
		</p>
	</div>
	<div id="input-column" class="column has-text-centered">
		<form action="{{ route('subscription.create') }}" method="POST">
			{{ csrf_field() }}
			<input name="stripe_token" type="hidden" type="text"/>
			<div class="field">
				<div class="control has-icons-left">
					<input class="input {{ $errors->has('phone') ? ' is-danger' : '' }}" type="phone" name="phone" required autofocus>
					<span class="icon is-left">
                        <i class="fa fa-phone-square"></i>
                    </span>
				</div>
			</div>
			<div id="card-element" class="field"></div>
			<hr>
			<div id="session-messages" class="column has-text-centered _session-messages">
				<div class="error" role="alert"></div>
				@include('subscriptions.partials._session-messages')
			</div>
			<div class="field">
				<button type="submit" id="pay-button" class="button is-primary is-fullwidth">
					<strong>Pay $100/Month</strong>
				</button>
			</div>
		</form>
	</div>
@endsection('content')