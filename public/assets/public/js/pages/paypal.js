const payPalPaymentApi = function() {
      const submitCheckoutForm = function (tokenObject) {
        $('input[name=payment_payload]').attr('value', JSON.stringify(tokenObject));
        var button = $('.payment-btn');
        var buttonInitialLabel = button.html();
        button.attr("disabled", true).html("<i class='fa fa-spinner fa-spin'></i> PROCESSING...");
        $('#payment-form').ajaxSubmit({
            success: function (responseText, statusText, xhr, $form) {
                button.attr("disabled", false).html(buttonInitialLabel);
                swal({
                    title: "Registration complete!",
                    text: "Thank you, your course registration and payment was successful",
                    icon: "success"
                }).then((value) => {
                    document.location.href = locationRoute;
                });
            },
            error: function (response, statusText, xhr, $form) {
                button.attr("disabled", false).html(buttonInitialLabel);
                swal({
                    title: "An error occurred",
                    text: response.responseText,
                    icon: "error",
                    dangerMode: true,
                });
            }
        });
    }
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