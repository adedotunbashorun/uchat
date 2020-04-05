@extends('core::emails.master')

@section('content')
    <table class="main" width="100%" cellpadding="0" cellspacing="0"
           style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; background: #fff; margin: 0; padding: 0; border: 1px solid #e9e9e9;">
        <tr style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0; padding: 0;">
            <td class="content-wrap"
                style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;"
                valign="top">
                <table width="100%" cellpadding="0" cellspacing="0"
                       style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0; padding: 0;">
                    <tr style="font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0; padding: 0;">
                        <td>
                            <table>
                                <tr>
                                    <td><b>Below is the information provided by a website visitor</b></td>
                                </tr>
                                <tr>
                                    <td style="width:40%"><b>Full Name: </b>{{$name}}</td>
                                </tr>
                                <tr>
                                    <td><b>Phone Number: </b>{{$phone}}</td>
                                </tr>
                                <tr>
                                    <td><b>Email Address: </b>{{$email}}</td>
                                </tr>
                                <tr>
                                    <td><b>Subject: </b>{{$subject}}</td>
                                </tr>

                                <tr>
                                    <td><b>Message</b><br>{{$msg}} </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

@stop