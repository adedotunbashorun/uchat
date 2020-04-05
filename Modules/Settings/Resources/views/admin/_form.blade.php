{!! form_start($form,['class'=>'']) !!}
<div class="form-form__actions kt-padding-b-15">
    <button type="submit" class="btn btn-primary btn-icon-sm">Save</button>
</div>
<div class="form-body">
    <ul class="nav nav-tabs nav-tabs-line-2x nav-tabs-line nav-tabs-line-primary">
        <li class="nav-item">
            <a href="#tab_1" data-toggle="tab" class="nav-link active">
                General </a>
        </li>
        <li class="nav-item">
            <a href="#tab_4" data-toggle="tab" class="nav-link">
                Contact Information </a>
        </li>
        <li class="nav-item">
            <a href="#tab_2" data-toggle="tab" class="nav-link">
                Mail Settings </a>
        </li>
        <li class="nav-item">
            <a href="#tab_5" data-toggle="tab" class="nav-link">
                Payment Settings </a>
        </li>
        <li class="nav-item">
            <a href="#tab_3" data-toggle="tab" class="nav-link">
                Socials
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" id="tab_5">
            {!! form_row($form->paypal_client_id) !!}
            {!! form_row($form->paypal_client_secret) !!}
            {!! form_row($form->stripe_secret) !!}
            {!! form_row($form->stripe_publish_key) !!}
        </div>
        <div class="tab-pane" id="tab_4">
            {!! form_row($form->contact_email) !!}
            {!! form_row($form->phone) !!}
            {!! form_row($form->office_hours) !!}
            {!! form_row($form->address) !!}
        </div>
        <div class="tab-pane" id="tab_3">
            {!! form_row($form->facebook) !!}
            {!! form_row($form->facebook_plugin) !!}

            {!! form_row($form->twitter) !!}
            {!! form_row($form->twitter_plugin) !!}

            {!! form_row($form->instagram) !!}
            {!! form_row($form->instagram_plugin) !!}

            {!! form_row($form->linkedin) !!}
            {!! form_row($form->linkedin_plugin) !!}
        </div>
        <div class="tab-pane" id="tab_2">
            <div class="form-inline">
                <div class="form-group">
                    {!! Form::text('test_email',config('myapp.contact_email'),['id'=>'test_email','class'=>'form-control']) !!}
                </div>
                <button type="button" class="btn btn-primary" id="send_test_mail">Send Test Mail</button>
            </div>
            <hr>
            {!! form_row($form->mail_driver) !!}
            {!! form_row($form->mail_from_name) !!}
            {!! form_row($form->mail_from_address) !!}
            <div id="default" class="hide-mail-driver">
                {!! form_row($form->mail_host) !!}
                {!! form_row($form->mail_port) !!}
                {!! form_row($form->mail_username) !!}
            </div>
            <div id="smtp" class="hide-mail-driver">
                {!! form_row($form->mail_password) !!}
                {!! form_row($form->mail_encryption) !!}
            </div>
            <div id="mailgun" class="hide-mail-driver">
                {!! form_row($form->mailgun_domain) !!}
                {!! form_row($form->mailgun_secret) !!}
            </div>
        </div>
        <div class="tab-pane active" id="tab_1">
            <div class="form-group">
                <div class="row">
                    @if(!empty($data->image))
                        <div class="col-3">
                            <img class="image" src="{{asset('uploads/settings/'.$data->image)}}" alt="">
                            <small class="btn btn-block btn-xs btn-danger delete-attachment">
                                Delete
                            </small>
                        </div>
                    @endif
                    <div class="col-7">
                        {!! form_row($form->image) !!}
                    </div>
                </div>
            </div>
            {!! form_rest($form) !!}
        </div>
    </div>
</div>
<div class="form__actions">
    <button type="submit" class="btn btn-primary btn-icon-sm">Save</button>
</div>
{!! form_end($form,false) !!}