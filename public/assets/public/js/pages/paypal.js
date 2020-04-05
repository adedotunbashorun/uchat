const payPalPaymentApi = function() {
    return {
        init: function() {
          paypal.Buttons({
              env: 'sandbox',
              createOrder: function(data, actions) {
                return actions.order.create({
                  purchase_units: [{
                    amount: {
                      currency_code: "USD",
                      value: $("input[name='amount']").val()
                    }
                  }]
                });
              },
              onApprove: function(data, actions) {
                  return actions.order.capture().then(function (details) {
                      let tokenObject = {token: details.id, payment_method: 'paypal'};
                      submitCheckoutForm(tokenObject);
                  });
              }
          }).render('#paypal-button-container');
        }
    }
}();

$(function() {
    payPalPaymentApi.init();
});