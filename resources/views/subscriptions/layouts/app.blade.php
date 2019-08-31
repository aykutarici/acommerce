<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Grape-shop Subscription</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/bulma.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/stripe.css') }}">
</head>
<body class="app">
<div class="container">
    <section class="section is-fullheight">
        <div class="container">
            <div class="column box is-5">
                @yield('content')
            </div>
        </div>
    </section>
</div>
<script src="https://js.stripe.com/v3/"></script>
<script src="{{ asset('assets/js/stripe-config.js') }}"></script>
</body>
</html>