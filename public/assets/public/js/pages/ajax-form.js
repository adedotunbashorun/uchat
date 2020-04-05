var ajaxForm = function() {

    var ErrorMsg = function(msg) {
        $.each(msg, function(key, value) {
            toastr.error(value);
        });
    }

    return {
        init: function() {
            $('.ajax-form').on('submit',function(e){
                e.preventDefault();
                var type = $(this).data('type');
                var redirectUrl = $(this).data('redirect');
                var button = $(this).find('button[type=submit]');
                var buttonInitialLabel = button.html();
                button.attr("disabled", true).html("<i class='fa fa-spinner fa-spin'></i>");
                $(this).ajaxSubmit({
                    success: function (response, statusText, xhr, $form) {
                        button.attr("disabled", false).html(buttonInitialLabel);
                        swal({
                            /*title: "Success",*/
                            title: response,
                            icon: "success"
                        }).then((value) => {
                            if(redirectUrl) document.location.href = redirectUrl;
                        });
                        console.log(response);
                    },
                    error: function (response, statusText, xhr, $form) {
                        button.attr("disabled", false).html(buttonInitialLabel);
                        swal({
                            title: "Oops!",
                            text: response.responseText,
                            icon: "error",
                            dangerMode: true,
                        });
                        console.log(response.responseJSON);
                    }
                });
            });
        }
    }
}();

$(function() {
    ajaxForm.init();
});
