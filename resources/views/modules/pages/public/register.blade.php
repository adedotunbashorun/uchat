@extends('pages::public.master')
@section('page')
    @include('pages::public._page-banner-section')
    <section class="about-us section register">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12">
                    @include('core::public._partials.notify')

                        <div class="auth-form">
                            {!! form_start($register_form,['class'=>'ajax-form','data-redirect'=>url('/payment')]) !!}
                            <div class="form-row">
                                <div class="col">{!! form_row($register_form->first_name) !!}</div>
                                <div class="col">{!! form_row($register_form->last_name) !!}</div>
                            </div>
                            <div class="form-row">
                                <div class="col">{!! form_row($register_form->phone) !!}</div>
                                <div class="col"> {!! form_row($register_form->email) !!}</div>
                            </div>
                            <div class="form-row">
                                <div class="col">{!! form_row($register_form->age_group) !!}</div>
                                <div class="col">{!! form_row($register_form->gender) !!}</div>
                            </div>
                            <div class="form-row">
                                <div class="col">{!! form_row($register_form->marital_status) !!}</div>
                                <div class="col">{!! form_row($register_form->race) !!}</div>
                            </div>
                            <div class="form-row">
                                <div class="col">{!! form_row($register_form->nationality) !!}</div>
                                <div class="col">{!! form_row($register_form->preferred_demography) !!}</div>
                                {{Form::hidden('interest_id',0)}}
                            </div>
                            <div class="form-row">
                                <div class="col">{!! form_row($register_form->interests) !!}</div>
                                {{Form::hidden('interest_id',0)}}
                            </div>
                            <div class="form-row">
                                <div class="col">{!! form_row($register_form->password) !!}</div>
                                <div class="col">{!! form_row($register_form->confirm_password) !!}</div>
                            </div>
                            
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="terms" required>
                                        <label class="form-check-label" for="terms">I have read the <a
                                                    href="{{url('terms-and-conditions')}}">Terms and
                                                Conditions</a></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group auth-form-action">
                                <div class="button">
                                    <button type="submit" class="btn btn-primary border-radius">Register</button>
                                </div>
                            </div>
                            <p>Already registered? click <a href="{{url('login')}}">here </a> to login</p>
                            {!! form_end($register_form,false) !!}
                        </div>
                </div>
                <div class="col-md-5 col-sm-12">
                    <figure class="figure">
                        <img src="{{$page->present()->thumbSrc()}}" class="figure-img img-fluid rounded"
                             alt="{{$page->title}}">
                    </figure>
                    <div class="single-widget posts">
                        <h3>{!! $page->tagline !!}</h3>
                        <div class="content mt-3">
                            {!! $page->body !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
@section('js')
<script>
    $(document).ready(function() {
        var noSuggestionNoticeMsg = "No results found, inputted text would be added as a base record.";
        // autoCompleteInputLookup($("input[name=interests]"), $('input[name=interest_id]'), "{{route('ajax.interests.search')}}", true, noSuggestionNoticeMsg);
        multipleSelect($("#interests"),"{{route('ajax.interests.search')}}", "select interests", true);
    });
</script>
@endsection