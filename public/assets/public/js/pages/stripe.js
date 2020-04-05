const stripePaymentApi = function () {

    var stripe = Stripe(STRIPE_KEY);

    const createCard = function(){
        var elements = stripe.elements();
        var style = {
            base: {
                fontSize: '16px',
                color: "#32325d",
            }
        };
        var card = elements.create('card', {style: style});
        card.mount('#card-element');
        return card;
    };

    const createToken = function(card){
        stripe.createToken(card).then(function(result) {
            if (result.error) {
                $('#card-errors').html(result.error.message);
            } else {
                let tokenObject = {token: result.token.id, payment_method: 'stripe'};
                submitCheckoutForm(tokenObject);
            }
        });
    };

    return {
        init: function () {
            var card = createCard();
            $('#payment-form').on('submit',function(event){
                event.preventDefault();
                createToken(card);
            });
        }
    }
}();

jQuery(document).ready(function () {
    stripePaymentApi.init();
});