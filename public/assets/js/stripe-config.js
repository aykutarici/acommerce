(function() {
    var stripe = Stripe('pk_test_a6KzILNUi0As7dW30McSOi8P00kx0gKhv9');
    var elements = stripe.elements();
    var card = elements.create('card', {
        style: {
            base: {
                iconColor: '#666EE8',
                color: '#31325F',
                lineHeight: '40px',
                fontWeight: 300,
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSize: '15px',
                '::placeholder': {
                    color: '#CFD7E0',
                },
            },
        }
    });
    card.mount('#card-element');
    function setOutcome(result) {
        var form = document.querySelector('form');
        var errorElement = document.querySelector('.error');
        errorElement.classList.remove('visible');
        if (result.token) {
            form.querySelector('input[name=stripe_token]').value = result.token.id;
            form.submit();
        } else if (result.error) {
            errorElement.textContent = result.error.message;
            errorElement.classList.add('visible');
            document.querySelector('#pay-button').disabled = false;
            document.querySelector('#pay-button').textContent = initialSubmitText;
        }
    }
    card.on('change', function(event) {
        setOutcome(event);
    });
    document.querySelector('form').addEventListener('submit', function(e) {
        e.preventDefault();
        document.querySelector('#pay-button').disabled = true;
        var initialSubmitText = document.querySelector('#pay-button').textContent;
        document.querySelector('#pay-button').textContent = "Processing...";
        stripe.createToken(card).then(setOutcome);
    });
})();