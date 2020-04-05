var AppAuthentication = function() {

    var ErrorMsg = function(msg) {
        $.each(msg, function(key, value) {
            toastr.error(value);
        });
    }

    var userRegistration = function() {
        var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        var username = $('#username').val();
        var email = $("#email").val();
        var password = $("#password").val();
        var confirm_password = $('#password-confirmation').val();
        if (first_name.length < 1) {
            toastr.error("Firstname  field is required");
        } else if (last_name.length < 1) {
            toastr.error("Lastname  field is required");
        } else if (username.length < 1) {
            toastr.error("Username field is required");
        } else if (email.length < 1) {
            toastr.error("Email address field is required");
        } else if (password.length < 1) {
            toastr.error("Password field is required");
        } else if (password != confirm_password) {
            toastr.error("Password and Confirm Password do not match");
        } else {

            $("#add-user").attr("disabled", true);
            $("#add-user").html("<i class='fa fa-spinner fa-spin'></i> Processing...");

            $.ajax({
                url: REGISTER_URL,
                method: "POST",
                data: {
                    '_token': TOKEN,
                    'username': username,
                    'first_name': first_name,
                    'last_name': last_name,
                    'email': email,
                    'password': password,
                    'password_confirmation': confirm_password
                },
                success: function(rst) {                    
                    if (rst.type == true) {
                        $("#add-user").attr("disabled", false);
                        $("#add-user").html("Submit");
                        $('#modalLRForm .close').click();
                        alert(rst.msg);
                        // toastr.success(rst.msg);
                    } else if (rst.type == false) {
                        $("#add-user").attr("disabled", false);
                        $("#add-user").html("Sign up");
                        ErrorMsg(rst.msg);
                    }
                },
                error: function(rst, trowHTTP, error) {
                    $("#add-user").attr("disabled", false);
                    $("#add-user").html("Sign up");
                    ErrorMsg(error);
                }
            });
        }
    }

    var userLogin = function() {
        var email = $("#email1").val();
        var password = $("#password1").val();
        if (email.length < 1) {
            toastr.error("Email address field is required");
        } else if (password.length < 1) {
            toastr.error("Password field is required");
        } else {

            $("#login").attr("disabled", true);
            $("#login").html("<i class='fa fa-spinner fa-spin'></i> Processing...");

            $.ajax({
                url: LOGIN_URL,
                method: "POST",
                data: {
                    '_token': TOKEN,
                    'email': email,
                    'password': password
                },
                success: function(rst) {                    
                    if (rst.type == true) {
                        $("#login").attr("disabled", false);
                        $("#login").html("Log In");
                        $('#modalLRForm .close').click();
                        location.reload();
                        // $('#modalCourse').modal().show();
                        alert(rst.msg);
                        // toastr.success(rst.msg);
                    } else if (rst.type == false) {
                        $("#login").attr("disabled", false);
                        $("#login").html("Log In");
                        ErrorMsg(rst.msg);
                    }
                },
                error: function(rst, trowHTTP, error) {
                    $("#login").attr("disabled", false);
                    $("#login").html("Log In");
                    ErrorMsg(error);
                }
            });
        }
    }

    var getClass = function(){
        var modalCourse = $("#modalCourse");

        modalCourse.on('hidden.bs.modal', function (e) {
            // $(e.target).removeData("bs.modal").find(".loadAjax").empty();
        });

        modalCourse.on("show.bs.modal", function (e) {
            var link = $(e.relatedTarget);
            // console.log(link);
            $(this).find(".class_title").html(link.attr("data-title"));
            $('#amount').val(link.attr("data-price"));
            $('#class_id').val(link.attr("data-class_id"));
            $(this).find(".payment-btn").html('Pay Now ($'+link.attr("data-price")+')');
        });
    }

    var showPassword = function() {
        $("#password").attr('type', 'text');
    }

    var showConfirmPassword = function() {
        $("#password-confirmation").attr('type', 'text');
    }

    var LockConfirmPassword = function() {
        $("#password-confirmation").attr('type', 'password');
    }

    var lockPassword = function() {
        $("#password").attr('type', 'password');
    }

    return {
        init: function() {

            getClass();

            $("#add-user").on('click', function() {
                userRegistration();
            });

            $("#login").on('click', function() {
                userLogin();
            });

            $("#show_password").on("mousedown", function() {
                showPassword();
                toastr.warning("Tips! Don't expose your password to anyone else.");
            });

            $("#show_password").on("mouseup", function() {
                lockPassword();
            });

            // $('body').find("table.table.table-hover tbody tr").each(function(index) {
            //     $("#activate" + index).on("click", function() {
            //         Activate(index);
            //     });
            // });
        }
    }
}();

jQuery(document).ready(function() {
    AppAuthentication.init();
});
