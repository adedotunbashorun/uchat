const payPalPaymentApi = function() {  
    
    var ErrorMsg = function(msg) {
        $.each(msg, function(key, value) {
            // toastr.error(value);
            alert(value);
        });
    }

    var userPayment = function(token, status) {
        $("#add-user").attr("disabled", true);
        $("#add-user").html("<i class='fa fa-spinner fa-spin'></i> Processing...");
        $.ajax({
            url: CHECKOUT_URL,
            method: "POST",
            data: {
                '_token': TOKEN,
                'amount': $("input[name='amount']").val(),
                'paypalToken': token,
                'payment_type': "PayPal",
                'status': status,
                'class_id' : $("input[name='class_id']").val(),
                'description': "Payment with Paypal"
            },
            success: function(rst) {                    
                if (rst.type == true) {                        
                    alert(rst.msg);
                    // toastr.success(rst.msg);
                } else if (rst.type == false) {
                    ErrorMsg(rst.msg);
                }
            },
            error: function(rst, trowHTTP, error) {
                ErrorMsg(error);
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
                return actions.order.capture().then(function(details) {
                //   alert('Transaction completed by ' + details.payer.name.given_name + JSON.stringify(details));
                  let token = details.id
                  let status = details.status
                  // Call your server to save the transaction
                  userPayment(token, status);
                });
              }
          }).render('#paypal-button-container');
        }

    }
}();

jQuery(document).ready(function() {
    payPalPaymentApi.init();
});