@extends('core::admin.master')

@section('title', trans('settings::global.new'))

@section('page-css')
    <style>
        .hide-mail-driver {
            display: none;
        }
    </style>
@stop

@section('page-js')
    <script>
        $(function () {
            var mail_driver = '{{config('myapp.mail_driver')}}';
            if(mail_driver == 'mail' || mail_driver == 'log'){
                $('.hide-mail-driver').hide();
            }else{
                $('.hide-mail-driver').hide();
                $('#default').show();
                $('#'+mail_driver).show();
            }
            $('#mail_driver').on('change', function () {
                var mail_driver = $(this).attr('value');
                if(mail_driver == 'mail' || mail_driver == 'log'){
                    $('.hide-mail-driver').hide();
                }else{
                    $('.hide-mail-driver').hide();
                    $('#default').show();
                    $('#'+mail_driver).show();
                }
            });

            $('#send_test_mail').on('click',function(e){
                $(this).attr('style', 'cursor: not-allowed');
                $(this).attr('class', 'btn btn-warning');
                $(this).html('Sending...Please Wait');
                var test_email = $('#test_email').val();
                $.post("{{route('ajax.settings.send_test_mail')}}", {
                    test_email: test_email,
                    _token: '{{csrf_token()}}'
                }, function (data) {
                    if(data.response == 'error'){
                        toastr.error(data.message);
                    }else{
                        toastr.success(data.message);
                    }
                    $('#send_test_mail').attr('style', 'cursor: pointer');
                    $('#send_test_mail').attr('class', 'btn btn-primary');
                    $('#send_test_mail').html('Send Test Email');
                });

                e.preventDefault();
            });
        })
    </script>
@stop

@section('page-breadcrumbs')
    <span class="kt-subheader__breadcrumbs-separator"></span>
    <a href="javascript:;" class="kt-subheader__breadcrumbs-link">@Lang('settings::global.name')</a>
@stop

@section('page-group-title')
    @Lang('settings::global.group_name')
@stop


@section('main')
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__body form">
            @include('settings::admin._form')
        </div>
    </div>
@stop