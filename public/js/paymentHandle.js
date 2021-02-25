const stripe = Stripe('pk_test_51IIJZHClAE6OwaMjzIdcSvc6snxP4UCr3FMIAsKIbUoGYWVPSq0O6SEKzoQf7lesoxt4p21cUnq5Kn78YeaqgJvZ00cgUhxy06');
//const stripe = Stripe('pk_live_51IIJZHClAE6OwaMj6SwBd5ggdsCG1lkbufBi6uwzRFvNtxfOtbaYAx33p0bsMhPll8HH9g6eeDlhPaUqtohvOplS00cO9B730G');

var style = {
    base: {
        color: '#32325d',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
        color: '#aab7c4'
        }
    },
    invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
    }
};

const elements = stripe.elements();
const cardElement = elements.create('card', {hidePostalCode: true, style: style});

cardElement.mount('#card-element');

const cardButton = document.getElementById('card-button');

cardButton.addEventListener('click', async (e) => {
    const { paymentMethod, error } = await stripe.createPaymentMethod(
        'card', cardElement, {
            billing_details: { name: "Mycvmaking user" }
        }
    );

    if (error) {
        const errorBlock = document.getElementById('card-errors');
        errorBlock.innerHTML += error['message'];
    } else {
        stripePaymentHandler(paymentMethod);
    }
});

// Submit the form with the token ID.
function stripePaymentHandler(paymentMethod) {
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('payment-form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripePaymentMethod');
    hiddenInput.setAttribute('value', paymentMethod.id);
    form.appendChild(hiddenInput);

    console.log(form)

    // Submit the form
    form.submit();
}